<?php
include('head.php');
$sp = $_GET["sp"];
$espInfo = getEspecialidadInfo($sp);
$espAsig = getAsignaturasEsp($sp);
$espEgr = getPerfilEgreso($sp);
?>
<div class="especialidad"> 
    <section id="sec1">
        <div class="contenedor">
            <div class="contenedor-texto">
                <?php
                echo '<h2 style="color:#fff; !important">' . $espInfo[0][0] . '</h2>
                        <p style="color:#fff; !important">' . $espInfo[0][1] . '</p>';
                ?>
            </div>
        </div>
        <?php echo '<img src="img/especialidades/' . $espInfo[0][3] . '?1.0.0">' ?>

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
                          </div>';
                    }
                    ?>
                </div>
            </div>
            <!---->
        </div>
    </section>
</div>
<?php include('footer.php'); ?>