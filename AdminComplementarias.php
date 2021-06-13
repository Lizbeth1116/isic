<?php
include('./headAdmin.php');
$complInfo = getComplementarias();
?>
<div class="admon">
    <div class="container">
        <h2>Complementarias</h2>
        <!--Tabla de especialidad: Sección 1-->
        <div id="titulo">
            <h6><b>Complementarias existentes asociadas a la Ingeniería en Sistemas Computacionales</b><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal1AddComp"><i class="bi bi-plus-circle"></i></button></h6>
        </div>
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>PDF</th>
                    <th>
                        <div class="modal" id="myModal1AddComp">
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
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="6">
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre" style="color:black;">Nombre:</label>
                                                <input type="text" class="form-control" id="nombreComplementAdd" placeholder="Ingrese el nombre de la Complementaria" name="nombreComplementAdd" required>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="objetivo" style="color:black;">Descripción:</label>
                                                <textarea class="form-control" rows="5" id="descComplementAdd" placeholder="Ingresa la descripción de la Complementaria" name="descComplementAdd" required></textarea>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="imagenAdd" style="color:black;">Imagen:</label>
                                                <input type="file" class="form-control" id="imagenComplementAdd" name="imagenComplementAdd" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pdfReticula" style="color:black;">PDF:</label>
                                                <input type="file" accept="application/pdf" class="form-control" id="pdfComplementAdd" name="pdfComplementAdd">
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
                <tr>
                    <?php
                    for ($i = 0; $i < sizeof($complInfo); $i++) {
                        echo '<tr>
                                <td><img src="img/servicios/complementarias/' . $complInfo[$i][3] . '" width=70px></img></td>
                                <td>' . $complInfo[$i][1] . '
                                <p><a href=# data-toggle="modal" data-target="#myModaObjetivo" onclick="modVerMas(\'' . $complInfo[$i][1] . '\', \'' . $complInfo[$i][2] . '\');">Ver mas</a></p>
                                    <div class="modal topmargin-sm" id="myModaObjetivo">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header-->
                                                <div class="modal-header">
                                                    <h5 id="ModNom" class="modal-title" style="color:darkslategrey;"></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <p id="ModObj"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>';
                        if ($complInfo[$i][4] != 'Sin Archivo' && strlen($complInfo[$i][4]) > 0) {
                            echo'<td class="text-center">
                                            <a target="_black" href="http://' . $_SERVER['HTTP_HOST'] . '/isic/pdf/complementarias/' . $complInfo[$i][4] . '">
                                            <i class="bi bi-file-earmark-check"></i></a></td>';
                        } else
                            echo'<td class="text-center"><i class="bi bi-file-earmark-excel"></i></td>';
                        echo '<td> 
                        <div class="btn-group">
                        <button class="btn btn-light btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#myModal" onclick="datosModalComp(\'' . $complInfo[$i][0] . '\', \'' . $complInfo[$i][1] . '\', \'' . $complInfo[$i][2] . '\', \'' . $complInfo[$i][3] . '\', \'' . $complInfo[$i][4] . '\');"><i class="bi bi-pencil-square"></i>Editar</a>';
                        if ($complInfo[$i][5] == 1) {
                            echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=9*' . $complInfo[$i][0] . '*2*1"><i class = "bi bi-eye-slash"></i>Ocultar</a>';
                        } else {
                            echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=9*' . $complInfo[$i][0] . '*1*1"><i class = "bi bi-eye"></i>Activar</a>';
                        }
                        echo '<a class="dropdown-item" href = "Controlador/ControlBorrar.php?id=9*' . $complInfo[$i][0] . '*0*2*' . $complInfo[$i][3] . '*' . $complInfo[$i][4] . '"><i class = "bi bi-trash-fill"></i>Eliminar</a>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal" id="myModal">
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
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="idComplement" name="idComplement">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="7">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nombre" style="color:black;">Nombre:</label>
                                                                <input type="text" class="form-control" id="nombreComplement" placeholder="Nombre de la Complementaria" name="nombreComplement" required>
                                                                <div class="valid-feedback">Valido.</div>
                                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="objetivo" style="color:black;">Descripción:</label>
                                                                <textarea class="form-control" rows="5" id="descComplement" placeholder="Ingresa la descripción de la Complementaria" name="descComplement" required></textarea>
                                                                <div class="valid-feedback">Valido.</div>
                                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="imagenAdd" style="color:black;">Imagen:</label>
                                                                <input type="file" class="form-control" id="imagenComplement" name="imagenComplement">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="pdfReticula" style="color:black;">PDF:</label>
                                                                <input type="file" accept="application/pdf" class="form-control" id="pdfComplement" name="pdfComplement">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="nomOriPdfComplement"  name="nomOriPdfComplement">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="nomOriImgComplement"  name="nomOriImgComplement">
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
<script type="text/javascript" src="js/editarComplementarias.js"></script>
<script type="text/javascript" src="js/verMas.js?1.0.0"></script>
<!--Bootstrap JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>