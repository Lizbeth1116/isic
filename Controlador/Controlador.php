<?php

include("./Config/Conexion.php");
$con = conectar();
$maxMalla = 0;
$solicitudNo = 0;
if (!$con) {
    die("no se pudo conectar");
}

function sumarVista() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (!file_exists("./Config/Vistas.txt")) {
        touch("./Config/Vistas.txt");
    }
    $contenido = trim(file_get_contents("./Config/Vistas.txt"));
    if ($contenido == "") {
        $renglon[0] = "Visitas:0";
        $renglon[1] = "Explorer:0";
        $renglon[2] = "Edge:0";
        $renglon[3] = "Opera:0";
        $renglon[4] = "Firefox:0";
        $renglon[5] = "Chrome:0";
        $renglon[6] = "Safari:0";
        $renglon[7] = "Otros:0";
    } else {
        $renglon = explode("\n", $contenido);
    }
    for ($i = 0; $i < sizeof($renglon); $i++) {
        $visitas[$i] = explode(":", $renglon[$i]);
    }
    $navegador = sumarNavegador($user_agent);
    $visitas[0][1] ++;
    $visitas[$navegador][1] ++;
    $contenidoN = "";
    foreach ($visitas as $ncon) {
        $contenidoN .= ($ncon[0] . ':' . $ncon[1] . "\n");
    }
    file_put_contents("./Config/Vistas.txt", $contenidoN);
}

function sumarNavegador($user_agent) {
    if (strpos($user_agent, 'MSIE') !== FALSE || strpos($user_agent, 'Trident') !== FALSE) {
        return 1;
    } elseif (strpos($user_agent, 'Edge') !== FALSE) {
        return 2;
    } elseif (strpos($user_agent, 'Opera Mini') !== FALSE || strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE) {
        return 3;
    } elseif (strpos($user_agent, 'Firefox') !== FALSE) {
        return 4;
    } elseif (strpos($user_agent, 'Chrome') !== FALSE) {
        return 5;
    } elseif (strpos($user_agent, 'Safari') !== FALSE) {
        return 6;
    } else {
        return 7;
    }
}

function getArea() {
    global $con;
    $stmt = $con->prepare("call isic.sp_area();");
    $stmt->execute();
    $stmt->bind_result($Nombre, $Horas);
    $i = 0;
    while ($stmt->fetch()) {
        $area[$i][0] = $Nombre;
        $area[$i][1] = $Horas;
        $i++;
    }
    $stmt->close();
    return $area;
}

function getInv() {
    global $con;
    $stmt = $con->prepare("call isic.sp_lineaInvs();");
    $stmt->execute();
    $stmt->bind_result($temalinea, $Nombre, $GradoAcademico, $idDocente, $Docente, $CargoDocente, $Estado, $EstadoTema);
    $i = 0;
    while ($stmt->fetch()) {
        $inv[$i][0] = $temalinea;
        $inv[$i][1] = $Nombre;
        $inv[$i][2] = $GradoAcademico;
        $inv[$i][3] = $idDocente;
        $inv[$i][4] = $Docente;
        $inv[$i][5] = $CargoDocente;
        $inv[$i][6] = $Estado;
        $inv[$i][7] = $EstadoTema;
        $i++;
    }
    $stmt->close();
    return $inv;
}

function getListEsp() {
    global $con;
    $stmt = $con->prepare("call isic.sp_especialidad_lista();");
    $stmt->execute();
    $stmt->bind_result($idespecialidad, $Nombre);
    $i = 0;
    while ($stmt->fetch()) {
        $listEsp[$i][0] = $idespecialidad;
        $listEsp[$i][1] = $Nombre;
        $i++;
    }
    $stmt->close();
    return $listEsp;
}

