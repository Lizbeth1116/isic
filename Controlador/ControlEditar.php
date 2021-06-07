<?php

include("../Config/Conexion.php");
$con = conectar();

$opGlobal = $_POST['opGlobal'];

switch ($opGlobal):
    case 1://Admin Especialidad
        $opEsp = $_POST['opEsp'];
        switch ($opEsp):
            case 1:
                $idespecialidadEsp = $_POST['idespecialidadEsp'];
                $nombreEsp = $_POST['nombreEsp'];
                $objetivoEsp = $_POST['objetivoEsp'];
                $nomPdf = $_FILES['pdfReticula']['name'];
                $guardadoPdf = $_FILES['pdfReticula']['tmp_name'];
                $nomImg = $_FILES['imagenEsp']['name'];
                $guardadoImg = $_FILES['imagenEsp']['tmp_name'];
                if (strlen($nomPdf) > 0) {
                    if (file_exists("../pdf/malla/" . $_POST['nomOriPdfEsp'])) {
                        unlink("../pdf/malla/" . $_POST['nomOriPdfEsp']);
                    }
                    move_uploaded_file($guardadoPdf, '../pdf/malla/' . $nomPdf);
                    $newNomPdf = $nomPdf;
                } else {
                    $newNomPdf = $_POST['nomOriPdfEsp'];
                }
                if (strlen($nomImg) > 0) {
                    if (file_exists("../img/especialidades/" . $_POST['nomOriImgEsp'])) {
                        unlink("../img/especialidades/" . $_POST['nomOriImgEsp']);
                    }
                    move_uploaded_file($guardadoImg, '../img/especialidades/' . $nomImg);
                    $newNomImg = $nomImg;
                } else {
                    $newNomImg = $_POST['nomOriImgEsp'];
                }
                $stmt = $con->prepare("call isic.sp_editarEsp(?,?,?,?,?)");
                $stmt->bind_param("issss", $idespecialidadEsp, $nombreEsp, $objetivoEsp, $newNomPdf, $newNomImg);
                break;
            case 2:
                $perfilEsp = $_POST['perfilEsp'];
                $idegresoEsp = $_POST['idegresoEsp'];
                $perfilOriEsp = $_POST['perfilOriEsp'];
                $stmt = $con->prepare("call isic.sp_editPEgreso(?,?,?)");
                $stmt->bind_param("iss", $idegresoEsp, $perfilOriEsp, $perfilEsp);
                break;
            case 3:
                $claveEsp = $_POST['claveEsp'];
                $idEspEsp = $_POST['idEspEsp'];
                $descripcionEsp = $_POST['descripcionEsp'];
                $stmt = $con->prepare("call isic.sp_editAsigEsp(?,?,?)");
                $stmt->bind_param("iss", $idEspEsp, $claveEsp, $descripcionEsp);
                break;
        endswitch;
        $aux = "Especialidad";
        break;

    case 2://Admin Investigacion
        $opInv = $_POST['opInv'];
        switch ($opInv) :
            case 1:
                $temaInvInv = $_POST['temaInvInv'];
                $idtemaInvInv = $_POST['idtemaInvInv'];
                $stmt = $con->prepare("call isic.sp_editTemaIvs(?,?)");
                $stmt->bind_param("is", $idtemaInvInv, $temaInvInv);
                break;
            case 2:
                $temaInv = $_POST['temaInv'];
                $docenteInv = $_POST['docenteInv'];
                $cargoInv = $_POST['cargoInv'];
                $temaOriInv = $_POST['temaOriInv'];
                $docenteOriInv = $_POST['docenteOriInv'];
                $stmt = $con->prepare("call isic.sp_editarLineaInv(?,?,?,?,?)");
                $stmt->bind_param("iiiii", $temaOriInv, $docenteOriInv, $temaInv, $docenteInv, $cargoInv);
                break;
            default:
                break;
        endswitch;
        $aux = "Investigacion";
        break;
    case 3://Admin Malla
        $opMC = $_POST['opMC'];
        $claveMC = $_POST['claveMC'];
        $horasMC = $_POST['horasMC'];
        $semestreMC = $_POST['semestreMC'];
        $conocimientoMC = $_POST['conocimientoMC'];
        $especialidadMC = $_POST['especialidadMC'];
        $nombreMC = $_POST['nombreMC'];
        $claveOriMC = $_POST['claveOriMC'];
        $idespecialidadOriMC = $_POST['idespecialidadOriMC'];
        $nomPdf = $_FILES['pdfAsignatura']['name'];
        $guardadoPdf = $_FILES['pdfAsignatura']['tmp_name'];
        if (strlen($nomPdf) > 0) {
            if (file_exists("../pdf/asignaturas/" . $_POST['nomOriPdf'])) {
                unlink("../pdf/asignaturas/" . $_POST['nomOriPdf']);
            }
            move_uploaded_file($guardadoPdf, '../pdf/asignaturas/' . $nomPdf);
            $newNomPdf = $nomPdf;
        } else {
            $newNomPdf = $_POST['nomOriPdf'];
        }
        $stmt = $con->prepare("call isic.sp_editarAsig(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssisssiiis", $claveMC, $nombreMC, $semestreMC, $horasMC, $conocimientoMC, $claveOriMC, $idespecialidadOriMC, $especialidadMC, $opMC, $newNomPdf);
        $aux = "Malla";
        break;
    case 4://Admin Expo
        $opExp = $_POST['opExp'];
        switch ($opExp):
            case 0:
                $idPeriExp = $_POST['idPeriExp'];
                $AnioExp = $_POST['AnioExp'];
                $periodoExpo = $_POST['periodoExpo'];
                $periodoExpoOri = $_POST['periodoExpoOri'];
                $AnioExpOri = $_POST['AnioExpOri'];
                $AnioExp = $_POST['AnioExp'];
                $periodoExpo = $_POST['periodoExpo'];
                $nomCarpeta = ($AnioExp . "_" . (($periodoExpo == 1) ? "Enero-Mayo" : "Agosto-Diciembre"));
                $nomCarpetaOri = ($AnioExpOri . "_" . (($periodoExpoOri == 1) ? "Enero-Mayo" : "Agosto-Diciembre"));
                if ($nomCarpetaOri != $nomCarpeta) {
                    if (file_exists('../img/expoISC/' . $nomCarpetaOri)) {
                        rename(('../img/expoISC/' . $nomCarpetaOri), ('../img/expoISC/' . $nomCarpeta));
                    } else {
                        mkdir(('../img/expoISC/' . $nomCarpeta), 0755, TRUE);
                    }
                }
                $stmt = $con->prepare("call isic.sp_editPeriodoExpo(?,?,?,?)");
                $stmt->bind_param("iiis", $idPeriExp, $periodoExpo, $AnioExp, $nomCarpeta);
                $aux = "Expo";
                break;
            case 1:
                $idImgEsp = $_POST['idImgExp'];
                $CarpetaImag = $_POST['CarpetaImag'];
                $descripcionExp = $_POST['descripcionExp'];
                $nomImg = $_FILES['ImgExp']['name'];
                $guardadoImg = $_FILES['ImgExp']['tmp_name'];
                if (strlen($nomImg) > 0) {
                    if (file_exists('../img/expoISC/' . $CarpetaImag . '/' . $_POST['nomImagOri'])) {
                        unlink('../img/expoISC/' . $CarpetaImag . '/' . $_POST['nomImagOri']);
                    }
                    move_uploaded_file($guardadoImg, '../img/expoISC/' . $CarpetaImag . '/' . $nomImg);
                    $newNomIng = $nomImg;
                } else {
                    $newNomIng = $_POST['nomImagOri'];
                }
                $stmt = $con->prepare("call isic.sp_editImgExpo(?,?,?)");
                $stmt->bind_param("iss", $idImgEsp, $descripcionExp, $newNomIng);
                $aux = "Expo";
                break;
        endswitch;
        break;
    case 5://Admin Asesorias
        $stmt = $con->prepare("call isic.sp_editAsesoria(?,?,?,?,?,?)");
        $stmt->bind_param("iisiii", $_POST['idAsesoria'], $_POST['docenteAs'], $_POST['asignaturaAs'], $_POST['horaIniAs'], $_POST['horaFinAs'], $_POST['diaAs']);
        $aux = "Asesorias";
        break;
    case 6://Pasar Especialidad a Historial
        include("./Controlador.php");
        $idAdverEsp = $_POST['idAdverEsp'];
        $Info = getEspecialidadInfo($idAdverEsp);
        $stmt = $con->prepare("call isic.sp_AddHistorialInfo(?,?,?)");
        $stmt->bind_param("sss", $Info[0][0], $Info[0][1], $Info[0][3]);
        $stmt->execute();
        $stmt->close();

        if (file_exists("../img/especialidades/" . $Info[0][3])) {
            copy('../img/especialidades/' . $Info[0][3], '../img/especialidades/historial/' . $Info[0][3]);
            unlink("../img/especialidades/" . $Info[0][3]);
        }

        if (file_exists("../pdf/malla/" . $Info[0][2])) {
            unlink("../pdf/malla/" . $Info[0][2]);
        }
        $IdHistorial = getIdHistorial($Info[0][0]);
        $contenido = getDatosAPasarHistorial($idAdverEsp);
        for ($i = 0; $i < sizeof($contenido); $i++) {
            if (file_exists("../pdf/asignaturas/" . $contenido[$i][1])) {
                unlink("../pdf/asignaturas/" . $contenido[$i][1]);
            }
            $stmt = $con->prepare("call isic.sp_AddContenidoHistorial(?,?)");
            $stmt->bind_param("is", $IdHistorial[0], $contenido[$i][0]);
            $stmt->execute();
            $stmt->close();
        }
        $stmt = $con->prepare("call isic.sp_DesHabEsp(?,?,?)");
        $var1 = 0;
        $var2 = 2;
        $stmt->bind_param("iii", $idAdverEsp, $var1, $var2);
        $aux = "Especialidad";
        break;
    case 7:
        $idComplement = $_POST['idComplement'];
        $nombreComplement = $_POST['nombreComplement'];
        $descComplement = $_POST['descComplement'];
        $nomPdf = $_FILES['pdfComplement']['name'];
        $guardadoPdf = $_FILES['pdfComplement']['tmp_name'];
        $nomImg = $_FILES['imagenComplement']['name'];
        $guardadoImg = $_FILES['imagenComplement']['tmp_name'];
        if (strlen($nomPdf) > 0) {
            if (file_exists("../pdf/complementarias/" . $_POST['nomOriPdfComplement'])) {
                unlink("../pdf/complementarias/" . $_POST['nomOriPdfComplement']);
            }
            move_uploaded_file($guardadoPdf, '../pdf/complementarias/' . $nomPdf);
            $newNomPdf = $nomPdf;
        } else {
            $newNomPdf = $_POST['nomOriPdfComplement'];
        }
        if (strlen($nomImg) > 0) {
            if (file_exists("../img/servicios/complementarias/" . $_POST['nomOriImgComplement'])) {
                unlink("../img/servicios/complementarias/" . $_POST['nomOriImgComplement']);
            }
            move_uploaded_file($guardadoImg, '../img/servicios/complementarias/' . $nomImg);
            $newNomImg = $nomImg;
        } else {
            $newNomImg = $_POST['nomOriImgComplement'];
        }
        $stmt = $con->prepare("call isic.sp_editComplementarias(?,?,?,?,?)");
        $stmt->bind_param("ssssi", $nombreComplement, $descComplement, $newNomImg, $newNomPdf, $idComplement);
        $aux = "Complementarias";
        break;
endswitch;
$stmt->execute();
$stmt->close();
header("Location: ../Admin" . $aux . ".php");
?>

