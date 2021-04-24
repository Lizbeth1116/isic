<?php

include("../Config/Conexion.php");
$con = conectar();

$opGlobal = $_POST['opGlobal'];
if ($opGlobal != 4) {
    $opEsp = $_POST['opEsp'];
    $nombreEsp = $_POST['nombreEspAdd'];
    $objetivoEsp = $_POST['objetivoEspAdd'];
    $perfilEsp = $_POST['perfilEspAdd'];
    $idegresoEsp = $_POST['idegresoEspAdd'];

    $opInv = $_POST['opInv'];
    $temaInvInv = $_POST['temaInvInvAdd'];

    $temaInv = $_POST['temaInvAdd'];
    $docenteInv = $_POST['docenteInvAdd'];
    $cargoInv = $_POST['cargoInvAdd'];

    $claveMC = $_POST['claveMCAdd'];
    $horasMC = $_POST['horasMCAdd'];
    $semestreMC = $_POST['semestreMCAdd'];
    $conocimientoMC = $_POST['conocimientoMCAdd'];
    $especialidadMC = $_POST['especialidadMCAdd'];
    $nombreMC = $_POST['nombreMCAdd'];

    $idPeriExp = $_POST['idPeriExp'];
    $AnioExp = $_POST['AnioExp'];
    $periodoExpo = $_POST['periodoExpo'];
} else {
    $opExp = $_POST['opExp'];
    $addIdPeriImag = $_POST['addIdPeriImag'];
    $addDescripcionExp = $_POST['addDescripcionExp'];
    $Imag = file_get_contents($_FILES['addImgExp']['tmp_name']);
    $tipoImg = $_FILES['addImgExp']['type'];
}

switch ($opGlobal):
    case 1://Admin Especialidad
        switch ($opEsp):
            case 1:
                $stmt = $con->prepare("call isic.sp_AddEspecialidad(?,?)");
                $stmt->bind_param("ss", $nombreEsp, $objetivoEsp);
                break;
            case 2:
                $stmt = $con->prepare("call isic.sp_AddPEgreEsp(?,?)");
                $stmt->bind_param("is", $idegresoEsp, $perfilEsp);
                break;
        endswitch;
        $aux = "Especialidad";
        ;
        break;
    case 2://Admin Investigacion
        switch ($opInv) :
            case 1:
                $stmt = $con->prepare("call isic.sp_AddTemaLineaInvest(?)");
                $stmt->bind_param("s", $temaInvInv);
                break;
            case 2:
                $stmt = $con->prepare("call isic.sp_AddColaboradorInv(?,?,?)");
                $stmt->bind_param("iii", $temaInv, $docenteInv, $cargoInv);
                break;
            default:
                break;
        endswitch;
        $aux = "Investigacion";
        break;
    case 3://Admin Malla
        $stmt = $con->prepare("call isic.sp_AddAsignaturaMalla(?,?,?,?,?,?)");
        $stmt->bind_param("ssissi", $claveMC, $nombreMC, $semestreMC, $horasMC, $conocimientoMC, $especialidadMC);
        $aux = "Malla";
        break;
    case 4://Admin Expo
        switch ($opExp):
            case 0:
                $addAnioExp = $_POST['addAnioExp'];
                $addperiodoExpo = $_POST['addperiodoExpo'];
                $stmt = $con->prepare("call isic.sp_AddPeroExpo(?,?)");
                $stmt->bind_param("ii", $addperiodoExpo, $addAnioExp);
                echo "call isic.sp_AddPeroExpo(" . $addperiodoExpo . "," . $addAnioExp . ")";
                ;
                $aux = "Expo";
                break;
            case 1:
                $stmt = $con->prepare("call isic.sp_AddImgExpo(?,?,?,?)");
                $stmt->bind_param("ibss", $addIdPeriImag, $Imag, $tipoImg, $addDescripcionExp);
                $stmt->send_long_data(1, $Imag);
                $aux = "Expo";
                break;
        endswitch;
        break;
endswitch;
$stmt->execute();
$stmt->close();
header("Location: ../Admin" . $aux . ".php");
?>