function getMalla($esp) {
    global $con, $maxMalla;
    $maxMalla = 0;
    for ($i = 1; $i < 10; $i++) {
        $stmt = $con->prepare("call isic.sp_malla(?,?);");
        $stmt->bind_param("ii", $i, $esp);
        $stmt->execute();
        $stmt->bind_result($MC_ClaveAsignatura, $MC_HorasTot, $MC_NombreAsignatura, $Nombre, $Horas, $MC_PdfNombre);
        $j = 0;
        while ($stmt->fetch()) {
            $malla[$i][$j][0] = $MC_ClaveAsignatura;
            $malla[$i][$j][1] = $MC_HorasTot;
            $malla[$i][$j][2] = $MC_NombreAsignatura;
            $malla[$i][$j][3] = $Nombre;
            $malla[$i][$j][4] = $Horas;
            $malla[$i][$j][5] = $MC_PdfNombre;
            $j++;
        }
        $maxMalla = (sizeof($malla[$i]) > $maxMalla) ? sizeof($malla[$i]) : $maxMalla;
        $stmt->close();
    }
    return $malla;
}

function getMaxMalla() {
    global $maxMalla;
    return $maxMalla;
}

function getEspecialidadInfo($esp) {
    global $con;
    $stmt = $con->prepare("call isic.sp_especialidad(?);");
    $stmt->bind_param("i", $esp);
    $stmt->execute();
    $stmt->bind_result($Nombre, $Objetivo, $pdfReticula, $imagen);
    $i = 0;
    while ($stmt->fetch()) {
        $espInfo[$i][0] = $Nombre;
        $espInfo[$i][1] = $Objetivo;
        $espInfo[$i][2] = $pdfReticula;
        $espInfo[$i][3] = $imagen;
        $i++;
    }
    $stmt->close();
    return $espInfo;
}

function getAsignaturasEsp($esp) {
    global $con;
    $stmt = $con->prepare("call isic.sp_asignaturasEsp(?);");
    $stmt->bind_param("i", $esp);
    $stmt->execute();
    $stmt->bind_result($Nombre, $idasignatura, $MC_NombreAsignatura, $descripcion);
    $i = 0;
    while ($stmt->fetch()) {
        $espAsig[$i][0] = $Nombre;
        $espAsig[$i][1] = $idasignatura;
        $espAsig[$i][2] = $MC_NombreAsignatura;
        $espAsig[$i][3] = $descripcion;
        $i++;
    }
    $stmt->close();
    return $espAsig;
}

function getPerfilEgreso($esp) {
    global $con;
    $stmt = $con->prepare("call isic.sp_egreso(?);");
    $stmt->bind_param("i", $esp);
    $stmt->execute();
    $stmt->bind_result($capacidad);
    $i = 0;
    while ($stmt->fetch()) {
        $espEgr[$i] = $capacidad;
        $i++;
    }
    $stmt->close();
    return $espEgr;
}

function getMallaAdmin() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getMalla_Admin();");
    $stmt->execute();
    $stmt->bind_result($MC_SemestreAsignatura, $MC_ClaveAsignatura, $MC_HorasTot, $MC_NombreAsignatura, $Nombre, $MC_Estado, $MC_PdfNombre);
    $i = 0;
    while ($stmt->fetch()) {
        $asignatura[$i][0] = $MC_SemestreAsignatura;
        $asignatura[$i][1] = $MC_ClaveAsignatura;
        $asignatura[$i][2] = $MC_HorasTot;
        $asignatura[$i][3] = $MC_NombreAsignatura;
        $asignatura[$i][4] = $Nombre;
        $asignatura[$i][5] = $MC_Estado;
        $asignatura[$i][6] = $MC_PdfNombre;
        $i++;
    }
    $stmt->close();
    return $asignatura;
}

function getListAsigEspAdmin() {
    global $con;
    $stmt = $con->prepare("call isic.sp_get_ListaMateriasEsp();");
    $stmt->execute();
    $stmt->bind_result($idespecialidad, $Nombre, $idasignatura);
    $i = 0;
    while ($stmt->fetch()) {
        $listAsigEsp[$i][0] = $idespecialidad;
        $listAsigEsp[$i][1] = $Nombre;
        $listAsigEsp[$i][2] = $idasignatura;
        $i++;
    }
    $stmt->close();
    return $listAsigEsp;
}

