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
</div>
<?php include('footer.php'); ?> 