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
                echo '<h2>' . $servInfo[0][0] . '</h2><p>';
                $tmp = explode("*", $servInfo[0][1]);
                for ($i = 0; $i < sizeof($tmp); $i++) {
                    echo '<small><i class="bi bi-check2"></i> ' . $tmp[$i] . '</small><br>';
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
        echo '';
    }
    ?>
    <div class="complementaria">
        <div class="site-section">
            <div class="container texto">
                <div class="section-heading text-center">
                    <h2><strong>Actividades Complementarias Ofertadas por ISIC</strong></h2>
                </div>
                <div class="row topmargin-xs">
                    <div class="col-md-12">
                        <div class="resume-item mb-4">
                            <h3><strong>Gamer ISIC</strong></h3>
                            <div class="row">
                                <div class="col-md-5"><img src="img/servicios/complementarias/game_isic.svg"></div>
                                <div class="col-md-7">
                                    <h4><strong>Objetivo</strong></h4>
                                    <p>
                                        Integrar un equipo de competencia para las diferentes ramas
                                        de los e-sports, a través de la participación y practica de
                                        estudiantes de los programas educativos de la institución,
                                        para competir en torneos locales, estatales y/o nacionales
                                    </p>
                                    <p>
                                        <button type="button" class="btn">Ver detalles</button>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="resume-item mb-4">
                            <h3><strong>Rally Networks</strong></h3>
                            <div class="row">
                                <div class="col-md-5"><img src="img/servicios/complementarias/really_networks.svg"></div>
                                <div class="col-md-7">
                                    <h4><strong>Objetivo</strong></h4>
                                    <p>Brindar a las y los estudiantes de la carrera de Ingeniería en
                                        Sistemas Computacionales, la oportunidad de probar sus
                                        habilidades creando redes interactivas y demostrando tanto
                                        sus conocimientos como aptitudes desarrolladas en los
                                        cursos de Cisco Networking Academy
                                    </p>
                                    <p>
                                        <button type="button" class="btn">Ver detalles</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="resume-item mb-4">
                            <h3><strong>Robótica</strong></h3>
                            <div class="row">
                                <div class="col-md-5"><img src="img/servicios/complementarias/robotica.svg"></div>
                                <div class="col-md-7">
                                    <h4><strong>Objetivo</strong></h4>
                                    <p>
                                        Generar prototipos del área de robótica a través de la
                                        participación de estudiantes y docentes de los diversos
                                        programas educativos, que permitan competir en torneos
                                        locales, estatales y/o nacionales.
                                    </p>
                                    <p>
                                        <button type="button" class="btn">Ver detalles</button>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="resume-item mb-4">
                            <h3><strong>Taller de Lógica Matemática</strong></h3>
                            <div class="row">
                                <div class="col-md-5"><img src="img/servicios/complementarias/logica_matematica.svg"></div>
                                <div class="col-md-7">
                                    <h4><strong>Objetivo</strong></h4>
                                    <p>
                                        Desarrollar la lógica y reconocimiento de patrones de los
                                        estudiantes utilizando rompecabezas tipo tangramas, el
                                        juego en línea de aprendizaje de habilidades de
                                        , y la plataforma en línea de
                                        aprendizaje de habilidades de p
                                    </p>
                                    <p>
                                        <button type="button" class="btn">Ver detalles</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="resume-item mb-4">
                            <h3><strong>Taller de Fabrica de Software</strong></h3>
                            <div class="row">
                                <div class="col-md-5"><img src="img/servicios/complementarias/fabrica_de_software.svg"></div>
                                <div class="col-md-7">
                                    <h4><strong>Objetivo</strong></h4>
                                    <p>
                                        Desarrollar sistemas de información y aplicaciones de software,
                                        mediante el uso de metodologías, hardware y software que den
                                        solución a las necesidades en el área de Sistemas Computacionales
                                        u algunas otras dentro del Instituto.
                                    </p>
                                    <p>
                                        <button type="button" class="btn">Ver detalles</button>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>