function getTemaInv() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getTemaInv();");
    $stmt->execute();
    $stmt->bind_result($idtema_linea_investigacion, $Nombre, $Estado);
    $i = 0;
    while ($stmt->fetch()) {
        $tema[$i][0] = $idtema_linea_investigacion;
        $tema[$i][1] = $Nombre;
        $tema[$i][2] = $Estado;
        $i++;
    }
    $stmt->close();
    return $tema;
}

function getDocente() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getDocente();");
    $stmt->execute();
    $stmt->bind_result($iddocente, $Docente,$GradoAcademico, $correo, $tiempo, $tutor);
    $i = 0;
    while ($stmt->fetch()) {
        $doce[$i][0] = $iddocente;
        $doce[$i][1] = $Docente;
        $doce[$i][2] = $GradoAcademico;
        $doce[$i][3] = $correo;
        $doce[$i][4] = $tiempo;
        $doce[$i][5] = $tutor;
        $i++;
    }
    $stmt->close();
    return $doce;
}


function getDocenteEdit() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getDocenteEdit();");
    $stmt->execute();
    $stmt->bind_result($iddocente, $Nombre,$APaterno,$AMaterno,$GradoAcademico, $correo, $tiempo, $tutor);
    $i = 0;
    while ($stmt->fetch()) {
        $docente[$i][0] = $iddocente;
        $docente[$i][1] = $Nombre;
        $docente[$i][2] = $APaterno;
        $docente[$i][3] = $AMaterno;
        $docente[$i][4] = $GradoAcademico;
        $docente[$i][5] = $correo;
        $docente[$i][6] = $tiempo;
        $docente[$i][7] = $tutor;
        $i++;
    }
    $stmt->close();
    return $docente;
}


function getEspecialidadAdmin() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getEspecialidadAdmin();");
    $stmt->execute();
    $stmt->bind_result($idespecialidad, $Nombre, $Objetivo, $Estado, $pdfReticula, $imagen);
    $i = 0;
    while ($stmt->fetch()) {
        $especialidad[$i][0] = $idespecialidad;
        $especialidad[$i][1] = $Nombre;
        $especialidad[$i][2] = $Objetivo;
        $especialidad[$i][3] = $Estado;
        $especialidad[$i][4] = $pdfReticula;
        $especialidad[$i][5] = $imagen;
        $i++;
    }
    $stmt->close();
    return $especialidad;
}

function getEgresoAdmin() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getEgresoAdmin();");
    $stmt->execute();
    $stmt->bind_result($idespecialidad, $Nombre, $capacidad, $Estado);
    $i = 0;
    while ($stmt->fetch()) {
        $egreso[$i][0] = $idespecialidad;
        $egreso[$i][1] = $Nombre;
        $egreso[$i][2] = $capacidad;
        $egreso[$i][3] = $Estado;
        $i++;
    }
    $stmt->close();
    return $egreso;
}

function getAsignaturaEspAdmin() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getAsignaturaEspAdmin();");
    $stmt->execute();
    $stmt->bind_result($idespecialidad, $Nombre, $idasignatura, $descripcion, $Estado);
    $i = 0;
    while ($stmt->fetch()) {
        $asiEsp[$i][0] = $idespecialidad;
        $asiEsp[$i][1] = $Nombre;
        $asiEsp[$i][2] = $idasignatura;
        $asiEsp[$i][3] = $descripcion;
        $asiEsp[$i][4] = $Estado;
        $i++;
    }
    $stmt->close();
    return $asiEsp;
}

function getListaServicios() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getListaServicios();");
    $stmt->execute();
    $stmt->bind_result($idservicios, $Nombre_Servicio);
    $i = 0;
    while ($stmt->fetch()) {
        $listServ[$i][0] = $idservicios;
        $listServ[$i][1] = $Nombre_Servicio;
        $i++;
    }
    $stmt->close();
    return $listServ;
}

