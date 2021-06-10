<?php
include("./Controlador/Controlador.php");
$listEsp = getListEsp();
$inv = getInv();
$area = getArea();
$listServ = getListaServicios();
$peri = getPeriodo();
$listaPE = getListaPE();
$ultimaExpo = getUltimaExpo();
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--Componente galeria-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <!--BootStrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--ICONOS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!--Tipografia-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;700&display=swap" rel="stylesheet">
    <!--CSS Local-->
    <link rel="stylesheet" type="text/css" href="css/investigacion.css?1.0.0" />
    <link rel="stylesheet" type="text/css" href="css/login.css?1.0.0" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/peisc.css" />
    <link rel="stylesheet" href="css/asociaciones.css" />
    <link rel="stylesheet" href="css/acreditacion.css?1.0.0" />
    <link rel="stylesheet" href="css/organigrama.css?1.0.0">
    <link rel="stylesheet" href="css/asesorias.css">
    <link rel="stylesheet" href="css/complementarias.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <link rel="stylesheet" type="text/css" href="css/especialidad.css" />
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/servicios.css?1.0.0" />
    <link rel="stylesheet" type="text/css" href="css/historialEspecialidad.css?1.0.0" />
    <link rel="stylesheet" href="css/particula.css?1.0.0">
    <!--iconos de la plataforma fontawesome-->
    <link rel="icon" type="image/png" href="img/icono.png" />
    <title>Isic</title>
</head>

<body>
    <!--
    <div id="contenedor-carga">
        <div id="carga"></div>
    </div>
    <script>
        window.onload = function() {
            var contenedor = document.getElementById('contenedor-carga');
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
        }
    </script> 
    -->
    <nav id="menu" class="navbar navbar-expand-lg fixed-top ">
        <div class="container">
            <a class="navbar-brand" target="_blank" href="http://www.itsoeh.edu.mx/front/">
                <img src="img/logos/itsoeh-isic.png?1.0.0" alt="logo" class="logo-itsoeh-sup">
            </a>
            <div id="hamburger">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="top-line"></span>
                    <span class="middle-line"></span>
                    <span class="bottom-line"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="tabs navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php?1.0.0"><span class="tab-text">Inicio</span></a></li>
                    <li class="nav-item">
                        <div class="dropdown-local">
                            <div class="nav-link"><span class="tab-text">Servicios</span></div>
                            <div class="dropdown-content">
                                <?php
                                for ($i = 0; $i < sizeof($listServ); $i++) {
                                    echo '<a href="servicios.php?idServ=' . $listServ[$i][0] . '">' . $listServ[$i][1] . '</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown-local">
                            <div class="nav-link"><span class="tab-text">Especialidades</span></div>
                            <div class="dropdown-content">
                                <?php
                                for ($x = 0; $x < sizeof($listEsp); $x++) {
                                    echo '<a href="Especialidad.php?sp=' . $listEsp[$x][0] . '">' . $listEsp[$x][1] . '</a>';
                                }
                                ?>
                                <a href="historialEspecialidad.php?1.0.0">Historial de Especialidades</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown-local">
                            <div class="nav-link"><span class="tab-text">Reticula</span></div>
                            <div class="dropdown-content">
                                <?php
                                for ($x = 0; $x < sizeof($listEsp); $x++) {
                                    echo '<a href="mallaCurricular.php?sp=' . $listEsp[$x][0] . '">' . $listEsp[$x][1] . '</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown-local">
                            <div class="nav-link"><span class="tab-text">PE ISC</span></div>
                            <div class="dropdown-content">
                                <?php
                                for ($i = 0; $i < sizeof($listaPE); $i++) {
                                    echo '<a href="peisic.php?pe=' . $listaPE[$i][0] . '">' . $listaPE[$i][1] . '</a>';
                                }
                                ?>
                                <a href="asociaciones.php?1.0.0">Asociaciones</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="organigrama.php?1.0.0"><span class="tab-text">Académia</span></a></li>
                    <li class="nav-item">
                        <div class="dropdown-local">
                            <div class="nav-link"><span class="tab-text">Eventos</span></div>
                            <div class="dropdown-content">
                                <?php
                                for ($x = 0; $x < sizeof($peri); $x++) {
                                    if ($peri[$x][3] === 1) {
                                        $aux = $peri[$x][1] === 1 ? "ENE-MAY" : "AGO-DIC";
                                    }
                                    echo '<a href="expo-sistemas.php?per=' . $peri[$x][0] . '_' . $peri[$x][1] . '_' . $peri[$x][2] . '">' . $aux . ' ' . $peri[$x][2] . '</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>