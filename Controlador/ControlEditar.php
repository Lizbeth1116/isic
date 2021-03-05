<?php

include("../Config/Conexion.php");
$con = conectar();

$opGlobal = $_POST['opGlobal'];

$opEsp = $_POST['opEsp'];
$idespecialidadEsp = $_POST['idespecialidadEsp'];
$nombreEsp = $_POST['nombreEsp'];
$objetivoEsp = $_POST['objetivoEsp'];
$perfilEsp = $_POST['perfilEsp'];
$idegresoEsp = $_POST['idegresoEsp'];
$perfilOriEsp = $_POST['perfilOriEsp'];
$claveEsp = $_POST['claveEsp'];
$idEspEsp = $_POST['idEspEsp'];
$descripcionEsp = $_POST['descripcionEsp'];

$opInv = $_POST['opInv'];
$temaInvInv = $_POST['temaInvInv'];
$idtemaInvInv = $_POST['idtemaInvInv'];

$temaInv = $_POST['temaInv'];
$docenteInv = $_POST['docenteInv'];
$cargoInv = $_POST['cargoInv'];
$temaOriInv = $_POST['temaOriInv'];
$docenteOriInv = $_POST['docenteOriInv'];

$opMC = $_POST['opMC'];
$claveMC = $_POST['claveMC'];
$horasMC = $_POST['horasMC'];
$semestreMC = $_POST['semestreMC'];
$conocimientoMC = $_POST['conocimientoMC'];
$especialidadMC = $_POST['especialidadMC'];
$nombreMC = $_POST['nombreMC'];
$claveOriMC = $_POST['claveOriMC'];
$idespecialidadOriMC = $_POST['idespecialidadOriMC'];

$idImgEsp = $_POST['idImgExp'];
$opExp = $_POST['opExp'];
$descripcionExp = $_POST['descripcionExp'];
$idPeriExp = $_POST['idPeriExp'];
$AnioExp = $_POST['AnioExp'];
$periodoExpo = $_POST['periodoExpo'];

switch ($opGlobal):
    case 1://Admin Especialidad
        switch ($opEsp):
            case 1:
                $stmt = $con->prepare("call isic.sp_editarEsp(?,?,?)");
                $stmt->bind_param("iss", $idespecialidadEsp, $nombreEsp, $objetivoEsp);
                break;
            case 2:
                $stmt = $con->prepare("call isic.sp_editPEgreso(?,?,?)");
                $stmt->bind_param("iss", $idegresoEsp, $perfilOriEsp, $perfilEsp);
                break;
            case 3:
                $stmt = $con->prepare("call isic.sp_editAsigEsp(?,?,?)");
                $stmt->bind_param("iss", $idEspEsp, $claveEsp, $descripcionEsp);
                break;
        endswitch;
        $aux = "Especialidad";
        ;
        break;
    case 2://Admin Investigacion
        switch ($opInv) :
            case 1:
                $stmt = $con->prepare("call isic.sp_editTemaIvs(?,?)");
                $stmt->bind_param("is", $idtemaInvInv, $temaInvInv);
                break;
            case 2:
                $stmt = $con->prepare("call isic.sp_editarLineaInv(?,?,?,?,?)");
                $stmt->bind_param("iiiii", $temaOriInv, $docenteOriInv, $temaInv, $docenteInv, $cargoInv);
                break;
            default:
                break;
        endswitch;
        $aux = "Investigacion";
        break;
    case 3://Admin Malla
        $stmt = $con->prepare("call isic.sp_editarAsig(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssisssiii", $claveMC, $nombreMC, $semestreMC, $horasMC, $conocimientoMC, $claveOriMC, $idespecialidadOriMC, $especialidadMC, $opMC);
        $aux = "Malla";
        break;
    case 4://Admin Expo
        switch ($opExp):
            case 0:
                $stmt = $con->prepare("call isic.sp_editPeriodoExpo(?,?,?)");
                $stmt->bind_param("iii", $idPeriExp, $periodoExpo, $AnioExp);
                $aux = "Expo";
                break;
            case 1:
                $stmt = $con->prepare("call isic.sp_editImgExpo(?,?)");
                $stmt->bind_param("is", $idImgEsp, $descripcionExp);
                $aux = "Expo";
                break;
        endswitch;
        break;
endswitch;
$stmt->execute();
$stmt->close();
header("Location: ../Admin" . $aux . ".php");
?>

