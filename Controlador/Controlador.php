<?php

include("./Config/Conexion.php");
$con = conectar();
$maxMalla = 0;
if (!$con) {
    die("no se pudo conectar");
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
        $maxMalla = (sizeof($malla[$i]) > $maxMalla)?sizeof($malla[$i]):$maxMalla;
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
    $stmt->bind_result($Nombre, $Objetivo, $pdfReticula);
    $i = 0;
    while ($stmt->fetch()) {
        $espInfo[$i][0] = $Nombre;
        $espInfo[$i][1] = $Objetivo;
        $espInfo[$i][2] = $pdfReticula;
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
    $stmt->bind_result($iddocente, $Docente);
    $i = 0;
    while ($stmt->fetch()) {
        $doce[$i][0] = $iddocente;
        $doce[$i][1] = $Docente;
        $i++;
    }
    $stmt->close();
    return $doce;
}

function getEspecialidadAdmin() {
    global $con;
    $stmt = $con->prepare("call isic.sp_getEspecialidadAdmin();");
    $stmt->execute();
    $stmt->bind_result($idespecialidad, $Nombre, $Objetivo, $Estado, $pdfReticula);
    $i = 0;
    while ($stmt->fetch()) {
        $especialidad[$i][0] = $idespecialidad;
        $especialidad[$i][1] = $Nombre;
        $especialidad[$i][2] = $Objetivo;
        $especialidad[$i][3] = $Estado;
        $especialidad[$i][4] = $pdfReticula;
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

function getListaServicios(){
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