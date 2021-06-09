<?php
include('./headAdmin.php');
?>
<div class="admon">
    <div class="container">
        <h2>Administrador</h2>
        <div id="titulo">
            <h6><b>Cambio de usuario y contraseña</b></h6>
        </div>
        <form class="needs-validation" novalidate action="Controlador/ControlEditar.php"  method="POST">
            <div class="form-group">
                <label for="nombre" style="color:black;">Nuevo Usuario:</label>
                <input type="text" class="form-control" id="UsAdmin" placeholder="Ingresa el nuevo nombre de administrador" name="UsAdmin">
                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Por favor verifique los campos.</div>
            </div>
            <div class="form-group">
                <label for="nombre" style="color:black;">Nueva Contraseña:</label>
                <input type="password" class="form-control" id="PassAdmin" placeholder="Ingresa la nueva contraseña" name="PassAdmin">
                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Por favor verifique los campos.</div>
            </div>
            <div class="form-group" style="display:none">
                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="9">
            </div>
            <button type="submit" class="btn btn-primary">Cambiar</button>
        </form>
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