function getServicio($serv) {
    global $con;
    $stmt = $con->prepare("call isic.sp_getServicio(?);");
    $stmt->bind_param("i", $serv);
    $stmt->execute();
    $stmt->bind_result($Nombre_Servicio, $Objetivo);
    $i = 0;
    while ($stmt->fetch()) {
        $servInfo[$i][0] = $Nombre_Servicio;
        $servInfo[$i][1] = $Objetivo;
        $i++;
    }
    $stmt->close();
    return $servInfo;
}

function getPeriodo() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getPeriodo();");
    $stmt->execute();
    $stmt->bind_result($idperiodoExpo, $periodo, $año, $estado, $carpetaImg);
    $i = 0;
    while ($stmt->fetch()) {
        $peri[$i][0] = $idperiodoExpo;
        $peri[$i][1] = $periodo;
        $peri[$i][2] = $año;
        $peri[$i][3] = $estado;
        $peri[$i][4] = $carpetaImg;
        $i++;
    }
    $stmt->close();
    return $peri;
}

function getImagenesExpo($per) {
    global $con;
    $stmt = $con->prepare("call isic.sp_getImagenesExpo(?);");
    $stmt->bind_param("i", $per);
    $stmt->execute();
    $stmt->bind_result($idimagenExpo, $descripcion, $estado, $imagenNom, $carpetaImg);
    $i = 0;
    $imgExpo[$i][0] = "";
    $imgExpo[$i][1] = "";
    $imgExpo[$i][2] = "";
    $imgExpo[$i][3] = "";
    $imgExpo[$i][4] = "";
    while ($stmt->fetch()) {
        $imgExpo[$i][0] = $idimagenExpo;
        $imgExpo[$i][1] = $descripcion; //2
        $imgExpo[$i][2] = $estado; //3
        $imgExpo[$i][3] = $imagenNom; //5
        $imgExpo[$i][4] = $carpetaImg; //5
        $i++;
    }
    $stmt->close();
    return $imgExpo;
}

function getPostFbisic($id){
    global $con;
    $stmt = $con->prepare("call isic.sp_getPostfbisic(?)");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $i = 0;
    $stmt->bind_result($idpostfb, $post, $Estado, $subtitulo,$idPeriodo);
   
    while ($stmt->fetch()) {
        $postFb[$i][0] = $idpostfb;
        $postFb[$i][1] = $post;
        $postFb[$i][2] = $Estado;
        $postFb[$i][3] = $subtitulo;
        $postFb[$i][4]=$idPeriodo;
        $i++;
    }
    $stmt->close();
    if(isset($postFb))
    return $postFb;
    else return null;


}


function getListaPE() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getListaPE();");
    $stmt->execute();
    $stmt->bind_result($idtipo_PE, $Nombre);
    $i = 0;
    while ($stmt->fetch()) {
        $listaPE[$i][0] = $idtipo_PE;
        $listaPE[$i][1] = $Nombre;
        $i++;
    }
    $stmt->close();
    return $listaPE;
}

function getPEDescrip($pe) {
    global $con;
    $stmt = $con->prepare("call isic.sp_getPEDescrip(?);");
    $stmt->bind_param("i", $pe);
    $stmt->execute();
    $stmt->bind_result($idpe_isic, $Nombre, $DescripcionPE);
    $i = 0;
    while ($stmt->fetch()) {
        $PEDescrip[$i][0] = $idpe_isic;
        $PEDescrip[$i][1] = $Nombre;
        $PEDescrip[$i][2] = $DescripcionPE;
        $i++;
    }
    $stmt->close();
    return $PEDescrip;
}

