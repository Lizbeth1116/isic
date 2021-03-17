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
                        <li><h1>TECNOLÓGICO NACIONAL DE MÉXICO</h1></li>
                        <li><h5>INSTITUTO TECNOLÓGICO SUPERIOR DEL OCCIDENTE DEL ESTADO DE HIDALGO</h5></li>
                        <li><h6>INGENIERÍA EN SISTEMAS COMPUTACIONALES</h6></li>
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
    <section class="site-section topmargin-sm" id="acerca">
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
<div class="resumen">
    <svg preserveAspectRatio="none" class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,138.7C384,160,480,224,576,208C672,192,768,96,864,74.7C960,53,1056,107,1152,144C1248,181,1344,203,1392,213.3L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
    <section class="site-section topmargin-xs" id="historial">
        <div class="container texto">
            <div class="section-heading text-center">
                <h2><strong>CONOCENOS</strong></h2>
            </div>
            <div class="row topmargin-xs">
                <div class="col-md-4">
                    <div class="resume-item mb-4 partedos">
                        <img src="img/iconos-conocenos/data.svg?1.0.0" class="icono">
                        <h3><strong>Centro de Formación de Capital Humano</strong></h3>
                        <p class="text-center">
                            Laboratorio de dispositivos móviles.
                            Enfocado al desarrollo de software y aplicaciones móviles
                        </p>
                        <button type="button" class="btn btn-outline-primary">Ver detalles</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="resume-item mb-4 partedos">
                        <img src="img/iconos-conocenos/garrapata.svg?1.0.0" class="icono">
                        <h3><strong>Acreditación</strong></h3>
                        <p class="text-center">Actualemente la carrera de Ingeniería en Sistemas Computacionales se encuentra acreditado por el CACEI.</p>
                        <button type="button" class="btn btn-outline-primary">Ver detalles</button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="resume-item mb-4 partedos">
                        <img src="img/iconos-conocenos/aprendizaje.svg?1.0.0" class="icono">
                        <h3><strong>Expo Sistemas 2020</strong></h3>
                        <p class="text-center">Preparate y muestra el logro de los Atributos Educacionales así como los de tu perfil de egreso en Expo Proyecta Tec 2020.</p>
                        <button type="button" class="btn btn-outline-primary">Ver detalles</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!--Fin pagina principal-->
<!--Inicia footer-->
<?php include('footer.php'); ?>