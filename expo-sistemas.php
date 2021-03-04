<?php
include('head.php');
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
            <div class="col-md-3">
                <h2 class="mb-5"></h2>
                <div class="resume-item mb-4">
                    <div class="portfolio-container">
                        <div class=""><img class="grid-item" src="img/imagenes-pruebas/traffic.jpg"></div>
                        <div class="service-wrapper-inner">
                            <h5>Prueba</h5>
                            <div class="description">
                                <a href="img/imagenes-pruebas/traffic.jpg">
                                    <p>Overlay</p>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <h2 class="mb-5"></h2>
                <div class="resume-item mb-4 partedos">
                    <div class="portfolio-container">
                        <div><img class="grid-item" src="img/imagenes-pruebas/park.jpg"></div>
                        <div class="service-wrapper-inner">
                            <h5>Prueba</h5>
                            <div class="description">
                                <a href="img/imagenes-pruebas/park.jpg">
                                    <p>Overlay</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <h2 class="mb-5"></h2>
                <div class="resume-item mb-4 partedos">
                    <div class="portfolio-container">
                        <img class="grid-item" src="img/imagenes-pruebas/tunnel.jpg">
                        <div class="service-wrapper-inner">
                            <h5>Prueba</h5>
                            <div class="description">
                                <a href="img/imagenes-pruebas/tunnel.jpg">
                                    <p>Overlay</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h2 class="mb-5"></h2>
                <div class="resume-item mb-4 partedos">
                    <div class="portfolio-container">
                        <div class=""><img class="grid-item" src="img/itsoeh.jpeg"></div>
                        <div class="service-wrapper-inner">
                            <h5>Prueba</h5>
                            <div class="description">
                                <a class="lightbox" href="img/itsoeh.jpeg">
                                    <p>Overlay</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
    <script>
        $(document).ready(function()
        {
            $('#demo').carousel({interval:2000});
        });
    </script>
</section>
<div class="topmargin-lg"></div>
<?php include('footer.php'); ?>