<?php include('head.php'); ?>
<div class="organigrama topmargin-sm">
    <div class="container">
        <div class="level-1 rectangle">
            <div class="row">
                <div class="col-sm-3"><img src="img/organigrama/rolando.png" class="nivel-1"></div>
                <div class="col">
                    <h3><strong>Rolando Porras Muñoz</strong></h3>
                    <p>Jefe de carrera</p>
                </div>
            </div>
        </div>
        <ol class="level-2-wrapper">
            <li>
                <div class="level-2 rectangle">
                    <div class="row">
                        <div class="col-sm-4"><img src="img/organigrama/mario.png" class="nivel-2"></div>
                        <div class="col">
                            <h5><strong>Mario Pérez Bautista</strong></h5>
                            <p>Presidente de academia</p>
                        </div>
                    </div>
                </div>
                <ol class="level-3-wrapper">
                    <li>
                        <h6 class="level-3 rectangle">Profesores de tiempo completo</h6>
                    </li>
                    <li>
                        <h5 class="level-3 rectangle"><a data-toggle="modal" data-target=".bd-example-modal-lg">Profesores</a></h5>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <link rel="stylesheet" href="css/carousel.css">
                                    <div class="sec-carousel">
                                        <div class="container mb-4">
                                            <div class="modal-header mb-5">
                                                <h4 class="modal-title"><strong>PROFESORES</strong></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner row w-100 mx-auto">
                                                    <div class="carousel-item col-md-4 active">
                                                        <div class="card">
                                                            <img class="card-img-top img-fluid" src="img/imagenes-pruebas/c172.jpg" alt="card-img">
                                                            <div class="card-body">
                                                                <h6 class="card-title text-center"><strong>Rolando Porras Muñoz</strong></h6>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="carousel-item col-md-4">
                                                        <div class="card">
                                                            <img class="card-img-top img-fluid" src="img/imagenes-pruebas/c31.jpg" alt="card-img">
                                                            <div class="card-body">
                                                                <h6 class="card-title text-center"><strong>Xochitl Torres Reyes</strong></h6>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="carousel-item col-md-4">
                                                        <div class="card">
                                                            <img class="card-img-top img-fluid" src="img/imagenes-pruebas/c41.jpg" alt="card-img">
                                                            <div class="card-body">
                                                                <h6 class="card-title text-center"><strong>Héctor Daniel Hernández García</strong></h6>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="carousel-item col-md-4">
                                                        <div class="card">
                                                            <img class="card-img-top img-fluid" src="img/imagenes-pruebas/s62.jpg" alt="card-img">
                                                            <div class="card-body">
                                                                <h6 class="card-title text-center"><strong>Elizabeth García Rios</strong></h6>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="carousel-item col-md-4">
                                                        <div class="card">
                                                            <img class="card-img-top img-fluid" src="img/imagenes-pruebas/s72.jpg" alt="card-img">
                                                            <div class="card-body">
                                                                <h6 class="card-title text-center"><strong>Dulce Jazmín Navarrete Arias</strong></h6>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="carousel-item col-md-4">
                                                        <div class="card">
                                                            <img class="card-img-top img-fluid" src="img/imagenes-pruebas/s83.jpg" alt="card-img">
                                                            <div class="card-body">
                                                                <h6 class="card-title text-center"><strong>Cristy Elizabeth Aguilar Ojeda</strong></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>
                </ol>
            </li>
            <li>
                <div class="level-2 rectangle">
                    <div class="row">
                        <div class="col-sm-4"><img src="img/organigrama/xo.png" class="nivel-2"></div>
                        <div class="col">
                            <h5><strong>Xochitl Torres Reyes</strong></h5>
                            <p>Asistente</p>
                        </div>
                    </div>


                </div>
            </li>
        </ol>
    </div>
</div>

<?php 
include('investigacion.php');
include('footer.php'); 
?>