<?php
include('./headAdmin.php');
?>
<div class="admon">
    <div class="container">
        <h2>Administrador</h2>
        <div class="sec-buscador" style="background-color: #fff;">
            <div class="columna">
                <h5><b>Cambio de información relevante</b></h5>
            </div>
            <div class="columna">
                <form class="needs-validation" novalidate action="Controlador/ControlEditar.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre" style="color:black;">Acreditado Año:</label>
                                <?php echo '<input type="text" class="form-control" id="AnioGen" placeholder="Año de acreditación" value="' . $inforelevante[0][1] . '" name="AnioGen">';?>
                                <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre" style="color:black;">Tiempo (Años):</label>
                                <?php echo '<input type="text" class="form-control" id="TiempGen" placeholder="Tiempo de acreditación" value="' . $inforelevante[0][2] . '" name="TiempGen">';?>
                                <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre" style="color:black;">Matriculas registradas:</label>
                        <?php echo '<input type="text" class="form-control" id="MatGen" placeholder="Matriculas registradas al presente periodo" value="' . $inforelevante[0][3] . '" name="MatGen">';?>
                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Por favor verifique los campos.</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre" style="color:black;">Especialidades registradas:</label>
                                <?php echo '<input type="text" class="form-control" id="EspGen" placeholder="Cantidad de especialidades" value="' . $inforelevante[0][4] . '" name="EspGen">';?>
                                <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre" style="color:black;">Numero de laboratorios:</label>
                                <?php echo '<input type="text" class="form-control" id="LabGen" placeholder="Cantidad de laboratorios" value="' . $inforelevante[0][5] . '" name="LabGen">';?>
                                <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre" style="color:black;">Desarrollo Tecnológico:</label>
                        <?php echo '<input type="text" class="form-control" id="DTGen" placeholder="Ingresa el desarrollo tecnológico" value="' . $inforelevante[0][6] . '" name="DTGen">';?>
                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Por favor verifique los campos.</div>
                    </div>
                    <div class="form-group" style="display:none">
                        <?php echo '<input type="text" class="form-control" id="idGen" value="' . $inforelevante[0][0] . '" name="idGen">';?>
                    </div>
                    <div class="form-group" style="display:none">
                        <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="10">
                    </div>
                    <button type="submit" class="btn btn-primary">Cambiar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--inicia footer-->
<section id="footer" class="bg-dark">
    <div class="container">
        <img src="img/logos/isic-itsoeh-logo-blanco.png?1.0.0" alt="logo" class="itsoeh-logo-white">

        <ul class="list-inline">
            <li class="list-inline-item footer-menu"><i class="bi bi-envelope"></i><span> rporras@itsoeh.edu.mx</span></li>
            <li class="list-inline-item footer-menu"><i class="bi bi-telephone"></i><span> 01 738-73-54000 ext 240</span></li>
            <li class="list-inline-item footer-menu">
                <a target="_blank" href="https://www.facebook.com/ING-Sistemas-Computacionales-ITSOEH-916964301664810/">
                    <i class="bi bi-facebook"></i> Facebook</a>
            </li>
        </ul>
        <ul class="list-inline">
            <li class="list-inline-item footer-menu">
                <i class="bi bi-check2"></i><span> Atención: M.C. Rolando Porras Muñoz</span></a>
            </li>
        </ul>
        <small>© 2021 Ingeniería en Sistemas Computacionales | ITSOEH</small>
    </div>
</section>
<!--fin footer-->
<!--JS Local-->
<script type="text/javascript" src="js/editarEspecialidad.js"></script>
<script type="text/javascript" src="js/editarMallaCurricular.js?1.0.0"></script>
<script type="text/javascript" src="js/editarInvestigacion.js?1.0.0"></script>
<script type="text/javascript" src="js/verMas.js?1.0.0"></script>
<!--Bootstrap JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>