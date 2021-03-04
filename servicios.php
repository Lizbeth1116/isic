<?php
include('head.php');
$servInfo = getServicio($_GET["idServ"]);
?>
<div class="servicios">
    <section>
        <div class="contenedor-texto">
            <?php
            if ($_GET["idServ"] == 4) {
                echo '<h2>' . $servInfo[0][0] . '</h2> <ul>';
                $tmp = explode("*", $servInfo[0][1]);
                for ($i = 0; $i < sizeof($tmp); $i++) {
                    echo '<li>' . $tmp[$i] . '</li>';
                }
                echo '</ul>';
            } else {
                echo '<h2>Objetivo de ' . $servInfo[0][0] . '</h2>
                      <p>' . $servInfo[0][1] . '</p>';
            }
            ?>
        </div>
        <?php
        echo '<img src="img/servicios/' . $servInfo[0][0] . '.svg?1.0.0">';
        ?>
    </section>
</div>
<?php include('footer.php'); ?>