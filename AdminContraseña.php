<?php
include('./headAdmin.php');
$pagina10 = 'active';
include('AdminSidebar.php');
?>
<div class="admon">
    <div class="container">
        <h2>Administrador</h2>
        <div class="sec-buscador" style="background-color: #fff;">
            <div class="columna">
                <h5><b>Cambio de usuario y contraseña</b></h5>
            </div>
            <div class="columna">
                <form class="needs-validation" novalidate action="Controlador/ControlEditar.php" method="POST">
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
                    <button style="border-radius:50px;" type="submit" class="btn btn-primary">Cambiar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('AdminFooter.php')?>
<!--JS Local-->
<script type="text/javascript" src="js/editarEspecialidad.js"></script>
<script type="text/javascript" src="js/editarMallaCurricular.js?1.0.0"></script>
<script type="text/javascript" src="js/editarInvestigacion.js?1.0.0"></script>
<script type="text/javascript" src="js/verMas.js?1.0.0"></script>
</body>

</html>