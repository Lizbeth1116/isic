<?php
include('./headAdmin.php');
$especialidad = getEspecialidadAdmin();
$egreso = getEgresoAdmin();
$asiEsp = getAsignaturaEspAdmin();
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
                <h2>Especialidades</h2>
                <!--Tabla de especialidad: Sección 1-->
                <div id="titulo">
                    <h6><b>Especilidades existentes en la malla curricular de la Ingeniería en Sistemas Computacionales</b></h6>
                </div>
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Objetivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            for ($i = 0; $i < sizeof($especialidad); $i++) {
                                echo '<tr>
                                        <td>' . $especialidad[$i][0] . '</td>
                                    <td>' . $especialidad[$i][1] . '</td>
                                    <td> <a href=# data-toggle="modal" data-target="#myModaObjetivo" onclick="modVerMas(\'' . $especialidad[$i][1] . '\', \'' . $especialidad[$i][2] . '\');">Ver mas</a>
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
                                    </td>
                                    <td> 
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal" onclick="datosModalEsp1(\'' . $especialidad[$i][0] . '\', \'' . $especialidad[$i][1] . '\', \'' . $especialidad[$i][2] . '\');"><i class="bi bi-pencil-square"></i></button>';
                                if ($especialidad[$i][3] === 1) {
                                    echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=0_' . $especialidad[$i][0] . '_2_1"><i class = "bi bi-eye"></i></a>';
                                } else {
                                    echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=0_' . $especialidad[$i][0] . '_1_1"><i class = "bi bi-eye-slash"></i></a>';
                                }
                                echo '<a type = "button" class = "btn btn-secondary" href = "Controlador/ControlBorrar.php?id=0_' . $especialidad[$i][0] . '_0_2"><i class = "bi bi-trash-fill"></i></a>
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
                                                                <input type="text" class="form-control" id="idespecialidadEsp" name="idespecialidadEsp">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opEsp" name="opEsp" value="1">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nombre" style="color:black;">Nombre:</label>
                                                                <input type="text" class="form-control" id="nombreEsp" placeholder="Ingresa el nombre de la especialidad" name="nombreEsp" required>
                                                                <div class="valid-feedback">Valido.</div>
                                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="objetivo" style="color:black;">Objetivo:</label>
                                                                <textarea class="form-control" rows="5" id="objetivoEsp" placeholder="Ingresa el objetivo de la especialidad" name="objetivoEsp" required></textarea>
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
                            ?>
                    </tbody>
                </table>
                <!--Tabla de especialidad: Sección 2-->
                <div id="titulo">
                    <h6><b>Perfil de egreso de las distintas especiliadades</b></h6>
                </div>
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th>Especialidad</th>
                            <th>Perfil de Egreso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < sizeof($egreso); $i++) {
                            echo '<tr>
                                        <td>' . $egreso[$i][1] . '</td>
                                        <td> <a href=# data-toggle="modal" data-target="#myModalEgr" onclick="modVerMasEgr(\'' . $egreso[$i][1] . '\', \'' . $egreso[$i][2] . '\');">Ver mas</a>
                                            <div class="modal topmargin-sm" id="myModalEgr">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header-->
                                                        <div class="modal-header">
                                                            <h5 id="ModEspEgr" class="modal-title" style="color:darkslategrey;"></h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <p id="ModEgre"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal1" onclick="datosModalEsp2(\'' . $egreso[$i][0] . '\', \'' . $egreso[$i][2] . '\');"><i class="bi bi-pencil-square"></i></button>';
                            if ($egreso[$i][3] === 1) {
                                echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=1_' . $egreso[$i][0] . '_' . $egreso[$i][2] . '_2_1"><i class = "bi bi-eye"></i></a>';
                            } else {
                                echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=1_' . $egreso[$i][0] . '_' . $egreso[$i][2] . '_1_1"><i class = "bi bi-eye-slash"></i></a>';
                            }
                            echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=1_' . $egreso[$i][0] . '_' . $egreso[$i][2] . '_0_2"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                            <div class="modal topmargin-sm" id="myModal1">
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
                                                                    <label for="perfil" style="color:black;">Perfil de Egreso:</label>
                                                                    <textarea class="form-control" rows="5" id="perfilEsp" placeholder="Ingresa el perfil de egreso" name="perfilEsp" required></textarea>
                                                                    <div class="valid-feedback">Valido.</div>
                                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                                </div>
                                                                <div class="form-group" style="display:none">
                                                                    <input type="text" class="form-control" id="idegresoEsp" name="idegresoEsp" required>
                                                                </div>
                                                                <div class="form-group" style="display:none">
                                                                    <input type="text" class="form-control" id="perfilOriEsp" name="perfilOriEsp"required>
                                                                </div>
                                                                <div class="form-group" style="display:none">
                                                                    <input type="text" class="form-control" id="opEsp" name="opEsp" value="2">
                                                                </div>
                                                                <div class="form-group" style="display:none">
                                                                    <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="1">
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
                <!--Tabla de especialidad: Sección 3-->
                <div id="titulo">
                    <h6><b>Asignaturas existentes de las distintas especilidades de la Ingeniería en Sistemas Computacionales</b></h6>
                </div>
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th>Especialidad</th>
                            <th>Clave Asignatura</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < sizeof($asiEsp); $i++) {
                            echo '<tr>
                                        <td>' . $asiEsp[$i][1] . '</td>
                                        <td>' . $asiEsp[$i][2] . '</td>
                                        <td> <a href=# data-toggle="modal" data-target="#myModalDesc" onclick="modVerMasDesc(\'' . $asiEsp[$i][2] . '\', \'' . $asiEsp[$i][3] . '\');">Ver mas</a>
                                            <div class="modal topmargin-sm" id="myModalDesc">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header-->
                                                        <div class="modal-header">
                                                            <h5 id="ModClav" class="modal-title" style="color:darkslategrey;"></h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <p id="ModDesc"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal2" onclick="datosModalEsp3(\'' . $asiEsp[$i][0] . '\', \'' . $asiEsp[$i][2] . '\', \'' . $asiEsp[$i][3] . '\');"><i class="bi bi-pencil-square"></i></button>';

                            if ($asiEsp[$i][4] === 1) {
                                echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=2_' . $asiEsp[$i][0] . '_' . $asiEsp[$i][2] . '_2_1"><i class = "bi bi-eye"></i></a>';
                            } else {
                                echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=2_' . $asiEsp[$i][0] . '_' . $asiEsp[$i][2] . '_1_1"><i class = "bi bi-eye-slash"></i></a>';
                            }
                            echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=2_' . $asiEsp[$i][0] . '_' . $asiEsp[$i][2] . '_0_2"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                            <div class="modal topmargin-sm" id="myModal2">
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
                                                                <div class="form-group" >
                                                                    <label for="descripcion" id="labclaveEsp" name="labclaveEsp" style="color:black;"></label>
                                                                    <input type="text" class="form-control" id="claveEsp" name="claveEsp" style="display:none" required>
                                                                </div>
                                                                <div class="form-group" style="display:none">
                                                                    <input type="text" class="form-control" id="idEspEsp" name="idEspEsp">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="descripcion" style="color:black;">Descripción:</label>
                                                                    <textarea class="form-control" rows="5" id="descripcionEsp" placeholder="Ingresa la descripción de la asignatura" name="descripcionEsp" required></textarea>
                                                                    <div class="valid-feedback">Valido.</div>
                                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                                </div>
                                                                <div class="form-group" style="display:none">
                                                                    <input type="text" class="form-control" id="opEsp" name="opEsp" value="3">
                                                                </div>
                                                                <div class="form-group" style="display:none">
                                                                    <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="1">
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
<script type="text/javascript" src="js/editarEspecialidad.js?1.0.0"></script>
<script type="text/javascript" src="js/editarMallaCurricular.js?1.0.0"></script>
<script type="text/javascript" src="js/editarInvestigacion.js?1.0.0"></script>
<script type="text/javascript" src="js/verMas.js?1.0.0"></script>
<!--Bootstrap JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>