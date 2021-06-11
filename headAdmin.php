<?php
include("./Controlador/Controlador.php");
if (!$_COOKIE['logueado']) {
    $admin = $_POST['admin'];
    $pass = $_POST['pass'];
    $Usadmin = getAdmin();
    if ($admin === $Usadmin[0][0] && $pass === $Usadmin[0][1]) {
        setcookie('logueado', TRUE, time() + 2 * 60 * 60); 
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
        <!--Tipografia-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;700&display=swap" rel="stylesheet">
        <!--ICONOS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <!--CSS local-->
        <link rel="stylesheet" type="text/css" href="css/admin.css?1.0.0" />
        <link rel="stylesheet" type="text/css" href="css/adminEditor.css?1.0.0" />
        <link rel="stylesheet" type="text/css" href="css/normalize.css?1.0.0" />
        <link rel="stylesheet" type="text/css" href="css/estilos.css?1.0.0" />
        <link rel="stylesheet" type="text/css" href="css/adminInicio.css?1.0.0" />
        <link rel="stylesheet" type="text/css" href="css/tabs.css?1.0.0" />
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
                <a href="index.php" class="salir">Log out</a>
                <!--<a class="navbar-brand" >
                        
                    </a>-->
            </div>
        </nav>
        <div class="wrapper fixed-left">
            <nav id="sidebar">
                <ul class="tabs list-unstyled components">
                    <li style="padding-top: 60px;"><a href="AdminInicio.php?1.0.0"><i class="bi bi-house"></i>Inicio</a></li>
                    <li><a href="AdminEspecialidad.php?1.0.0"><i class="bi bi-journal-text"></i>Especialidad</a></li>
                    <li><a href="AdminMalla.php?1.0.0"><i class="bi bi-receipt-cutoff"></i>Malla Curricular</a></li>
                    <li><a href="AdminInvestigacion.php?1.0.0"><i class="bi bi-people"></i>Investigacion</a></li>
                    <li><a href="AdminExpo.php?1.0.0"><i class="bi bi-hdd-network"></i>Expo Sistemas</a></li>
                    <li><a href="AdminAsesorias.php?1.0.0"><i class="bi bi-file-earmark-person"></i>Asesorias</a></li>
                    <li><a href="AdminComplementarias.php?1.0.0"><i class="bi bi-puzzle"></i>Complementarias</a></li>
                    <li><a href="AdminHistorialEsp.php?1.0.0"><i class="bi bi-clock-history"></i>Hitorial Especialidad</a></li>
                    <li><a href="AdminContraseña.php?1.0.0"><i class="bi bi-shield-lock"></i>Seguridad</a></li>
                </ul>
            </nav>
        </div>


