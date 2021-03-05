<?php
include('./headAdmin.php');
$peri = getPeriodo();
?>
<!DOCTYPE HTML>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!--BootStrap CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--ICONOS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <!--CSS local-->
        <link rel="stylesheet" type="text/css" href="css/admin.css?1.0.0" />
        <link rel="stylesheet" type="text/css" href="css/adminEditor.css?1.0.0" />
        <link rel="stylesheet" type="text/css" href="css/normalize.css?1.0.0" />
        <link rel="stylesheet" type="text/css" href="css/estilos.css?1.0.0" />
        <script type="text/javascript" src="js/main.js?1.0.0"></script>
        <link rel="icon" type="image/png" href="img/icono.png" />
        <title>Administrador</title>
    </head>

    <body>
        <div class="admon">
            <div class="container">
                <h2>Expo Sistemas Proyectatec <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModalAddPeri"><i class="bi bi-calendar-plus"></i></button></h2>
                <div class="modal topmargin-sm" id="myModalAddPeri">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header-->
                            <div class="modal-header">
                                <h5 class="modal-title" style="color:darkslategrey;">Agregar Periodo</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="Controlador/ControlAgregar.php" method="POST">

                                    <div class="form-group" style="display:none">
                                        <input type="text" class="form-control" id="opExp" name="opExp" value="0">
                                    </div>
                                    <div class="form-group" style="display:none">
                                        <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc" style="color:black;">Año:</label>
                                        <input type="text" class="form-control" id="addAnioExp" placeholder="Ingrese el año" name="addAnioExp" required>
                                        <div class="valid-feedback">Valido.</div>
                                        <div class="invalid-feedback">Por favor verifique los campos.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="addperiodoExpo" style="color:black;">Periodo:</label>
                                        <select id="addperiodoExpo" name="addperiodoExpo" class="custom-select mb-3 form-control" required>
                                            <option selected>-Selecciona-</option>
                                            <option value="1">Enero - Mayo</option>
                                            <option value="2">Agosto - Diciembre</option>                                                     
                                        </select>
                                        <div class="valid-feedback">Valido.</div>
                                        <div class="invalid-feedback">Por favor verifique los campos.</div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Tabla de especialidad: Sección 1-->
                <?php
                for ($i = 0; $i < sizeof($peri); $i++) {
                    echo '<div id="titulo">';
                    if ($peri[$i][1] === 1) {
                        echo '<h6><b>Enero - Mayo ' . $peri[$i][2] . '</b>';
                    } else if ($peri[$i][1] === 2) {
                        echo '<h6><b>Agosto - Diciembre ' . $peri[$i][2] . '</b>';
                    }
                    echo '<div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModalAddImg" onclick="datosModalExp2(\'' . $peri[$i][0] . '\');"><i class="bi bi-card-image"></i></button>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModalEdExp" onclick="datosModalExp(\'' . $peri[$i][0] . '\', \'' . $peri[$i][1] . '\', \'' . $peri[$i][2] . '\');"><i class="bi bi-pencil-square"></i></button>
                                        <div class="modal topmargin-sm" id="myModalEdExp">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header-->
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:darkslategrey;">Editar Periodo</h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form class="needs-validation" novalidate action="Controlador/ControlEditar.php" method="POST">
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="idPeriExp" name="idPeriExp">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opExp" name="opExp" value="0">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="desc" style="color:black;">Año:</label>
                                                                <input type="text" class="form-control" id="AnioExp" placeholder="Ingrese el año" name="AnioExp" required>
                                                                <div class="valid-feedback">Valido.</div>
                                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="perExpo" style="color:black;">Periodo:</label>
                                                                <select id="periodoExpo" name="periodoExpo" class="custom-select mb-3 form-control" required>
                                                                    <option selected>-Selecciona-</option>
                                                                    <option value="1">Enero - Mayo</option>
                                                                    <option value="2">Agosto - Diciembre</option>                                                     
                                                                </select>
                                                                <div class="valid-feedback">Valido.</div>
                                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal topmargin-sm" id="myModalAddImg">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header-->
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:darkslategrey;">Editar Periodo</h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form class="needs-validation" novalidate action="Controlador/ControlAgregar.php" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="addIdPeriImag" name="addIdPeriImag" value="1">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opExp" name="opExp" value="1">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="desc" style="color:black;">Descripcion:</label>
                                                                <input type="text" class="form-control" id="addDescripcionExp" placeholder="Ingresa una descripcion a la imagen" name="addDescripcionExp" required>
                                                                <div class="valid-feedback">Valido.</div>
                                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="imag" style="color:black;">Imagen:</label>
                                                                <input type="file" class="form-control" id="addImgExp" placeholder="Seleccione una imagen" name="addImgExp" required>
                                                                <div class="valid-feedback">Valido.</div>
                                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                    if ($peri[$i][3] === 1) {
                        echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=7_' . $peri[$i][0] . '_2_1"><i class = "bi bi-eye"></i></a>';
                    } else {
                        echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=7_' . $peri[$i][0] . '_1_1"><i class = "bi bi-eye-slash"></i></a>';
                    }
                    echo '<a type = "button" class = "btn btn-secondary" href = "Controlador/ControlBorrar.php?id=7_' . $peri[$i][0] . '_0_2"><i class = "bi bi-trash-fill"></i></a>
                            </div></h6>
                    </div>
                    <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>';
                    $imgExpo = getImagenesExpo($peri[$i][0]);
                    for ($j = 0; $j < sizeof($imgExpo); $j++) {
                        echo "<tr> <td><img src='data:" . $imgExpo[$j][4] . "; base64," . base64_encode($imgExpo[$j][1]) . "' width=120px></img></td>";
                        echo '<td>' . $imgExpo[$j][2] . '</td><td>';
                        if ($imgExpo[0][0] >= 0) {
                            echo ' <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal" onclick="datosModalExp1(\'' . $imgExpo[$j][0] . '\', \'' . $imgExpo[$j][2] . '\');"><i class="bi bi-pencil-square"></i></button>';
                            if ($imgExpo[$j][3] === 1) {
                                echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=6_' . $imgExpo[$j][0] . '_2_1"><i class = "bi bi-eye"></i></a>';
                            } else {
                                echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=6_' . $imgExpo[$j][0] . '_1_1"><i class = "bi bi-eye-slash"></i></a>';
                            }
                            echo '<a type = "button" class = "btn btn-secondary" href = "Controlador/ControlBorrar.php?id=6_' . $imgExpo[$j][0] . '_0_2"><i class = "bi bi-trash-fill"></i></a>
                                            </div>
                                        <div class="modal topmargin-sm" id="myModal">
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
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="idImgExp" name="idImgExp">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opExp" name="opExp" value="1">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="desc" style="color:black;">Descripcion:</label>
                                                                <input type="text" class="form-control" id="descripcionExp" placeholder="Ingresa una descripcion a la imagen" name="descripcionExp" required>
                                                                <div class="valid-feedback">Valido.</div>
                                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
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
                    }
                    echo '</tbody>
                          </table>';
                }
                ?>
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
<script type="text/javascript" src="js/editarExpo.js"></script>
<!--Bootstrap JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>