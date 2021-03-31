<?php
include('head.php');
$sp = $_GET["sp"];
$malla = getMalla($sp);
$espInfo = getEspecialidadInfo($sp);
$espAsig = getAsignaturasEsp($sp);
$espEgr = getPerfilEgreso($sp);
$max = getMaxMalla();

?>
<div class="especialidad">
    <section id="sec1">
        <div class="contenedor">
            <div class="contenedor-texto">
                <?php
                echo '<h2>' . $espInfo[0][0] . '</h2>
                                <p>' . $espInfo[0][1] . '</p>';
                ?>
            </div>
        </div>
        <?php echo '<img src="img/especialidades/' . $espInfo[0][0] . '.svg?1.0.0">' ?>

    </section>

    <section id="sec2">
        <div class="perfiles contenedor-texto container">
            <h2>Perfil de Egreso</h2>
            <ul>
                <?php
                for ($i = 0; $i < sizeof($espEgr); $i++) {
                    echo '<li><p>' . $espEgr[$i] . '</p></li>';
                }
                ?>
            </ul>
            <!---->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-5">Asignaturas</h2>
                    <?php
                    for ($i = 0; $i < sizeof($espAsig); $i++) {
                        echo '<div class="resume-item mb-4">
                                                      <h4>' . $espAsig[$i][2] . '</h4>
                                                      <p>Clave: ' . $espAsig[$i][1] . '</p>
                                                      <p>' . $espAsig[$i][3] . '</p>
                                                  </div>
                                            ';
                    }
                    ?>
                </div>
            </div>
            <!---->
        </div>
    </section>
    <section id="sec4">
        <div class="contenedor-texto topmargin-lg">
            <div class="t-malla">
                <h2 class="text-center" style="color:#5f5f5f !important;">Malla Curricular</h2>
                <p class="text-center">RETICULA DE INGENIERÍA EN SISTEMAS COMPUTACIONALES CLAVE ISIC-2010-224, Especilidad: <?php echo '' . $espInfo[0][0] . '' ?></p>
            </div>
            <div class="topmargin-xs">
                <div class="malla">
                    <div class="row">
                        <?php
                        $aux2 = 0;
                        for ($i = 1; $i < 10; $i++) {
                            echo '<div class="col-sm">';
                            echo '<div class="resume-item mb-2 partedos">
                                                    <p><b>' . $i . '° Semestre</b></p>
                                                    </div>';
                            for ($j = 0; $j < sizeof($malla[$i]); $j++) {
                                echo '<div id="etiqueta' . $aux2 . '" class="' . $malla[$i][$j][3] . ' resume-item mb-2 partedos">
                                                    <p class="text-center">
                                                    <b>' . $malla[$i][$j][2] . '</b>
                                                    <br>' . $malla[$i][$j][1] . '
                                                    <br>' . $malla[$i][$j][0] . '
                                                    </p>
                                                    </div>';
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
                            <h2 class="mb-5"></h2>
                            <div class="resume-item mb-2 partedos">
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
                            <h2 class="mb-5"></h2>
                            <div class="resume-item mb-2 partedos">
                                <h5>Nomenclatura</h5>
                                <p>
                                    Prerrequisito <i class="fas fa-long-arrow-alt-right"></i>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!--estas son columnas-->
                            <h2 class="mb-5"></h2>
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
                            <h2 class="mb-5"></h2>
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
    </section>
</div>
<?php include('footer.php'); ?>