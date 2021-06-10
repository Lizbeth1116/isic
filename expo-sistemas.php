<?php
include('head.php');
$per = $_GET["per"];
$perio = explode('_', $per);
$ImagenesExpo = getImagenesExpo($perio[0]);
$CarruselExpo = getCarruselExpo();
?>
<link rel="stylesheet" href="css/fluid-gallery.css?1.0.0">
<div class="content-carousel">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <?php
            $auxCar = 0;
            foreach ($CarruselExpo as $lisCarruselExpo) {
                if ($lisCarruselExpo[3] == 1) {
                    echo '
                    <li data-target="#demo" data-slide-to="' . $auxCar . '"></li>
                    ';
                    $auxCar++;
                }
            }
            ?>
        </ul>
        <div class="carousel-inner">
            <?php
            $i = 0;
            foreach ($CarruselExpo as $lisCarruselExpo) {
                if ($lisCarruselExpo[3] == 1) {
                    if ($i == 0) {
                        echo '<div class="carousel-item active">';
                        $i++;
                    } else {
                        echo '<div class="carousel-item">';
                    }
                    echo '
                    <img src="img/carousel-eventos/' . $lisCarruselExpo[1] . '" alt="banner' . $lisCarruselExpo[0] . '">
                    <div class="carousel-caption">
                        <h3>' . $lisCarruselExpo[2] . '</h3>
                    </div>
                </div>';
                }
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>
<section class="galeria topmargin-sm container">
    <!--<link rel="stylesheet" href="css/overlay.css">-->
    <div class="section-heading text-center">
        <?php
        $aux = $perio[1] === 1 ? "ENERO - MAYO" : "AGOSTO - DICIEMBRE";
        echo '
            <h2>EXPO SISTEMAS <strong>' . $aux . ' ' . $perio[2] . '</strong></h2>';
        ?>
        <h4>
            Es una exposición y evaluación de proyectos en las áreas de Hardware, Software, Proyectos Integradores y Proyectos empiricos.
        </h4>
    </div>

    <div class="tz-gallery topmargin-xs">
        <div class="row">
            <?php
            for ($i = 0; $i < sizeof($ImagenesExpo); $i++) {
                echo '
                    <div class="col-md-3">
                            <div class="resume-item partedos">
                            <div class="portfolio-container">
                                <div class="service-wrapper-inner">
                                    <img class="grid-item ' . $ImagenesExpo[$i][0] . '" src="img/expoISC/' . $ImagenesExpo[$i][4] . '/' . $ImagenesExpo[$i][3] . '" height="250">   
                                    <a class="lightbox" href="img/expoISC/' . $ImagenesExpo[$i][4] . '/' . $ImagenesExpo[$i][3] . '">
                                        <div class="capa"><p><b>' . $ImagenesExpo[$i][1] . '</b></p></div>
                                    </a>
                                </div>
                            </div>
                            </div>
                    </div>
                ';
            }
            ?>
        </div>
    </div>
</section>
<!--Componente galeria-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
<script>
    $(document).ready(function() {
        $('#demo').carousel({
            interval: 2000
        });

    });
</script>
<div class="topmargin-lg"></div>
<?php include('footer.php'); ?>