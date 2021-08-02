<?php
include('./headAdmin.php');
$doce = getDocente();
$pagina11 = 'active';
$tema = getTemaInv();
$inv = getInv();
$pagina3 = 'active';
include('AdminSidebar.php');
?>
<div class="admon">
    <div class="container">
        <h2>Docentes</h2>

        <br>




        <table class="table table-light table-hover">
            <tr>
                <th>id Docente</th>
                <th>Grado Académico</th>
                <th>Docente</th>

                <th>Correo</th>
                <th>¿Tiempo Completo?</th>
                <th>¿Tutor?</th>
                <th><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal1AddAs"><i class="bi bi-calendar-plus"></i></button></th>
                <div class="modal topmargin-sm" id="myModal1AddAs">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header-->
                            <div class="modal-header">
                                <h5 class="modal-title" style="color:darkslategrey;">Agregar</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->


                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="Controlador/ControlAgregar.php" method="POST">

                                    <div class="form-group">
                                        <label for="exampleInputIdDoc">Número de control </label>
                                        <input type="number" class="form-control" id="numControl" aria-describedby="" placeholder="123" name="idDocAdd">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNomDoc">Nombre:</label>
                                        <input type="text" class="form-control" id="nombreD" aria-describedby="" name="nombreDocAdd">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputApPaternoDoc">Apellido Paterno:</label>
                                        <input type="text" class="form-control" id="ApPatD" aria-describedby="" name="apPaternoDocAdd">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputApMaternoDoc">Apellido Materno:</label>
                                        <input type="text" class="form-control" id="ApMatD" aria-describedby="" name="apMaternoDocAdd">
                                    </div>
                                    <select class="custom-select mb-2 " name="gradosDocAdd">
                                        <option selected="">Selecciona Grado Académico</option>
                                        <option value="Ingeniería">Ingeniería</option>
                                        <option value="Ingeniería">Licenciatura</option>
                                        <option value="Maestría">Maestría</option>
                                        <option value="Dotorado">Dotorado</option>
                                    </select>
                                    <div class="form-group">
                                        <label for="exampleInputCorreoDoc">Correo Electrónico:</label>
                                        <input type="email" class="form-control" id="CorreoD" aria-describedby="" name="correoDocAdd">
                                    </div>
                                    <div class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input" value="2" name="tiempoDocAdd" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Tiempo Completo</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input" value="2" name="tutorDocAdd" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Tutor</label>
                                    </div>

                                    <div class="form-group" style="display:none">
                                        <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="9">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
             
            </tr>
            <?php

/* $docente=$_POST['DocenteEdit'];
$iddocente = $_POST['iddocenteEdit'];
$GradoAcademico = $_POST['GradoAcademicoEdit'];
$NombreDoc = $_POST['NombreDocEdit'];
$APaternoDoc = $_POST['APaternoDocEdit'];
$AMaternoDoc= $_POST['AMaternoDocEdit'];
$correoDoc = $_POST['correoDocEdit'];
$tiempoDoc = $_POST['tiempoDocEdit'];
$tutorDoc = $_POST['tutorDocEdit']; */

            for ($j = 1; $j < sizeof($doce); $j++) {
                echo '<tr>
                <td>' . $doce[$j][0] . '</td>
                <td>' . $doce[$j][2] . '</td>
                <td> <label>' . $doce[$j][1] . '</label></td>
                <td>' . $doce[$j][3] . '</td>
                <td>' . $doce[$j][4] . '</td>
                <td>' . $doce[$j][5] . '</td>
                <td>
                <div class="btn-group">
                    <button class="btn btn-light btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" data-toggle="modal" data-target="#myModal1Inv" onclick="datosModalInv1(\'' . $doce[$j][0] . '\', \'' . $doce[$j][1] . '\');"><i class="bi bi-pencil-square"></i>Editar</a>';
if ($doce[$j][2] === 1) {
    echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=4*' . $doce[$j][0] . '*2*1"><i class = "bi bi-eye-slash"></i>Ocultar</a>';
} else {
    echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=4*' . $doce[$j][0] . '*1*1"><i class = "bi bi-eye"></i>Activar</a>';
}
echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=4*' . $doce[$j][0] . '*0*2"><i class="bi bi-trash-fill"></i>Eliminar</a>
                    </div>
                    </div>
                    <div class="modal topmargin-sm" id="myModal1Inv">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color:darkslategrey;">Editar</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="Controlador/ControlEditar.php" method="POST">
                                        <div class="form-group">
                                            <label for="tema" style="color:black;">Tema de Investigación:</label>
                                            <input type="text" class="form-control" id="temaInvInv" placeholder="Ingresa el tema de investigación" name="temaInvInv" required>
                                            <div class="valid-feedback">Valido.</div>
                                            <div class="invalid-feedback">Por favor verifique los campos.</div>
                                        </div>
                                        <div class="form-group" style="display:none">
                                            <input type="text" class="form-control" id="idtemaInvInv" name="idtemaInvInv" required>
                                        </div>
                                        <div class="form-group" style="display:none">
                                            <input type="text" class="form-control" id="opInv" name="opInv" value="1">
                                        </div>
                                        <div class="form-group" style="display:none">
                                            <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="2">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>';
            }
            ?>


            </p>


        </table>



    </div>
</div>
<?php include('AdminFooter.php') ?>
<!--JS Local-->
<script type="text/javascript" src="js/editarAsesorias.js?1.0.0"></script>
</body>

</html>