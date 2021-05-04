<?php
include('head.php');
$servInfo = getServicio($_GET["idServ"]);
?>
<div class="servicios">
    <section>

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
        echo '
        <div class="asesorias">
    <section class="site-section">
        <div class="container texto">
            <div class="section-heading text-center">
                <h2><strong>Asesorías</strong></h2>
            </div>
            <div class="row topmargin-xs">
                <div class="col-md-6">
                    <div class="resume-item mb-4">
                        <p>
                        <h3><strong>Elizabeth García Rios</strong></h3>
                        </p>
                        <table class="table table-light">
                            <tr>
                                <th>Asesorías</th>
                                <th>Día</th>
                                <th>Hora</th>
                            </tr>
                            <tr>
                                <td>Visión por computadora</td>
                                <td>Lunes</td>
                                <td>15-16</td>
                            </tr>
                            <tr>
                                <td>Metodos Numericos</td>
                                <td>Lunes</td>
                                <td>16-17</td>
                            </tr>
                            <tr>
                                <td>Taller de Investigación</td>
                                <td>Viernes</td>
                                <td>13-13</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="resume-item mb-4">
                        <p>
                        <h3><strong>Mario Perez Bautista</strong></h3>
                        </p>
                        <table class="table table-light">
                            <tr>
                                <th>Asesorías</th>
                                <th>Día</th>
                                <th>Hora</th>
                            </tr>
                            <tr>
                                <td>Lenguajes y Automatas 1</td>
                                <td>Lunes</td>
                                <td>12-13<br>13-14</td>
                            </tr>
                            <tr>
                                <td>Programación Orientada a Objetos</td>
                                <td>Miercoles</td>
                                <td>16-17<br>18-19</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
        ';
    }
    ?>
</div>
<?php include('footer.php'); ?>