<?php
include('./headAdmin.php');
$tema = getTemaInv();
$doce = getDocente();
$inv = getInv();
$pagina3 = 'active';
include('AdminSidebar.php');
?>
<div class="admon">
    <div class="container">
        <h2>Área de Investigación</h2>
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'tab1')" id="defaultOpen"><i class="bi bi-file-check-fill"></i>Temas</button>
            <button class="tablinks" onclick="openCity(event, 'tab2')"><i class="bi bi-file-earmark-person-fill"></i>Colaboradores</button>
        </div>
        <div id="tab1" class="tabcontent">
            <div id="titulo">
                <h6><b>Tema Linea Ivestigacion</b><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal1AddInv"><i class="bi bi-plus-circle"></i>Agregar</button></h6>
            </div>
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tema</th>
                        <th>
                        <th>
                            <div class="modal topmargin-sm" id="myModal1AddInv">
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
                                                    <label for="tema" style="color:black;">Tema de Investigación:</label>
                                                    <input type="text" class="form-control" id="temaInvInvAdd" placeholder="Ingresa el tema de investigación" name="temaInvInvAdd" required>
                                                    <div class="valid-feedback">Valido.</div>
                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < sizeof($tema); $i++) {
                        echo '
                                    <tr>
                                        <td>' . $tema[$i][0] . '</td>
                                        <td>' . $tema[$i][1] . '</td>
                                        <td>
                                        <div class="btn-group">
                                            <button class="btn btn-light btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" data-toggle="modal" data-target="#myModal1Inv" onclick="datosModalInv1(\'' . $tema[$i][0] . '\', \'' . $tema[$i][1] . '\');"><i class="bi bi-pencil-square"></i>Editar</a>';
                        if ($tema[$i][2] === 1) {
                            echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=4*' . $tema[$i][0] . '*2*1"><i class = "bi bi-eye-slash"></i>Ocultar</a>';
                        } else {
                            echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=4*' . $tema[$i][0] . '*1*1"><i class = "bi bi-eye"></i>Activar</a>';
                        }
                        echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=4*' . $tema[$i][0] . '*0*2"><i class="bi bi-trash-fill"></i>Eliminar</a>
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
                </tbody>
            </table>
        </div>
        <div id="tab2" class="tabcontent">
            <div id="titulo">
                <h6><b>Profesores colaboradores en la investigación</b><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal1AddCol"><i class="bi bi-plus-circle"></i>Agregar</button></h6>
            </div>
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th>Tema de Investigación</th>
                        <th>Profesor</th>
                        <th>
                            <div class="modal topmargin-sm" id="myModal1AddCol">
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

                                                <div class="from-group">
                                                    <label for="temaInvAdd" style="color:black;">Tema de Investigación:</label>
                                                    <select id="temaInvAdd" name="temaInvAdd" class="custom-select mb-3 form-control" required>
                                                        <option selected>-Selecciona-</option>';
                                                        <?php
                                                        for ($j = 0; $j < sizeof($tema); $j++) {
                                                            echo '<option value="' . $tema[$j][0] . '">' . $tema[$j][1] . '</option>';
                                                        }
                                                        echo '</select>
                                                            <div class="valid-feedback">Valido.</div>
                                                            <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                        </div>

                                                        <div class="from-group">
                                                            <label for="docenteInvAdd" style="color:black;">Docente:</label>
                                                            <select id="docenteInvAdd" name="docenteInvAdd" class="custom-select mb-3 form-control" required>
                                                                <option selected>-Selecciona-</option>';
                                                        for ($j = 0; $j < sizeof($doce); $j++) {
                                                            echo '<option value="' . $doce[$j][0] . '">' . $doce[$j][1] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="valid-feedback">Valido.</div>
                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="cargoInvAdd" style="color:black;">Cargo:</label>
                                                    <select id="cargoInvAdd" name="cargoInvAdd" class="custom-select mb-3 form-control" required>
                                                        <option selected>-Selecciona-</option>
                                                        <option value="1">Lider</option>
                                                        <option value="2">Colaborador</option>
                                                    </select>
                                                    <div class="valid-feedback">Valido.</div>
                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <input type="text" class="form-control" id="opInv" name="opInv" value="2">
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
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < sizeof($inv); $i++) {
                        echo '<tr>
                                        <td>' . $inv[$i][1] . '</td>
                                        <td>Grado: ' . $inv[$i][2] . '<p>
                                        ';
                        if ($inv[$i][5] === 1) {
                            echo 'Lider: ';
                        } else {
                            echo 'Colaborador: ';
                        }
                        echo '' . $inv[$i][4] . '</p></td>';
                        echo '   
                                        <td> 
                                        <div class="btn-group">
                                            <button class="btn btn-light btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#myModalInv" onclick="datosModalInv2(\'' . $inv[$i][0] . '\', \'' . $inv[$i][3] . '\', \'' . $inv[$i][5] . '\');"><i class="bi bi-pencil-square"></i>Editar</a>';
                        if ($inv[$i][6] === 1) {
                            echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=5*' . $inv[$i][0] . '*' . $inv[$i][3] . '*2*1"><i class = "bi bi-eye-slash"></i>Ocultar</a>';
                        } else {
                            echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=5*' . $inv[$i][0] . '*' . $inv[$i][3] . '*1*1"><i class = "bi bi-eye"></i>Activar</a>';
                        }
                        echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=5*' . $inv[$i][0] . '*' . $inv[$i][3] . '*0*2"><i class="bi bi-trash-fill"></i>Eliminar</a>
                                        </div>
                                        </div>
                                        <div class="modal topmargin-sm" id="myModalInv">
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

                                                            <div class="from-group">
                                                                <label for="temaInv" style="color:black;">Tema de Investigación:</label>
                                                                <select id="temaInv" name="temaInv" class="custom-select mb-3 form-control" required>
                                                                    <option selected>-Selecciona-</option>';
                        for ($j = 0; $j < sizeof($tema); $j++) {
                            echo '<option value="' . $tema[$j][0] . '">' . $tema[$j][1] . '</option>';
                        }
                        echo '</select>
                                                                <div class="valid-feedback">Valido.</div>
                                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                            </div>

                                                            <div class="from-group">
                                                                <label for="docenteInv" style="color:black;">Docente:</label>
                                                                <select id="docenteInv" name="docenteInv" class="custom-select mb-3 form-control" required>
                                                                    <option selected>-Selecciona-</option>';
                        for ($j = 0; $j < sizeof($doce); $j++) {
                            echo '<option value="' . $doce[$j][0] . '">' . $doce[$j][1] . '</option>';
                        }
                        echo '</select>
                                                                <div class="valid-feedback">Valido.</div>
                                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="cargoInv" style="color:black;">Cargo:</label>
                                                                <select id="cargoInv" name="cargoInv" class="custom-select mb-3 form-control" required>
                                                                    <option selected>-Selecciona-</option>
                                                                    <option value="1">Lider</option>
                                                                    <option value="2">Colaborador</option>                                                     
                                                                </select>
                                                                <div class="valid-feedback">Valido.</div>
                                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                            </div>

                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="temaOriInv" name="temaOriInv">
                                                            </div>

                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="docenteOriInv" name="docenteOriInv">
                                                            </div>

                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opInv" name="opInv" value="2">
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
                </tbody>
            </table>
        </div>
        <script type="text/javascript" src="js/tabs.js"></script>
    </div>
</div>
</div>
<?php include('AdminFooter.php')?>
<!--JS Local-->
<script type="text/javascript" src="js/editarEspecialidad.js?1.0.0"></script>
<script type="text/javascript" src="js/editarMallaCurricular.js?1.0.0"></script>
<script type="text/javascript" src="js/editarInvestigacion.js?1.0.0"></script>
<script type="text/javascript" src="js/verMas.js?1.0.0"></script>
</body>

</html>