<?php

include("../Config/Conexion.php");
$con = conectar();
$id = $_GET["id"];
$datos = explode('*', $id);

switch ($datos[0]):
    case 0: // Deshabilitar/Borrar Especialidad
        if (file_exists("../pdf/malla/" . $datos[4])) {
            unlink("../pdf/malla/" . $datos[4]);
        }
        if (file_exists("../img/especialidades/" . $datos[5])) {
            unlink("../img/especialidades/" . $datos[5]);
        }
        $stmt = $con->prepare("call isic.sp_DesHabEsp(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "Especialidad";
        break;
    case 1: // Deshabilitar/Borrar Perfil de Egreso
        $stmt = $con->prepare("call isic.sp_DesHabPEgreso(?,?,?,?)");
        $stmt->bind_param("isii", $datos[1], $datos[2], $datos[3], $datos[4]);
        $aux = "Especialidad";
        break;
    case 2: // Deshabilitar/Borrar informacion de asignatura de especialidad
        $stmt = $con->prepare("call isic.sp_DesHabAsigEsp(?,?,?,?)");
        $stmt->bind_param("isii", $datos[1], $datos[2], $datos[3], $datos[4]);
        $aux = "Especialidad";
        break;
    case 3: // Deshabilitar/Borrar Asignatura de la malla
        if (file_exists("../pdf/asignaturas/" . $datos[4])) {
            unlink("../pdf/asignaturas/" . $datos[4]);
        }
        $stmt = $con->prepare("call isic.sp_DesHabMalla(?,?,?)");
        $stmt->bind_param("sii", $datos[1], $datos[2], $datos[3]);
        $aux = "Malla";
        break;
    case 4: // Deshabilitar/Borrar Tema de Investigacion
        $stmt = $con->prepare("call isic.sp_DesHabTemaInv(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "Investigacion";
        break;
    case 5: // Deshabilitar/Borrar Docente de Investigacion
        $stmt = $con->prepare("call isic.sp_DesHabLineaInvDoc(?,?,?,?)");
        $stmt->bind_param("iiii", $datos[1], $datos[2], $datos[3], $datos[4]);
        $aux = "Investigacion";
        break;
    case 6: // Deshabilitar/Borrar Imagen Expo
        if (file_exists("../img/expoISC/" . $datos[5] . "/" . $datos[4])) {
            unlink("../img/expoISC/" . $datos[5] . "/" . $datos[4]);
        }
        $stmt = $con->prepare("call isic.sp_DesHabImagExpo(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "Expo";
        break;
    case 7: // Deshabilitar/Borrar Periodo Expo
        if (file_exists("../img/expoISC/" . $datos[4])) {
            $files = glob("../img/expoISC/" . $datos[4] . "/*");
            if (sizeof($files) > 0) {
                foreach ($files as $file) {
                    if (is_file($file))
                        unlink($file); //elimino el fichero
                }
            }
            rmdir("../img/expoISC/" . $datos[4]);
        }
        $stmt = $con->prepare("call isic.sp_DesHabExpo(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "Galerias";
        break;
    case 8: // Deshabilitar/Borrar Asesorias
        $stmt = $con->prepare("call isic.sp_DesHabAsesoria(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "Asesorias";
        break;
    case 9: // Deshabilitar/Borrar Complementarias
        if (file_exists("../pdf/complementarias/" . $datos[5])) {
            unlink("../pdf/complementarias/" . $datos[5]);
        }
        echo ("../pdf/complementarias/" . $datos[5]);
        if (file_exists("../img/servicios/complementarias/" . $datos[4])) {
            unlink("../img/servicios/complementarias/" . $datos[4]);
        }
        echo ("<br>../img/servicios/complementarias/" . $datos[4]);
        $stmt = $con->prepare("call isic.sp_DesHabComplement(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "Complementarias";
        break;
    case 10: // Historial Especialidad
        if (file_exists("../img/especialidades/historial/" . $datos[4])) {
            unlink("../img/especialidades/historial/" . $datos[4]);
        }
        $stmt = $con->prepare("call isic.sp_DesHabHist(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "HistorialEsp";
        break;
    case 11: // Contenido Historial Especialidad
        $stmt = $con->prepare("call isic.sp_DesHabContenidoHis(?,?,?,?)");
        $stmt->bind_param("isii", $datos[1], $datos[2], $datos[3], $datos[4]);
        $aux = "HistorialEsp";
        break;
    case 12: // Carrusel Expo
        if (file_exists("../img/carousel-eventos/" . $datos[4])) {
            unlink("../img/carousel-eventos/" . $datos[4]);
        }
        $stmt = $con->prepare("call isic.sp_DesHabCarruselExpo(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "Galerias";
        break;
    case 13: // Solicitudes
        $stmt = $con->prepare("call isic.sp_DesHabSolicitud(?,?)");
        $stmt->bind_param("ii", $datos[1], $datos[2]);
        $aux = "Solicitudes";
        break;
    case 14: // Carrusel Expo
        if (file_exists("../img/conocenos/carousel/" . $datos[4])) {
            unlink("../img/conocenos/carousel/" . $datos[4]);
        }
        $stmt = $con->prepare("call isic.sp_DesHabCarruselExpo(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "Galerias";
    case 15: // Post FB
        $stmt = $con->prepare("call isic.DesHabPostFb(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "Galerias";
case 16:
    $stmt = $con->prepare("call isic.sp_DeleteDocente(?)");
    $stmt->bind_param("i", $datos[1]);
    $aux = "Docentes";

    case 17:
        $stmt = $con->prepare("call isic.sp_DeletePostFbisic(?)");
        $stmt->bind_param("i", $datos[1]);
        $aux = "Galerias";


endswitch;
$stmt->execute();
$stmt->close();
header("Location: ../Admin" . $aux . ".php");
?>
