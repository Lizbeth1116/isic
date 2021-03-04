<?php
include("./Controlador/Controlador.php");
$listEsp = getListEsp();
$asignatura = getMallaAdmin();
$listAsigEsp = getListAsigEspAdmin();
$tema = getTemaInv();
$doce = getDocente();
$inv = getInv();
$especialidad = getEspecialidadAdmin();
$egreso = getEgresoAdmin();
$asiEsp = getAsignaturaEspAdmin();

session_start();
if ($_SESSION['logueado'] == FALSE) {
    $admin = $_POST['admin'];
    $pass = $_POST['pass'];
    //Verifica si dentro del bucle se ha encontrado el usuario.
    if (($admin === 'isic' && $pass === 'itsoeh.isic2021') || $_SESSION['logueado'] == true) {
        $_SESSION['logueado'] = true;
    } else {
        session_destroy();
        header("Location: index.php");
    }
}
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
        <nav class="navbar navbar-expand-lg navbar-light dark fixed-top">
            <div class="container-fluid">
                <div id="hamburger">
                    <button id="sidebarCollapse" class="active">
                        <!--<i class="fas fa-lg fa-bars"></i>-->
                        <span class="top-line"></span>
                        <span class="middle-line"></span>
                        <span class="bottom-line"></span>
                    </button>
                </div>
                <a class="navbar-brand text-light ml-auto"><img src="img/isic-itsoeh-logo-blanco.png" alt="itsoeh-logo" class="itsoeh-logo-white"></a>
                <a href="index.php" class="salir">Log out</a>
                <!--<a class="navbar-brand" >
                        
                    </a>-->
            </div>
        </nav>
        <div class="wrapper fixed-left">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a class="navbar-brand" target="_blank" href="http://www.itsoeh.edu.mx/front/">
                        <img src="img/logos/logo-isic-blanco.png" alt="logo-isic" class="isic-logo-white">
                    </a>
                </div>
                <ul class="tabs list-unstyled components">
                    <li><a href="#tab1"><i class="bi bi-house"></i>Inicio</a></li>
                    <li><a href="#tab2"><i class="bi bi-journal-text"></i>Especialidad</a></li>
                    <li><a href="#tab3"><i class="bi bi-receipt-cutoff"></i>Malla Curricular</a></li>
                    <li><a href="#tab4"><i class="bi bi-people"></i>Investigacion</a></li>
                </ul>
            </nav>

            <div class="secciones">
                <article id="tab1">
                    <div class="inicio">
                        <section id="home">
                            <div class="container">
                                <div class="content-center topmargin-lg">
                                    <p>
                                    <h1>TECNOLÓGICO NACIONAL DE MÉXICO</h1>
                                    </p>
                                    <p>
                                    <h5>INSTITUTO TECNOLÓGICO SUPERIOR DEL OCCIDENTE DEL ESTADO DE HIDALGO</h5>
                                    </p>
                                    <p>
                                    <h6>INGENIERÍA EN SISTEMAS COMPUTACIONALES</h6>
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>
                </article>
                <article id="tab2">
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
                </article>
                <article id="tab3">
                    <div class="admon">
                        <div class="container">
                            <h2>Malla Curricular</h2>
                            <table class="table table-light table-hover">
                                <thead>
                                    <tr>
                                        <th>Semestre</th>
                                        <th>Área de conocimiento</th>
                                        <th>Clave</th>
                                        <th>Asignatura</th>
                                        <th>Horas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < sizeof($asignatura); $i++) {
                                        echo '
                                    <tr>
                                        <td>' . $asignatura[$i][0] . '</td>
                                        <td>' . $asignatura[$i][4] . '</td>
                                        <td>' . $asignatura[$i][1] . '</td>
                                        <td>' . $asignatura[$i][3] . '</td>
                                        <td>' . $asignatura[$i][2] . '</td>
                                        <td> 
                                            <div class="btn-group btn-group-sm">';
                                        $tmp2 = "f";
                                        for ($j = 0; $j < sizeof($listAsigEsp); $j++) {
                                            if ($tmp2 != "t") {
                                                $tmp2 = "f";
                                            }
                                            if ($listAsigEsp[$j][2] === $asignatura[$i][1]) {
                                                echo '<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModalMC" onclick="datosModalMC2(\'' . $asignatura[$i][0] . '\', \'' . $asignatura[$i][4] . '\', \'' . $asignatura[$i][1] . '\', \'' . $asignatura[$i][3] . '\', \'' . $asignatura[$i][2] . '\', \'' . $listAsigEsp[$j][0] . '\');"><i class="bi bi-pencil-square"></i></button>';
                                                $tmp2 = "t";
                                            }
                                        }
                                        if ($tmp2 == "f") {
                                            echo '<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModalMC" onclick="datosModalMC1(\'' . $asignatura[$i][0] . '\', \'' . $asignatura[$i][4] . '\', \'' . $asignatura[$i][1] . '\', \'' . $asignatura[$i][3] . '\', \'' . $asignatura[$i][2] . '\');"><i class="bi bi-pencil-square"></i></button>';
                                        }

                                        if ($asignatura[$i][5] === 1) {
                                            echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=3_' . $asignatura[$i][1] . '_2_1"><i class = "bi bi-eye"></i></a>';
                                        } else {
                                            echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=3_' . $asignatura[$i][1] . '_1_1"><i class = "bi bi-eye-slash"></i></a>';
                                        }
                                        echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=3_' . $asignatura[$i][1] . '_0_2"><i class="bi bi-trash-fill"></i></a>
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
                                                            <form class="needs-validation" novalidate action="Controlador/ControlEditar.php" method="POST">
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
                </article>
                <article id="tab4">
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
                                            echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=4_' . $tema[$i][0] . '_2_1"><i class = "bi bi-eye"></i></a>';
                                        } else {
                                            echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=4_' . $tema[$i][0] . '_1_1"><i class = "bi bi-eye-slash"></i></a>';
                                        }
                                        echo '<a type="button" class="btn btn-secondary" href="Controlador/ControlBorrar.php?id=4_' . $tema[$i][0] . '_0_2"><i class="bi bi-trash-fill"></i></a>
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
                </article>
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