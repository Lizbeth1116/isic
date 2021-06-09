<?php
include('head.php');
$servInfo = getServicio($_GET["idServ"]);
?>
<div class="servicios">
    <section class="seccion-1">

        <?php
        echo '<img src="img/servicios/' . $servInfo[0][0] . '.svg?1.0.0">';
        ?>
        <div class="contenedor-texto">

            <?php
            if ($_GET["idServ"] == 4) {
                echo '<h2>' . $servInfo[0][0] . '</h2>';
                $tmp = explode("*", $servInfo[0][1]);
                echo '<p>';
                for ($i = 0; $i < sizeof($tmp); $i++) {
                    echo '<i class="bi bi-check2"></i> ' . $tmp[$i] . '<br>';
                }
                echo '</p>';
            } else {
                echo '<h2>Objetivo de ' . $servInfo[0][0] . '</h2>
                      <p>' . $servInfo[0][1] . ' </p>';
            }
            ?>
        </div>

    </section>
    <?php
    if ($_GET["idServ"] == 2) {
        $Asesoria = getAsesorias();
        $asesor = getAsesor();
        echo '
        <div class="asesorias">
        <section class="site-section">
        <div class="container texto">
            <div class="section-heading text-center">
                <h2><strong>Asesorías</strong></h2>
            </div>
            <div class="row topmargin-xs">';
        $asAux = 0;
        $contar = 0;
        $numAsesoria = (int) (sizeof($asesor) / 2);
        for ($i = 0; $i < sizeof($asesor); $i++) {
            if ($contar == 0) {
                echo '<div class="col-md-6">';
            } elseif ($contar == $numAsesoria) {
                echo '</div>
                      <div class="col-md-6">';
            }
            echo ' 
                    <div class="resume-item mb-4">
                        <p>
                        <h3><strong>' . $asesor[$i][0] . '</strong></h3>
                        </p>
                        <table class="table table-light">
                            <tr>
                                <th>Asesorías</th>
                                <th>Día</th>
                                <th>Hora</th>
                            </tr>';
            for ($j = $asAux; $j < sizeof($Asesoria); $j++) {
                if ($asesor[$i][0] === $Asesoria[$j][2]) {
                    echo ' 
                                    <tr>
                                        <td>' . $Asesoria[$j][4] . '</td>';
                    switch ($Asesoria[$j][7]) {
                        case 1:
                            echo '<td>Lunes</td>';
                            break;
                        case 2:
                            echo '<td>Martes</td>';
                            break;
                        case 3:
                            echo '<td>Miercoles</td>';
                            break;
                        case 4:
                            echo '<td>Jueves</td>';
                            break;
                        case 5:
                            echo '<td>Viernes</td>';
                            break;
                    }
                    echo '
                                        <td>' . $Asesoria[$j][5] . '-' . $Asesoria[$j][6] . '</td>
                                    </tr>';
                    $asAux++;
                } else if ($asesor[$i][0] != $Asesoria[$j][2]) {
                    $j = sizeof($Asesoria);
                }
            }
            echo '
                        </table>
                    </div>
                ';
            $contar++;
            if ($contar == (sizeof($asesor))) {
                echo '</div>';
            }
        }
        echo '
            </div>
        </div>
    </section>
</div>
        ';
    }
    ?>
    <?php
    if ($_GET["idServ"] == 3) {
        $complInfo = getComplementarias();
        echo '
    <div class="complementaria">
        <div class="site-section">
            <div class="container texto">
                <div class="section-heading text-center">
                    <h2><strong>Actividades Complementarias Ofertadas por ISIC</strong></h2>
                </div>
                <div class="row topmargin-xs">
                    <div class="col-md-12">';
        for ($i = 0; $i < sizeof($complInfo); $i++) {
            if ($complInfo[$i][5] == 1) {
                echo '
                            <div class="resume-item mb-4">
                                <h3><strong>' . $complInfo[$i][1] . '</strong></h3>
                                <div class="row">
                                    <div class="col-md-5"><img src="img/servicios/complementarias/' . $complInfo[$i][3] . '"></div>
                                    <div class="col-md-7">
                                        <h4><strong>Objetivo</strong></h4>
                                        <p>
                                            ' . $complInfo[$i][2] . '
                                        </p>
                                        <p>
                                            <a target="_black" href="http://' . $_SERVER['HTTP_HOST'] . '/isic/pdf/complementarias/' . $complInfo[$i][4] . '"><button type="button" class="btn">Ver detalles</button></a>

                                        </p>
                                    </div>

                                </div>
                            </div>';
            }
        }
        echo '
                    </div>
                </div>
            </div>
        </div>
    </div>';
    }
    ?>
    </div>
    <?php include('footer.php'); ?>