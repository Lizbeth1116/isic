<?php
include('./headAdmin.php');
$listEsp = getListEsp();
$asignatura = getMallaAdmin();
$listAsigEsp = getListAsigEspAdmin();
?>
<div class="admon">
    <div class="container">
        <h2>Malla Curricular</h2>
        <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
        <br>
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Sem</th>
                    <th>Área de conocimiento</th>
                    <th>Clave</th>
                    <th>Asignatura</th>
                    <th>Horas</th>
                    <th>Temario</th>
                    <th><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal1AddMalla"><i class="bi bi-plus-circle"></i></button>
                        <div class="modal topmargin-sm" id="myModal1AddMalla">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header-->
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="color:darkslategrey;">Agregar</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="Controlador/ControlAgregar.php" enctype="multipart/form-data" method="POST">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Clave</span>
                                                </div>
                                                <input type="text" class="form-control" id="claveMCAdd" placeholder="Ingresa la clave de asignatura" name="claveMCAdd" required>
                                                <!--<label for="horas" style="color:black;">Horas:</label>-->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Horas</span>
                                                </div>
                                                <input type="text" class="form-control" id="horasMCAdd" placeholder="Ingresa las horas de la asignatura" name="horasMCAdd" required>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="semestreMCAdd" style="color:black;">Semestre:</label>
                                                <select id="semestreMCAdd" name="semestreMCAdd" class="custom-select mb-3 form-control" required>
                                                    <option selected>-Selecciona-</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                </select>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="conocimientoMCAdd" style="color:black;">Área de conocimiento:</label>
                                                <select id="conocimientoMCAdd" name="conocimientoMCAdd" class="custom-select mb-3 form-control" onchange="showSelected();" required>
                                                    <option selected>-Selecciona-</option>
                                                    <option value="Ciencias de la Ingenieria">Ciencias de la Ingenieria</option>
                                                    <option value="Ciencias Sociales y Humanidades">Ciencias Sociales y Humanidades</option>
                                                    <option value="Ciencias economico administrativa">Ciencias economico administrativa</option>
                                                    <option value="Ciencias Basicas">Ciencias Básicas</option>
                                                    <option value="Cursos complementarios">Cursos complementarios</option>
                                                    <option value="Ingenieria Aplicada">Ingenieria Aplicada</option>
                                                    <option value="Diseño en Ingenieria">Diseño en Ingenieria</option>
                                                    <option value="Especialidad">Especialidad</option>
                                                </select>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <div class="form-group">
                                                <label id="especialidadtxtMCAdd" for="conocimiento" style="color:black;display:none">Especialidad:</label>
                                                <select id="especialidadMCAdd" name="especialidadMCAdd" class="custom-select mb-3 form-control" style="display:none" required>
                                                    <option selected>-Selecciona-</option>
                                                    <option value="-1" style="display:none"></option>';
                                                    <?php
                                                    for ($j = 0; $j < sizeof($listEsp); $j++) {
                                                        echo '<option value="' . $listEsp[$j][0] . '">' . $listEsp[$j][1] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombreMCAdd" style="color:black;">Nombre de la asignatura:</label>
                                                <input type="text" class="form-control" id="nombreMCAdd" placeholder="Ingresa el nombre de asignatura" name="nombreMCAdd" required>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="pdfAsignaturaAdd" style="color:black;">PDF Datos Asignatura:</label>
                                                <input type="file" accept="application/pdf" class="form-control" id="pdfAsignaturaAdd" name="pdfAsignaturaAdd" required>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="3">
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
            <tbody id="myTable">
                <?php
                for ($i = 0; $i < sizeof($asignatura); $i++) {
                    echo '
                                    <tr>
                                        <td>' . $asignatura[$i][0] . '</td>
                                        <td>' . $asignatura[$i][4] . '</td>
                                        <td>' . $asignatura[$i][1] . '</td>
                                        <td>' . $asignatura[$i][3] . '</td>
                                        <td>' . $asignatura[$i][2] . '</td>';
                    if ($asignatura[$i][6] != 'Sin Archivo' && strlen($asignatura[$i][6]) > 0) {
                        echo'<td class="text-center">
                                            <a target="_black" href="http://' . $_SERVER['HTTP_HOST'] . '/isic/pdf/asignaturas/' . $asignatura[$i][6] . '">
                                            <i class="bi bi-file-earmark-check"></i></a></td>';
                    } else
                        echo'<td class="text-center"><i class="bi bi-file-earmark-excel"></i></td>';
                    echo'<td> 
                                            <div class="btn-group btn-group-sm">';
                    $tmp2 = "f";
                    for ($j = 0; $j < sizeof($listAsigEsp); $j++) {
                        if ($tmp2 != "t") {
                            $tmp2 = "f";
                        }
                        if ($listAsigEsp[$j][2] === $asignatura[$i][1]) {
                            echo '<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModalMC" onclick="datosModalMC2(\'' . $asignatura[$i][0] . '\', \'' . $asignatura[$i][4] . '\', \'' . $asignatura[$i][1] . '\', \'' . $asignatura[$i][3] . '\', \'' . $asignatura[$i][2] . '\', \'' . $listAsigEsp[$j][0] . '\', \'' . $asignatura[$i][6] . '\');"><i class="bi bi-pencil-square"></i></button>';
                            $tmp2 = "t";
                        }
                    }
                    if ($tmp2 == "f") {
                        echo '<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModalMC" onclick="datosModalMC1(\'' . $asignatura[$i][0] . '\', \'' . $asignatura[$i][4] . '\', \'' . $asignatura[$i][1] . '\', \'' . $asignatura[$i][3] . '\', \'' . $asignatura[$i][2] . '\', \'' . $asignatura[$i][6] . '\');"><i class="bi bi-pencil-square"></i></button>';
                    }

                    if ($asignatura[$i][5] === 1) {
                        echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=3_' . $asignatura[$i][1] . '_2_1"><i class = "bi bi-eye"></i></a>';
                    } else {
                        echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=3_' . $asignatura[$i][1] . '_1_1"><i class = "bi bi-eye-slash"></i></a>';
                    }
                    echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=3_' . $asignatura[$i][1] . '_0_2_' . $asignatura[$i][6] . '"><i class="bi bi-trash-fill"></i></a>
                                                <!-- The Modal -->
                                            </div>
                                            <div class="modal topmargin-sm" id="myModalMC">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header-->
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color:darkslategrey;">Editar</h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form class="needs-validation" novalidate action="Controlador/ControlEditar.php" enctype="multipart/form-data" method="POST">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Clave</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="claveMC" placeholder="Ingresa la clave de asignatura" name="claveMC" required>
                                                                    <!--<label for="horas" style="color:black;">Horas:</label>-->
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Horas</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="horasMC" placeholder="Ingresa las horas de la asignatura" name="horasMC" required>
                                                                    <div class="valid-feedback">Valido.</div>
                                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="semestreMC" style="color:black;">Semestre:</label>
                                                                    <select id="semestreMC" name="semestreMC" class="custom-select mb-3 form-control" required>
                                                                        <option selected>-Selecciona-</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                    </select>
                                                                    <div class="valid-feedback">Valido.</div>
                                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="conocimientoMC" style="color:black;">Área de conocimiento:</label>
                                                                        <select id="conocimientoMC" name="conocimientoMC" class="custom-select mb-3 form-control" onchange="showSelected();" required>
                                                                            <option selected>-Selecciona-</option>
                                                                            <option value="Ciencias de la Ingenieria">Ciencias de la Ingenieria</option>
                                                                            <option value="Ciencias Sociales y Humanidades">Ciencias Sociales y Humanidades</option>
                                                                            <option value="Ciencias economico administrativa">Ciencias economico administrativa</option>
                                                                            <option value="Ciencias Basicas">Ciencias Básicas</option>
                                                                            <option value="Cursos complementarios">Cursos complementarios</option>
                                                                            <option value="Ingenieria Aplicada">Ingenieria Aplicada</option>
                                                                            <option value="Diseño en Ingenieria">Diseño en Ingenieria</option>
                                                                            <option value="Especialidad">Especialidad</option>
                                                                        </select>
                                                                        <div class="valid-feedback">Valido.</div>
                                                                        <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                                    </div>
                                                                <div class="form-group">
                                                                <label id="especialidadtxtMC" for="conocimiento" style="color:black;display:none">Especialidad:</label>
                                                                    <select id="especialidadMC" name="especialidadMC" class="custom-select mb-3 form-control" style="display:none" required>
                                                                        <option selected>-Selecciona-</option>
                                                                        <option value="-1" style="display:none"></option>';
                    for ($j = 0; $j < sizeof($listEsp); $j++) {
                        echo '<option value="' . $listEsp[$j][0] . '">' . $listEsp[$j][1] . '</option>';
                    }
                    echo '
                                                                    </select>
                                                                    <div class="valid-feedback">Valido.</div>
                                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nombreMC" style="color:black;">Nombre de la asignatura:</label>
                                                                    <input type="text" class="form-control" id="nombreMC" placeholder="Ingresa el nombre de asignatura" name="nombreMC" required>
                                                                    <div class="valid-feedback">Valido.</div>
                                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                                </div>

                                                                <div class="form-group" style="display:none">
                                                                    <input type="text" class="form-control" id="claveOriMC"  name="claveOriMC" value="' . $asignatura[$i][1] . '">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pdfAsignatura" style="color:black;">PDF Datos Asignatura:</label>
                                                                    <input type="file" accept="application/pdf" class="form-control" id="pdfAsignatura" name="pdfAsignatura">
                                                                </div> 
                                                                <div class="form-group" style="display:none">
                                                                    <input type="text" class="form-control" id="nomOriPdf"  name="nomOriPdf" >
                                                                </div>
                                                                <div class="form-group" style="display:none">
                                                                    <input type="text" class="form-control" id="opMC"  name="opMC" value="-1">
                                                                </div>
                                                                <div class="form-group" style="display:none">
                                                                    <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="3">
                                                                </div>
                                                                <div class="form-group" style="display:none">
                                                                    <input type="text" class="form-control" id="idespecialidadOriMC"  name="idespecialidadOriMC" value="${-1}">
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
<script type="text/javascript" src="js/editarEspecialidad.js?1.0.0"></script>
<script type="text/javascript" src="js/editarMallaCurricular.js?1.0.0"></script>
<script type="text/javascript" src="js/editarInvestigacion.js?1.0.0"></script>
<script type="text/javascript" src="js/verMas.js?1.0.0"></script>
<script type="text/javascript" src="js/buscadorTablas.js?1.0.0"></script>

<!--Bootstrap JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>