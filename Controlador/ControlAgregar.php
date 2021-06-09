<?php

include("../Config/Conexion.php");
$con = conectar();
$opGlobal = $_POST['opGlobal'];

switch ($opGlobal):

    case 1://Admin Especialidad
        $opEsp = $_POST['opEsp'];
        switch ($opEsp):
            case 1:
                $nombreEsp = $_POST['nombreEspAdd'];
                $objetivoEsp = $_POST['objetivoEspAdd'];
                $nomPdf = $_FILES['pdfReticulaAdd']['name'];
                $guardadoPdf = $_FILES['pdfReticulaAdd']['tmp_name'];
                $nomImg = $_FILES['imagenAdd']['name'];
                $guardadoImg = $_FILES['imagenAdd']['tmp_name'];
                if (!file_exists('../pdf/malla')) {
                    mkdir('../pdf/malla', 0777, TRUE);
                    if (file_exists('../pdf/malla')) {
                        move_uploaded_file($guardadoPdf, '../pdf/malla/' . $nomPdf);
                    }
                } else {
                    move_uploaded_file($guardadoPdf, '../pdf/malla/' . $nomPdf);
                }
                if (!file_exists('../img/especialidades')) {
                    mkdir('../img/especialidades', 0777, TRUE);
                    if (file_exists('../img/especialidades')) {
                        move_uploaded_file($guardadoImg, '../img/especialidades/' . $nomImg);
                    }
                } else {
                    move_uploaded_file($guardadoImg, '../img/especialidades/' . $nomImg);
                }
                $stmt = $con->prepare("call isic.sp_AddEspecialidad(?,?,?,?)");
                $stmt->bind_param("ssss", $nombreEsp, $objetivoEsp, $nomPdf, $nomImg);
                break;
            case 2:
                $perfilEsp = $_POST['perfilEspAdd'];
                $idegresoEsp = $_POST['idegresoEspAdd'];
                $stmt = $con->prepare("call isic.sp_AddPEgreEsp(?,?)");
                $stmt->bind_param("is", $idegresoEsp, $perfilEsp);
                break;
        endswitch;
        $aux = "Especialidad";
        break;

    case 2://Admin Investigacion
        $opInv = $_POST['opInv'];
        switch ($opInv) :
            case 1:
                $temaInvInv = $_POST['temaInvInvAdd'];
                $stmt = $con->prepare("call isic.sp_AddTemaLineaInvest(?)");
                $stmt->bind_param("s", $temaInvInv);
                break;
            case 2:
                $temaInv = $_POST['temaInvAdd'];
                $docenteInv = $_POST['docenteInvAdd'];
                $cargoInv = $_POST['cargoInvAdd'];
                $stmt = $con->prepare("call isic.sp_AddColaboradorInv(?,?,?)");
                $stmt->bind_param("iii", $temaInv, $docenteInv, $cargoInv);
                break;
            default:
                break;
        endswitch;
        $aux = "Investigacion";
        break;

    case 3://Admin Malla
        $claveMC = $_POST['claveMCAdd'];
        $horasMC = $_POST['horasMCAdd'];
        $semestreMC = $_POST['semestreMCAdd'];
        $conocimientoMC = $_POST['conocimientoMCAdd'];
        $especialidadMC = $_POST['especialidadMCAdd'];
        $nombreMC = $_POST['nombreMCAdd'];

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
        $opExp = $_POST['opExp'];
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
                $addCarpetaImag = $_POST['addCarpetaImag'];
                $addIdPeriImag = $_POST['addIdPeriImag'];
                $addDescripcionExp = $_POST['addDescripcionExp'];
                $nomImg = $_FILES['addImgExp']['name'];
                $guardadoImg = $_FILES['addImgExp']['tmp_name'];
                if (!file_exists('../img/expoISC/' . $addCarpetaImag)) {
                    mkdir(('../img/expoISC/' . $addCarpetaImag), 0755, TRUE);
                    if (file_exists('../img/expoISC/' . $addCarpetaImag)) {
                        move_uploaded_file($guardadoImg, ('../img/expoISC/' . $addCarpetaImag . '/') . $nomImg);
                    }
                } else {
                    move_uploaded_file($guardadoImg, ('../img/expoISC/' . $addCarpetaImag . '/') . $nomImg);
                }
                $stmt = $con->prepare("call isic.sp_AddImgExpo(?,?,?)");
                $stmt->bind_param("iss", $addIdPeriImag, $addDescripcionExp, $nomImg);
                $aux = "Expo";
                break;
            case 2:
                $txtCarAdd = $_POST['txtCarAdd'];
                $nomImg = $_FILES['imgCarAdd']['name'];
                $guardadoImg = $_FILES['imgCarAdd']['tmp_name'];
                if (!file_exists('../img/carousel-eventos')) {
                    mkdir('../img/carousel-eventos', 0777, TRUE);
                    if (file_exists('../img/carousel-eventos')) {
                        move_uploaded_file($guardadoImg, '../img/carousel-eventos/' . $nomImg);
                    }
                } else {
                    move_uploaded_file($guardadoImg, '../img/carousel-eventos/' . $nomImg);
                }
                $stmt = $con->prepare("call isic.sp_AddCarruselExpo(?,?)");
                $stmt->bind_param("ss", $nomImg, $txtCarAdd);
                $aux = "Expo";
                break;
        endswitch;
        break;

    case 5://Admin Asesorias
        $docenteAs = $_POST['docenteAsAdd'];
        $asignaturaAs = $_POST['asignaturaAsAdd'];
        $diaAs = $_POST['diaAsAdd'];
        $horaIniAs = $_POST['horaIniAsAdd'];
        $horaFinAs = $_POST['horaFinAsAdd'];

        $stmt = $con->prepare("call isic.sp_AddAsesoria(?,?,?,?,?)");
        $stmt->bind_param("isiii", $docenteAs, $asignaturaAs, $horaIniAs, $horaFinAs, $diaAs);
        $aux = "Asesorias";
        break;
    case 6://Admin Complementarias
        $nombreComplement = $_POST['nombreComplementAdd'];
        $descComplement = $_POST['descComplementAdd'];

        $nomPdf = $_FILES['pdfComplementAdd']['name'];
        $guardadoPdf = $_FILES['pdfComplementAdd']['tmp_name'];
        $nomImg = $_FILES['imagenComplementAdd']['name'];
        $guardadoImg = $_FILES['imagenComplementAdd']['tmp_name'];
        if (!file_exists('../pdf/complementarias')) {
            mkdir('../pdf/complementarias', 0777, TRUE);
            if (file_exists('../pdf/complementarias')) {
                move_uploaded_file($guardadoPdf, '../pdf/complementarias/' . $nomPdf);
            }
        } else {
            move_uploaded_file($guardadoPdf, '../pdf/complementarias/' . $nomPdf);
        }
        if (!file_exists('../img/servicios/complementarias')) {
            mkdir('../img/servicios/complementarias', 0777, TRUE);
            if (file_exists('../img/servicios/complementarias')) {
                move_uploaded_file($guardadoImg, '../img/servicios/complementarias/' . $nomImg);
            }
        } else {
            move_uploaded_file($guardadoImg, '../img/servicios/complementarias/' . $nomImg);
        }

        $stmt = $con->prepare("call isic.sp_AddComplementarias(?,?,?,?)");
        $stmt->bind_param("ssss", $nombreComplement, $descComplement, $nomImg, $nomPdf);
        $aux = "Complementarias";
        break;

    case 7://Admin Historial Especialidad
        $opHist = $_POST['opHist'];
        switch ($opHist):
            case 1:
                $nombreHist = $_POST['nombreHistAdd'];
                $objetivoHist = $_POST['objHistAdd'];
                $nomImg = $_FILES['imagenHistAdd']['name'];
                $guardadoImg = $_FILES['imagenHistAdd']['tmp_name'];
                if (!file_exists('../img/especialidades')) {
                    mkdir('../img/especialidades/historial', 0777, TRUE);
                    if (file_exists('../img/especialidades/historial')) {
                        move_uploaded_file($guardadoImg, '../img/especialidades/historial/' . $nomImg);
                    }
                } else {
                    move_uploaded_file($guardadoImg, '../img/especialidades/historial/' . $nomImg);
                }
                $stmt = $con->prepare("call isic.sp_AddHistorialInfo(?,?,?)");
                $stmt->bind_param("sss", $nombreHist, $objetivoHist, $nomImg);
                break;
            case 2:
                $espConteHisto = $_POST['espConteHistoAdd'];
                $nombreCont = $_POST['nombreContAdd'];
                $stmt = $con->prepare("call isic.sp_AddContenidoHis(?,?)");
                $stmt->bind_param("is", $espConteHisto, $nombreCont);
                break;
        endswitch;
        $aux = "HistorialEsp";
        break;
endswitch;
$stmt->execute();
$stmt->close();
header("Location: ../Admin" . $aux . ".php");
?>

