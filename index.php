<?php
setcookie('logueado', FALSE, time() + 24 * 60 * 60);
include('head.php');
$Carrusel = getCarruselExpo();
$postfb = getPostfb();
sumarVista();
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
            <?php
            $auxCar = 0;
            foreach ($Carrusel as $lisCarrusel) {
                if ($lisCarrusel[3] == 1 && $lisCarrusel[4] == 1) {
                    echo '
                    <li data-target="#demo" data-slide-to="' . $auxCar . '" ' . ($auxCar == 0 ? ' class="active"' : '') . '></li>
                    ';
                    $auxCar++;
                }
            }
            ?>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php
            $i = 0;
            foreach ($Carrusel as $lisCarrusel) {
                if ($lisCarrusel[3] == 1 && $lisCarrusel[4] == 1) {
                    echo '
                    <div class="carousel-item' . ($i == 0 ? ' active' : '') . '">
                        <img src="img/conocenos/carousel/' . $lisCarrusel[1] . '" alt="Sistemas ITSOEH ' . $lisCarrusel[0] . '">
                    </div>';
                    $i++;
                }
            }
            ?>
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
                        <h3><strong>Académia</strong></h3>
                        <p class="text-center" style="color: #8a8a8a;">
                            Conoce al personal docente que forma parte de la Ingeniería en Sistemas Computacionales y los proyectos que llevan acabo
                        </p>
                        <button type="button" class="btn btn-primary"><a href="organigrama.php?1.0.0">Ver detalles</a></button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="resume-item mb-4">
                        <img src="img/iconos-conocenos/garrapata.svg?1.0.0" class="icono">
                        <h3><strong>Acreditación</strong></h3>
                        <p class="text-center" style="color: #8a8a8a;">Actualemente la carrera de Ingeniería en Sistemas Computacionales se encuentra acreditado por el CACEI.</p>
                        <button type="button" class="btn btn-primary"><a href="acreditacion.php?1.0.0">Ver detalles</a></button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="resume-item mb-4">
                        <img src="img/iconos-conocenos/aprendizaje.svg?1.0.0" class="icono">
                        <?php
                        echo '
                            <h3><strong>Expo Sistemas ' . $ultimaExpo[0][2] . '</strong></h3>
                            <p class="text-center" style="color: #8a8a8a;">Preparate y muestra el logro de los Atributos Educacionales así como los de tu perfil de egreso en Expo Proyecta Tec ' . $ultimaExpo[0][2] . '.</p>
                            <button type="button" class="btn btn-primary"><a href="expo-sistemas.php?per=' . $ultimaExpo[0][0] . '_' . $ultimaExpo[0][1] . '_' . $ultimaExpo[0][2] . '">Ver detalles</a></button>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contacto">
        <div class="container">
            <div class="row topmargin-sm">
                <?php
                $cont = (int) 0;
                $nPost = (int) (sizeof($postfb) / 2);

                foreach ($postfb as $value) {
                    if ($value[2] == 1) {
                        if ($cont == 0) {
                            echo '<div class="col-md-6 mt-4 mb-4">';
                        } else if ($cont == $nPost) {
                            echo '</div><div class="col-md-6 mt-4 mb-4">';
                        }
                        echo '<div class="mb-4"><h4 class="text-center" style="color:#2e73b4;"><b>' . $value[3] . '</b></h4>' . $value[1] .'</div>';
                        $cont++;
                        if ($cont == sizeof($postfb)) {
                            echo '</div>';
                        }
                    }
                }
                ?>
            </div>
            <div class="row topmargin-sm">
                <div class="col-md-6 mt-4">
                    <h3>¿Estas listo para formar parte de un proyecto? <b>comienza ahora.</b></h3>
                    <p>Registrate en el siguiente formulario</p>
                </div>
                <div class="col-md-6 mt-4">
                    <form action="Controlador/ControlAgregar.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nombrSol" name="nombrSol" placeholder="Nombre(s)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="ApSol" name="ApSol" placeholder="Apellido(s)">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="emailSol" name="emailSol" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="semSol" name="semSol" placeholder="Semestre">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="grupSol" name="grupSol" placeholder="Grupo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="telefSol" name="telefSol" placeholder="Número de telefono">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="matriSol" name="matriSol" placeholder="Matricula">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select id="proySol" name="proySol" class="custom-select mb-3 form-control">
                                        <option selected>Nombre del Proyecto</option>
                                        <?php
                                        $temInv = getTemaInv();
                                        foreach ($temInv as $tem) {
                                            if ($tem[2] == 1) {
                                                echo '<option value="' . $tem[0] . '">' . $tem[1] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" style="display:none">
                                    <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="8">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn fluid">Enviar solicitud</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!--Fin pagina principal-->
<!--Inicia footer-->
<?php include('footer.php'); ?>