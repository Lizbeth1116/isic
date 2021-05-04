<?php
include('./headAdmin.php');
$asignatura = getMallaAdmin();
$asesoria = getAsesorias();
$doce = getDocente();
?>
<div class="admon">
    <div class="container">
        <h2>Asesorias</h2>
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Asesor</th>
                    <th>Asignatura</th>
                    <th>Horario</th>
                    <th>Dia</th>
                    <th><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal1AddAs"><i class="bi bi-plus-circle"></i></button></th>
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
                                    <label for="docenteAsAdd" style="color:black;">Asesor:</label>
                                    <select id="docenteAsAdd" name="docenteAsAdd" class="custom-select mb-3 form-control" required>
                                        <option selected>-Selecciona-</option>
                                        <?php
                                        for ($j = 0; $j < sizeof($doce); $j++) {
                                            echo '<option value="' . $doce[$j][0] . '">' . $doce[$j][1] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="valid-feedback">Valido.</div>
                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                </div>
                                <div class="form-group">
                                    <label for="asignaturaAsAdd" style="color:black;">Asignatura:</label>
                                    <select id="asignaturaAsAdd" name="asignaturaAsAdd" class="custom-select mb-3 form-control" onchange="showSelected();" required>
                                        <option selected>-Selecciona-</option>
                                        <?php
                                        for ($j = 0; $j < sizeof($asignatura); $j++) {
                                            echo '<option value="' . $asignatura[$j][1] . '">' . $asignatura[$j][3] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="valid-feedback">Valido.</div>
                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                </div>
                                <div class="form-group">
                                    <label for="diaAsAdd" style="color:black;">Dia:</label>
                                    <select id="diaAsAdd" name="diaAsAdd" class="custom-select mb-3 form-control" required>
                                        <option selected>-Selecciona-</option>
                                        <option value="1">Lunes</option>
                                        <option value="2">Martes</option>
                                        <option value="3">Miercoles</option>
                                        <option value="4">Jueves</option>
                                        <option value="5">Viernes</option>
                                    </select>
                                    <div class="valid-feedback">Valido.</div>
                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Inicio</span>
                                    </div>
                                    <input type="text" class="form-control" id="horaIniAsAdd" placeholder="Hora de Inicio" name="horaIniAsAdd" required>
                                    <!--<label for="horas" style="color:black;">Horas:</label>-->
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Fin</span>
                                    </div>
                                    <input type="text" class="form-control" id="horaFinAsAdd" placeholder="Hora de Fin" name="horaFinAsAdd" required>
                                    <div class="valid-feedback">Valido.</div>
                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                </div>
                                <div class="form-group" style="display:none">
                                    <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="5">
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
                for ($i = 0; $i < sizeof($asesoria); $i++) {
                    echo '
                                    <tr>
                                        <td>' . $asesoria[$i][2] . '</td>
                                        <td>' . $asesoria[$i][4] . '</td>
                                        <td>' . $asesoria[$i][5] . ' - ' . $asesoria[$i][6] . '</td>';
                    switch ($asesoria[$i][7]) {
                        case 1:
                            echo '<td>Lunes</td>';
                            break;
                        case 2:
                            echo '<td>Martes</td>';
                            break;
                        case 3:
                            echo '<td>Miercoles</td>';
                            break;
                        case 4:
                            echo '<td>Jueves</td>';
                            break;
                        case 5:
                            echo '<td>Viernes</td>';
                            break;
                    }
                    echo '<td> <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModalAs" onclick="datosModalAs(\'' . $asesoria[$i][0] . '\', \'' . $asesoria[$i][1] . '\', \'' . $asesoria[$i][3] . '\', \'' . $asesoria[$i][7] . '\', \'' . $asesoria[$i][5] . '\', \'' . $asesoria[$i][6] . '\');"><i class="bi bi-pencil-square"></i></button>';
                    if ($asesoria[$i][8] === 1) {
                        echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=8_' . $asesoria[$i][0] . '_2_1"><i class = "bi bi-eye"></i></a>';
                    } else {
                        echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=8_' . $asesoria[$i][0] . '_1_1"><i class = "bi bi-eye-slash"></i></a>';
                    }
                    echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=8_' . $asesoria[$i][0] . '_0_2"><i class="bi bi-trash-fill"></i></a>
                            <!-- The Modal -->
                            <div class="modal topmargin-sm" id="myModalAs">
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
                                                    <label for="docenteAs" style="color:black;">Asesor:</label>
                                                    <select id="docenteAs" name="docenteAs" class="custom-select mb-3 form-control" required>
                                                        <option selected>-Selecciona-</option>';
                                                        for ($j = 0; $j < sizeof($doce); $j++) {
                                                            echo '<option value="' . $doce[$j][0] . '">' . $doce[$j][1] . '</option>';
                                                        }
                                                    echo '</select>
                                                    <div class="valid-feedback">Valido.</div>
                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="asignaturaAs" style="color:black;">Asignatura:</label>
                                                    <select id="asignaturaAs" name="asignaturaAs" class="custom-select mb-3 form-control" onchange="showSelected();" required>
                                                        <option selected>-Selecciona-</option>';
                                                        for ($j = 0; $j < sizeof($asignatura); $j++) {
                                                            echo '<option value="' . $asignatura[$j][1] . '">' . $asignatura[$j][3] . '</option>';
                                                        }
                                                    echo '</select>
                                                    <div class="valid-feedback">Valido.</div>
                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="diaAs" style="color:black;">Dia:</label>
                                                    <select id="diaAs" name="diaAs" class="custom-select mb-3 form-control" required>
                                                        <option selected>-Selecciona-</option>
                                                        <option value="1">Lunes</option>
                                                        <option value="2">Martes</option>
                                                        <option value="3">Miercoles</option>
                                                        <option value="4">Jueves</option>
                                                        <option value="5">Viernes</option>
                                                    </select>
                                                    <div class="valid-feedback">Valido.</div>
                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Inicio</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="horaIniAs" placeholder="Hora de Inicio" name="horaIniAs" required>
                                                    <!--<label for="horas" style="color:black;">Horas:</label>-->
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Fin</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="horaFinAs" placeholder="Hora de Fin" name="horaFinAs" required>
                                                    <div class="valid-feedback">Valido.</div>
                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <input type="text" class="form-control" id="idAsesoria" name="idAsesoria" value="x">
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="5">
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
<script type="text/javascript" src="js/editarAsesorias.js?1.0.0"></script>
<!--Bootstrap JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>