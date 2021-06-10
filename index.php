<?php
setcookie('logueado', FALSE, time() + 24 * 60 * 60);
include('head.php');
?>
<!--Inicia pagina principal-->
<div class="inicio">
    <section id="home">
        <div>
            <div class="content-center topmargin-sm">
                <div class="contenedor">
                    <ul>
                        <li>
                            <h1>INGENIERÍA EN SISTEMAS COMPUTACIONALES</h1>
                        </li>
                        <li>
                            <h5>INSTITUTO TECNOLÓGICO SUPERIOR DEL OCCIDENTE DEL ESTADO DE HIDALGO</h5>
                        </li>
                        <li>
                            <h6>TECNOLÓGICO NACIONAL DE MÉXICO</h6>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!--
        <svg preserveAspectRatio="none" class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,138.7C384,160,480,224,576,208C672,192,768,96,864,74.7C960,53,1056,107,1152,144C1248,181,1344,203,1392,213.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>-->
    </section>

</div>
<div class="conocenos">
    <section class="site-section topmargin-xs" id="acerca">
        <div class="container texto">
            <div>
                <div class="section-heading text-center">
                    <h2><strong>ACERCA</strong> DE LA <strong>CARRERA</strong></h2>
                </div>
                <div class="content-center">
                    <div class="info-carrera">
                        <h4 class="heading text-center" data-target-resolver></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="resumen topmargin-lg">
    <!--<svg preserveAspectRatio="none" class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,138.7C384,160,480,224,576,208C672,192,768,96,864,74.7C960,53,1056,107,1152,144C1248,181,1344,203,1392,213.3L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>-->
    <div id="demo" class="carousel slide container" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
            <li data-target="#demo" data-slide-to="4"></li>
            <li data-target="#demo" data-slide-to="5"></li>
            <li data-target="#demo" data-slide-to="6"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/conocenos/carousel/imagen-home_01.jpg" alt="Sistemas ITSOEH 01" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="img/conocenos/carousel/imagen-home_02.jpg" alt="Sistemas ITSOEH 02" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="img/conocenos/carousel/imagen-home_03.jpg" alt="Sistemas ITSOEH 03" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="img/conocenos/carousel/imagen-home_04.jpg" alt="Sistemas ITSOEH 04" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="img/conocenos/carousel/imagen-home_05.jpg" alt="Sistemas ITSOEH 05" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="img/conocenos/carousel/imagen-home_06.jpg" alt="Sistemas ITSOEH 06" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="img/conocenos/carousel/imagen-home_07.jpg" alt="Sistemas ITSOEH 07" width="1100" height="500">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <section class="site-section topmargin-xs" id="historial">
        <div class="container texto">
            <div class="section-heading text-center">
                <h2><strong>CONOCENOS</strong></h2>
            </div>
            <div class="row topmargin-xs">
                <div class="col-md-4">
                    <div class="resume-item mb-4">
                        <img src="img/iconos-conocenos/data.svg?1.0.0" class="icono">
                        <h3><strong>Centro de Formación de Capital Humano</strong></h3>
                        <p class="text-center" style="color: #8a8a8a;">
                            Laboratorio de dispositivos móviles.
                            Enfocado al desarrollo de software y aplicaciones móviles
                        </p>
                        <button type="button" class="btn btn-outline-primary">Ver detalles</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="resume-item mb-4">
                        <img src="img/iconos-conocenos/garrapata.svg?1.0.0" class="icono">
                        <h3><strong>Acreditación</strong></h3>
                        <p class="text-center" style="color: #8a8a8a;">Actualemente la carrera de Ingeniería en Sistemas Computacionales se encuentra acreditado por el CACEI.</p>
                        <button type="button" class="btn btn-outline-primary"><a href="acreditacion.php?1.0.0">Ver detalles</a></button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="resume-item mb-4">
                        <img src="img/iconos-conocenos/aprendizaje.svg?1.0.0" class="icono">
                        <?php
                        echo '
                            <h3><strong>Expo Sistemas ' . $ultimaExpo[0][2] . '</strong></h3>
                            <p class="text-center" style="color: #8a8a8a;">Preparate y muestra el logro de los Atributos Educacionales así como los de tu perfil de egreso en Expo Proyecta Tec ' . $ultimaExpo[0][2] . '.</p>
                            <button type="button" class="btn btn-outline-primary"><a href="expo-sistemas.php?per=' . $ultimaExpo[0][0] . '_' . $ultimaExpo[0][1] . '_' . $ultimaExpo[0][2] . '">Ver detalles</a></button>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contacto">
        <div class="container">
            <div class="row topmargin-sm">
                <div class="col-md-6 mt-4 mb-4">
                    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D1877206242307273%26id%3D916964301664810&show_text=true&width=500" width="100%" height="740" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D1653763444651555%26id%3D916964301664810&show_text=true&width=500" width="100%" height="778" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D2055901021219079%26id%3D142983839177483&show_text=true&width=500" width="100%" height="559" style="border:none;overflow:hidden;background-color:#fff;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2F916964301664810%2Fphotos%2Fa.943603462334227%2F1725766717451227%2F%3Ftype%3D3&show_text=true&width=500" width="100%" height="562" style="border:none;overflow:hidden;background-color:#fff;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
            <div class="row topmargin-sm">
                <div class="col-md-6 mt-4">
                    <h3>¿Estas listo para formar parte de un proyecto? <b>comienza ahora.</b></h3>
                    <p>Registrate en el siguiente formulario</p>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="" placeholder="Nombre(s)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="" placeholder="Apellido(s)">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="email" class="form-control" id="" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" id="" placeholder="Semestre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="" placeholder="Grupo">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" class="form-control" id="" placeholder="Número de telefono (opcional)">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="cars" class="custom-select mb-3 form-control">
                                    <option selected>Nombre del Proyecto</option>
                                    <option value="volvo">Volvo</option>
                                    <option value="fiat">Fiat</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn fluid">Enviar mensaje</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!--Fin pagina principal-->
<!--Inicia footer-->
<?php include('footer.php'); ?>