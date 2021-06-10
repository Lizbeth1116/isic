<?php
include('head.php');
$sp = $_GET["sp"];
$espInfo = getEspecialidadInfo($sp);
$malla = getMalla($sp);
$max = getMaxMalla();
?>
<div class="especialidad">
    <div class="contenedor-texto topmargin-xs">
        <div class="t-malla container">
            <h2 class="text-center" style="color:#5f5f5f !important;">Malla Curricular</h2>
            <p class="text-center" style="color:#5f5f5f !important;">RETICULA DE INGENIERÍA EN SISTEMAS COMPUTACIONALES CLAVE ISIC-2010-224, Especilidad: <?php echo '' . $espInfo[0][0] . '' ?></p>
        </div>
        <div class="text-center">
            <?php
            echo '<a class="text-center btn btn-light" target="_black" href="http://' . $_SERVER['HTTP_HOST'] . '/isic/pdf/malla/' . $espInfo[0][2] . '">Descargar</a>';
            ?>
        </div>
        <div>
            <div class="malla">
                <div class="row">
                    <?php
                    $aux2 = 0;
                    for ($i = 1; $i < 10; $i++) {
                        echo '<div class="col-sm">';
                        echo '<div class="mb-3 semestres text-center" >
                                                    <p style="color:#5f5f5f !important;"><b>' . $i . '° Semestre</b></p>
                                                    </div>';
                        for ($j = 0; $j < sizeof($malla[$i]); $j++) {
                            if ($malla[$i][$j][5] != "Sin Archivo") {
                                echo '<a target="_black" href="http://' . $_SERVER['HTTP_HOST'] . '/isic/pdf/asignaturas/' . $malla[$i][$j][5] . '"><div id="etiqueta' . $aux2 . '" class="' . $malla[$i][$j][3] . ' resume-item mb-2 partedos">';
                            } else {
                                echo '<div id="etiqueta' . $aux2 . '" class="' . $malla[$i][$j][3] . ' resume-item mb-2 partedos">';
                            }
                            echo'   <p class="text-center" style="color:#5f5f5f !important;">
                                        <b>' . $malla[$i][$j][2] . '</b>
                                        <br>' . $malla[$i][$j][1] . '
                                        <br>' . $malla[$i][$j][0] . '
                                        </p>            
                                        </div></a>';
                            $aux2++;
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="descripcion">
            <div class="">
                <div class="row">
                    <div class="col-md-3">
                        <!--estas son columnas-->
                        
                        <div class="resume-item mb-2">
                            <!--estas son filas-->
                            <h5>Área de conocimiento</h5>
                            <p class="text-center">
                            <table>
                                <tr>
                                    <?php echo '<td>' . $area[0][0] . ' ' . $area[0][1] . 'hrs</td>' ?>
                                    <td><i class="bi bi-circle-fill" style="color: #ffcbf8; padding-left: 8px;"></i></td>
                                </tr>
                                <tr>
                                    <?php echo '<td>' . $area[1][0] . ' ' . $area[1][1] . 'hrs</td>' ?>
                                    <td><i class="bi bi-circle-fill" style="color: #cfffcb; padding-left: 8px;"></i></td>
                                </tr>
                                <tr>
                                    <?php echo '<td>' . $area[2][0] . ' ' . $area[2][1] . 'hrs</td>' ?>
                                    <td><i class="bi bi-circle-fill" style="color: #fffbb5; padding-left: 8px;"></i></td>
                                </tr>
                                <tr>
                                    <?php echo '<td>' . $area[3][0] . ' ' . $area[3][1] . 'hrs</td>' ?>
                                    <td><i class="bi bi-circle-fill" style="color: #ffdfb5; padding-left: 8px;"></i></td>
                                </tr>
                                <tr>
                                    <?php echo '<td>' . $area[4][0] . ' ' . $area[4][1] . 'hrs</td>' ?>
                                    <td><i class="bi bi-circle-fill" style="color: #d1b5ff; padding-left: 8px;"></i></td>
                                </tr>
                                <tr>
                                    <?php echo '<td>' . $area[5][0] . ' ' . $area[5][1] . 'hrs</td>' ?>
                                    <td><i class="bi bi-circle-fill" style="color: #5c87ff; padding-left: 8px;"></i></td>
                                </tr>
                                <tr>
                                    <?php echo '<td>' . $area[6][0] . ' ' . $area[6][1] . 'hrs</td>' ?>
                                    <td><i class="bi bi-circle-fill" style="color: #b7ddb9; padding-left: 8px;"></i></td>
                                </tr>
                                <tr>
                                    <?php echo '<td>' . $area[7][0] . ' ' . $area[7][1] . 'hrs</td>' ?>
                                    <td><i class="bi bi-circle-fill" style="padding-left: 8px; color: #6dcc5a;"></i></td>
                                </tr>
                            </table>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!--estas son columnas-->
                        <div class="resume-item mb-2 partedos">
                            <h5>Nomenclatura</h5>
                            <p>
                                Prerrequisito <i class="fas fa-long-arrow-alt-right"></i>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!--estas son columnas-->
                        <div class="resume-item mb-2 partedos">
                            <h5>Créditos</h5>
                            <p class="text-center">
                            <table>
                                <tr>
                                    <td>Estructura Genérica: </td>
                                    <td>210</td>
                                </tr>
                                <tr>
                                    <td>Residencia:</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Servicio Social:</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Actividades Complementarias:</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Especialidad:</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td><b>Total de Créditos:</b></td>
                                    <td><b>260</b></td>
                                </tr>
                            </table>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!--estas son columnas-->
                        <div class="resume-item mb-2 partedos">
                            <h5>Requisitos de titulación</h5>
                            <p class="text-center">
                            <ol>
                                <li> Aprobar todas las asignaturas de la estructura genérica y del módulo de especialidad.</li>
                                <li> Acreditar la Residencia Profesional y Servicio Social.</li>
                                <li> Acreditar Actividades Complementarias.</li>
                                <li> Aprobar el Requisito de Comprensión del Idioma Inglés.</li>
                            </ol>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>