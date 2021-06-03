<?php
include('head.php');
$getPEDescrip = getPEDescrip($_GET["pe"]);
?>
<div class="peisc"> 
    <section>
        <?php
            if ($_GET["pe"] != 6) {
                echo'<img src="img/peisc/'.$getPEDescrip[0][1].'.svg">';
            }
        ?>
        <div class="contenedor-texto">
            <?php
            echo '<h2>' . $getPEDescrip[0][1] . '</h2>';
            if ($_GET["pe"] >= 5) {
                echo '<p>';
                for ($i = 0; $i < sizeof($getPEDescrip); $i++) {
                    echo '<small><i class="bi bi-check2"></i>' . $getPEDescrip[$i][2] . '</small><br>';
                }
                echo '</p>';
            } else {
                echo '<p>' . $getPEDescrip[0][2] . ' </p>';
            }
            ?>

        </div>
    </section>
</div>
<?php include('footer.php'); ?>