<?php
include('./headAdmin.php');
$tema = getTemaInv();
$doce = getDocente();
$inv = getInv();
?>
<div class="admon">
    <div class="container">
        <h2>Área de Investigación</h2>

        <div id="titulo">
            <h6><b>Tema Linea Ivestigacion</b></h6>
        </div>
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tema</th>
                    <th><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal1AddInv"><i class="bi bi-plus-circle"></i></button><th>
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
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal1Inv" onclick="datosModalInv1(\'' . $tema[$i][0] . '\', \'' . $tema[$i][1] . '\');"><i class="bi bi-pencil-square"></i></button>';
                    if ($tema[$i][2] === 1) {
                        echo '<a type="" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=4_' . $tema[$i][0] . '_2_1"><i class = "bi bi-eye"></i></a>';
                    } else {
                        echo '<a type="" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=4_' . $tema[$i][0] . '_1_1"><i class = "bi bi-eye-slash"></i></a>';
                    }
                    echo '<a type="" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=4_' . $tema[$i][0] . '_0_2"><i class="bi bi-trash-fill"></i></a>
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

        <div id="titulo">
            <h6><b>Colaboradores</b></h6>
        </div>
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Tema de Investigación</th>
                    <th>Grado Académico</th>
                    <th>Profesor</th>
                    <th>Cargo</th>
                    <th><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal1AddCol"><i class="bi bi-plus-circle"></i></button></th>
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
                                        ?></select>
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
            </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < sizeof($inv); $i++) {
                    echo '<tr>
                                        <td>' . $inv[$i][1] . '</td>
                                        <td>' . $inv[$i][2] . '</td>
                                        <td>' . $inv[$i][4] . '</td>';
                    if ($inv[$i][5] === 1) {
                        echo '<td>Lider</td>';
                    } else {
                        echo '<td>Colaborador</td>';
                    }
                    echo '   
                                        <td> 
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModalInv" onclick="datosModalInv2(\'' . $inv[$i][0] . '\', \'' . $inv[$i][3] . '\', \'' . $inv[$i][5] . '\');"><i class="bi bi-pencil-square"></i></button>';
                    if ($inv[$i][6] === 1) {
                        echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=5_' . $inv[$i][0] . '_' . $inv[$i][3] . '_2_1"><i class = "bi bi-eye"></i></a>';
                    } else {
                        echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=5_' . $inv[$i][0] . '_' . $inv[$i][3] . '_1_1"><i class = "bi bi-eye-slash"></i></a>';
                    }
                    echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=5_' . $inv[$i][0] . '_' . $inv[$i][3] . '_0_2"><i class="bi bi-trash-fill"></i></a>
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
<script type="text/javascript" src="js/editarEspecialidad.js?1.0.0"></script>
<script type="text/javascript" src="js/editarMallaCurricular.js?1.0.0"></script>
<script type="text/javascript" src="js/editarInvestigacion.js?1.0.0"></script>
<script type="text/javascript" src="js/verMas.js?1.0.0"></script>
<!--Bootstrap JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>