function getAsesorias() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getAsesorias();");
    $stmt->execute();
    $stmt->bind_result($idasesorias, $idAsesor, $asesor, $clavAsignatura, $asignatura, $horaInicio, $horaFin, $dia, $estado);
    $i = 0;
    while ($stmt->fetch()) {
        $Asesoria[$i][0] = $idasesorias;
        $Asesoria[$i][1] = $idAsesor;
        $Asesoria[$i][2] = $asesor;
        $Asesoria[$i][3] = $clavAsignatura;
        $Asesoria[$i][4] = $asignatura;
        $Asesoria[$i][5] = $horaInicio;
        $Asesoria[$i][6] = $horaFin;
        $Asesoria[$i][7] = $dia;
        $Asesoria[$i][8] = $estado;
        $i++;
    }
    $stmt->close();
    return $Asesoria;
}

function getAsesor() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getAsesor();");
    $stmt->execute();
    $stmt->bind_result($asesor);
    $i = 0;
    while ($stmt->fetch()) {
        $asesorNam[$i][0] = $asesor;
        $i++;
    }
    $stmt->close();
    return $asesorNam;
}

function getHistorialInfo() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getHistorialInfo();");
    $stmt->execute();
    $stmt->bind_result($idhistorial, $HINombre, $HIObjetivo, $HIimagen, $Estado);
    $i = 0;
    while ($stmt->fetch()) {
        $historialInfo[$i][0] = $idhistorial;
        $historialInfo[$i][1] = $HINombre;
        $historialInfo[$i][2] = $HIObjetivo;
        $historialInfo[$i][3] = $HIimagen;
        $historialInfo[$i][4] = $Estado;
        $i++;
    }
    $stmt->close();
    return $historialInfo;
}

function getContenidoHistorial($idH) {
    global $con;
    $stmt = $con->prepare("call isic.sp_getContenidoHistorial(?);");
    $stmt->bind_param("i", $idH);
    $stmt->execute();
    $stmt->bind_result($nomContenidol, $Estado);
    $i = 0;
    while ($stmt->fetch()) {
        $contenHistorial[$i][0] = $nomContenidol;
        $contenHistorial[$i][1] = $Estado;
        $i++;
    }
    $stmt->close();
    return $contenHistorial;
}

function getContenidoHistorialAdmin() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getContenidoHistorialAdmin();");
    $stmt->execute();
    $stmt->bind_result($nomContenidol, $Estado, $HINombre, $idhistorial);
    $i = 0;
    while ($stmt->fetch()) {
        $contenHistorialA[$i][0] = $nomContenidol;
        $contenHistorialA[$i][1] = $Estado;
        $contenHistorialA[$i][2] = $HINombre;
        $contenHistorialA[$i][3] = $idhistorial;
        $i++;
    }
    $stmt->close();
    return $contenHistorialA;
}

function getIdHistorial($nomb) {
    global $con;
    $stmt = $con->prepare("call isic.sp_getIdHistorial(?);");
    $stmt->bind_param("s", $nomb);
    $stmt->execute();
    $stmt->bind_result($idhistorial);
    $i = 0;
    while ($stmt->fetch()) {
        $idhisto[$i] = $idhistorial;
        $i++;
    }
    $stmt->close();
    return $idhisto;
}

function getDatosAPasarHistorial($esp) {
    global $con;
    $stmt = $con->prepare("call isic.sp_getDatosAPasarHistorial(?);");
    $stmt->bind_param("i", $esp);
    $stmt->execute();
    $stmt->bind_result($MC_NombreAsignatura, $MC_PdfNombre);
    $i = 0;
    while ($stmt->fetch()) {
        $pasarHistorial[$i][0] = $MC_NombreAsignatura;
        $pasarHistorial[$i][1] = $MC_PdfNombre;
        $i++;
    }
    $stmt->close();
    return $pasarHistorial;
}

function getComplementarias() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getComplementarias();");
    $stmt->execute();
    $stmt->bind_result($idComplementarias, $Nombre, $Descripcion, $Imagen, $Pdf, $Estado);
    $i = 0;
    while ($stmt->fetch()) {
        $complInfo[$i][0] = $idComplementarias;
        $complInfo[$i][1] = $Nombre;
        $complInfo[$i][2] = $Descripcion;
        $complInfo[$i][3] = $Imagen;
        $complInfo[$i][4] = $Pdf;
        $complInfo[$i][5] = $Estado;
        $i++;
    }
    $stmt->close();
    return $complInfo;
}

