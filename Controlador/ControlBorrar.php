<?php

include("../Config/Conexion.php");
$con = conectar();
$id = $_GET["id"];
$datos = explode('_', $id);

switch ($datos[0]):
    case 0: // Borrar Especialidad
        $stmt = $con->prepare("call isic.sp_DesHabEsp(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        break;
    case 1: // Borrar Perfil de Egreso
        $stmt = $con->prepare("call isic.sp_DesHabPEgreso(?,?,?,?)");
        $stmt->bind_param("isii", $datos[1], $datos[2], $datos[3], $datos[4]);
        break;
    case 2: // Borrar informacion de asignatura de especialidad
        $stmt = $con->prepare("call isic.sp_DesHabAsigEsp(?,?,?,?)");
        $stmt->bind_param("isii", $datos[1], $datos[2], $datos[3], $datos[4]);
        break;
    case 3: // Borrar Asignatura de la malla
        $stmt = $con->prepare("call isic.sp_DesHabMalla(?,?,?)");
        $stmt->bind_param("sii", $datos[1], $datos[2], $datos[3]);
        break;
    case 4: // Borrar Tema de Investigacion
        $stmt = $con->prepare("call isic.sp_DesHabTemaInv(?,?,?)");
        $stmt->bind_param("iii", $datos[1], $datos[2], $datos[3]);
        break;
    case 5: // Deshabilitar Docente de Investigacion
        $stmt = $con->prepare("call isic.sp_DesHabLineaInvDoc(?,?,?,?)");
        $stmt->bind_param("iiii", $datos[1], $datos[2], $datos[3], $datos[4]);
        break;
endswitch;
$stmt->execute();
$stmt->close();
header("Location: ../Administrador.php");
?>
