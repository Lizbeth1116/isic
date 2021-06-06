<?php

include("../Config/Conexion.php");
$con = conectar();
$id = $_GET["id"];
$datos = explode('_', $id);

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
        $carpetaImg = $datos[5] . '_' . $datos[6];
        if (file_exists("../img/expoISC/" . $carpetaImg . "/" . $datos[4])) {
            unlink("../img/expoISC/" . $carpetaImg . "/" . $datos[4]);
        }
        $stmt = $con->prepare("call isic.sp_DesHabImagExpo(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "Expo";
        break;
    case 7: // Deshabilitar/Borrar Periodo Expo
        $carpetaBorra = $datos[4] . '_' . $datos[5];
        if (file_exists("../img/expoISC/" . $carpetaBorra)) {
            $files = glob("../img/expoISC/" . $carpetaBorra . "/*");
            if (sizeof($files) > 0) {
                foreach ($files as $file) {
                    if (is_file($file))
                        unlink($file); //elimino el fichero
                }
            }
            rmdir("../img/expoISC/" . $carpetaBorra);
        }
        $stmt = $con->prepare("call isic.sp_DesHabExpo(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "Expo";
        break;
    case 8: // Deshabilitar/Borrar Asesorias
        $stmt = $con->prepare("call isic.sp_DesHabAsesoria(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        $aux = "Asesorias";
        break;
endswitch;
$stmt->execute();
$stmt->close();
header("Location: ../Admin" . $aux . ".php");
?>