function getUltimaExpo() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getUltimaExpo();");
    $stmt->execute();
    $stmt->bind_result($idperiodoExpo, $periodo, $año);
    while ($stmt->fetch()) {
        $ultExpo[0][0] = $idperiodoExpo;
        $ultExpo[0][1] = $periodo;
        $ultExpo[0][2] = $año;
    }
    $stmt->close();
    return $ultExpo;
}

function getAdmin() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getAdmin();");
    $stmt->execute();
    $stmt->bind_result($Usuario, $Contraseña);
    while ($stmt->fetch()) {
        $admin[0][0] = $Usuario;
        $admin[0][1] = $Contraseña;
    }
    $stmt->close();
    return $admin;
}

function getAdminOri() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getAdminOri();");
    $stmt->execute();
    $stmt->bind_result($Usuario, $Contraseña);
    while ($stmt->fetch()) {
        $admin[0][0] = $Usuario;
        $admin[0][1] = $Contraseña;
    }
    $stmt->close();
    return $admin;
}

function getCarruselExpo() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getCarruselExpo();");
    $stmt->execute();
    $i = 0;
    $stmt->bind_result($idcarruselExpo, $ImagenCarr, $Texto, $Estado, $Perteneciente);
    while ($stmt->fetch()) {
        $carrExp[$i][0] = $idcarruselExpo;
        $carrExp[$i][1] = $ImagenCarr;
        $carrExp[$i][2] = $Texto;
        $carrExp[$i][3] = $Estado;
        $carrExp[$i][4] = $Perteneciente;
        $i++;
    }
    $stmt->close();
    return $carrExp;
}

function getSolicitud() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getSolicitud();");
    $stmt->execute();
    $i = 0;
    $soli[0][0] = 'x';
    $stmt->bind_result($idsolicitud, $Nombre, $Apellidos, $Email, $Semestre, $Grupo, $Telefono, $Matricula, $Proyecto, $Fecha, $Leida);
    while ($stmt->fetch()) {
        $soli[$i][0] = $idsolicitud;
        $soli[$i][1] = $Nombre;
        $soli[$i][2] = $Apellidos;
        $soli[$i][3] = $Email;
        $soli[$i][4] = $Semestre;
        $soli[$i][5] = $Grupo;
        $soli[$i][6] = $Telefono;
        $soli[$i][7] = $Matricula;
        $soli[$i][8] = $Proyecto;
        $soli[$i][9] = $Fecha;
        $soli[$i][10] = $Leida;
        $i++;
    }
    $stmt->close();
    return $soli;
}

function getPostfb() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getPostfb();");
    $stmt->execute();
    $i = 0;
    $stmt->bind_result($idpostfb, $post, $Estado, $subtitulo);
    while ($stmt->fetch()) {
        $postFb[$i][0] = $idpostfb;
        $postFb[$i][1] = $post;
        $postFb[$i][2] = $Estado;
        $postFb[$i][3] = $subtitulo;
        $i++;
    }
    $stmt->close();
    return $postFb;
}

function getInforelevante() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getInforelevante();");
    $stmt->execute();
    $i = 0;
    $stmt->bind_result($idinfoRelevante, $año, $tiempo, $matriculas, $numEspecialidades, $numLaboratorios, $desTecno);
    while ($stmt->fetch()) {
        $infoR[$i][0] = $idinfoRelevante;
        $infoR[$i][1] = $año;
        $infoR[$i][2] = $tiempo;
        $infoR[$i][3] = $matriculas;
        $infoR[$i][4] = $numEspecialidades;
        $infoR[$i][5] = $numLaboratorios;
        $infoR[$i][6] = $desTecno;
        $i++;
    }
    $stmt->close();
    return $infoR;
}
