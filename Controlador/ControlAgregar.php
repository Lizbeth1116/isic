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

    $docenteAs = $_POST['docenteAsAdd'];
    $asignaturaAs = $_POST['asignaturaAsAdd'];
    $diaAs = $_POST['diaAsAdd'];
    $horaIniAs = $_POST['horaIniAsAdd'];
    $horaFinAs = $_POST['horaFinAsAdd'];
} else {
    $opExp = $_POST['opExp'];
    $addIdPeriImag = $_POST['addIdPeriImag'];
    $addDescripcionExp = $_POST['addDescripcionExp'];
    $addCarpetaImag = $_POST['addCarpetaImag'];
}

switch ($opGlobal):
    case 1://Admin Especialidad
        $nomPdf = $_FILES['pdfReticulaAdd']['name'];
        $guardadoPdf = $_FILES['pdfReticulaAdd']['tmp_name'];
        if (!file_exists('../pdf/malla')) {
            mkdir('../pdf/malla', 0777, TRUE);
            if (file_exists('../pdf/malla')) {
                move_uploaded_file($guardadoPdf, '../pdf/malla/' . $nomPdf);
            }
        } else {
            move_uploaded_file($guardadoPdf, '../pdf/malla/' . $nomPdf);
        }
        switch ($opEsp):
            case 1:
                $stmt = $con->prepare("call isic.sp_AddEspecialidad(?,?,?)");
                $stmt->bind_param("sss", $nombreEsp, $objetivoEsp, $nomPdf);
                break;
            case 2:
                $stmt = $con->prepare("call isic.sp_AddPEgreEsp(?,?)");
                $stmt->bind_param("is", $idegresoEsp, $perfilEsp);
                break;
        endswitch;
        $aux = "Especialidad";
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
        $nomPdf = $_FILES['pdfAsignaturaAdd']['name'];
        $guardadoPdf = $_FILES['pdfAsignaturaAdd']['tmp_name'];
        if (!file_exists('../pdf/asignaturas')) {
            mkdir('../pdf/asignaturas', 0777, TRUE);
            if (file_exists('../pdf/asignaturas')) {
                move_uploaded_file($guardadoPdf, '../pdf/asignaturas/' . $nomPdf);
            }
        } else {
            move_uploaded_file($guardadoPdf, '../pdf/asignaturas/' . $nomPdf);
        }
        $stmt = $con->prepare("call isic.sp_AddAsignaturaMalla(?,?,?,?,?,?,?)");
        $stmt->bind_param("ssissis", $claveMC, $nombreMC, $semestreMC, $horasMC, $conocimientoMC, $especialidadMC, $nomPdf);
        $aux = "Malla";
        break;
    case 4://Admin Expo
        switch ($opExp):
            case 0:
                $addAnioExp = $_POST['addAnioExp'];
                $addperiodoExpo = $_POST['addperiodoExpo'];
                $nomCarpeta = ($addAnioExp . "_" . (($addperiodoExpo == 1) ? "Enero-Mayo" : "Agosto-Diciembre"));
                if (!file_exists('../img/expoISC/' . $nomCarpeta)) {
                    mkdir(('../img/expoISC/' . $nomCarpeta), 0755, TRUE);
                }
                $stmt = $con->prepare("call isic.sp_AddPeroExpo(?,?,?)");
                $stmt->bind_param("iis", $addperiodoExpo, $addAnioExp, $nomCarpeta);
                $aux = "Expo";
                break;
            case 1:
                $nomImg = $_FILES['addImgExp']['name'];
                $guardadoImg = $_FILES['addImgExp']['tmp_name'];
                if (!file_exists('../img/expoISC/'.$addCarpetaImag)) {
                    mkdir(('../img/expoISC/'.$addCarpetaImag), 0755, TRUE);
                    if (file_exists('../img/expoISC/'.$addCarpetaImag)) {
                        move_uploaded_file($guardadoImg, ('../img/expoISC/'.$addCarpetaImag.'/') . $nomImg);
                    }
                } else {
                    move_uploaded_file($guardadoImg, ('../img/expoISC/'.$addCarpetaImag.'/') . $nomImg);
                }
                $stmt = $con->prepare("call isic.sp_AddImgExpo(?,?,?)");
                $stmt->bind_param("iss", $addIdPeriImag, $addDescripcionExp, $nomImg);
                $aux = "Expo";
                break;
        endswitch;
        break;
    case 5://Admin Asesorias
        $stmt = $con->prepare("call isic.sp_AddAsesoria(?,?,?,?,?)");
        $stmt->bind_param("isiii", $docenteAs, $asignaturaAs, $horaIniAs, $horaFinAs, $diaAs);
        $aux = "Asesorias";
        break;
endswitch;
$stmt->execute();
$stmt->close();
header("Location: ../Admin" . $aux . ".php");
?>

