<?php

$admin = $_POST['admin'];
$pass = $_POST['pass'];

if ($admin === '*****' && $pass === 'itsoeh***'):
    header("Location: ../Administrador.php");
else:
    header("Location: ../index.php");
endif;
