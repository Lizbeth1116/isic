<?php

$admin = $_POST['admin'];
$pass = $_POST['pass'];

if ($admin === 'isic' && $pass === 'itsoeh.isic2021'):
    header("Location: ../Administrador.php");
else:
    header("Location: ../index.php");
endif;
