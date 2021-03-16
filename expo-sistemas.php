<?php
include('head.php');
$ImagenesExpo = getImagenesExpo(1);
?>
<link rel="stylesheet" href="css/fluid-gallery.css">

<div class="content-carousel">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carousel-eventos/demo4.jpg" alt="banner1">
                <div class="carousel-caption">
                    <h3>Agosto - Diciembre 2020</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel-eventos/demo3.jpg" alt="banner2">
                <div class="carousel-caption">
                    <h3>Enero - Mayo 2020</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel-eventos/demo6.jpg" alt="banner3">
                <div class="carousel-caption">
                    <h3>Agosto - Diciembre 2019</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel-eventos/demo5.jpg" alt="New York">
                <div class="carousel-caption">
                    <h3>Enero - Mayo 2019</h3>
                </div>
            </div>
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

    <div class="tz-gallery">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="section-heading text-center">
                    <h2>EXPO SISTEMAS <strong>AGOSTO - DICIEMBRE 2020</strong></h2>
                </div>
            </div>
            <?php
            for ($i = 0; $i < sizeof($ImagenesExpo); $i++) {
                echo '
                    <div class="col-md-3">
                        <div class="resume-item mb-3 partedos">
                            <div class="portfolio-container">
                                <img class="grid-item ' . $ImagenesExpo[$i][0] . '" src="data:' . $ImagenesExpo[$i][4] . '; base64,' . base64_encode($ImagenesExpo[$i][1]) . '">
                                <div class="service-wrapper-inner">
                                    <h5>Prueba</h5>
                                    <div class="description">
                                        <p>' . $ImagenesExpo[$i][2] . '</p>
                                    </div>
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