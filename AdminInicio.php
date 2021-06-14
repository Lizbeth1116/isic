<?php
include('headAdmin.php');
$contenido = file_get_contents("Config/Vistas.txt");
$contenidoAux = explode("\n", $contenido);
for ($i = 0; $i < sizeof($contenidoAux); $i++) {
    $visitas[$i] = explode(":", $contenidoAux[$i]);
}
//$visitas[$i][0] --> Visitas
//$visitas[$i][1] --> Exporer
//$visitas[$i][2] --> Edge
//$visitas[$i][3] --> Opera
//$visitas[$i][4] --> Firefox
//$visitas[$i][5] --> Chrome
//$visitas[$i][6] --> Safari
//$visitas[$i][7] --> Otros
?>
<div class="inicio">
    <div class="container">
        <h2>Dashboard</h2>
        <div class="fila">
            <div class="colum">
                <div class="resume-item">
                    <?php
                    if ($contar == 0) {
                        echo '<h3 style="color:#5e5e5e;"><i class="bi bi-envelope-fill"></i></h3>';
                    } else {
                        echo '<h3><i class="bi bi-envelope-fill"><b style="font-size: 10px; color:#13f579;">+' . $contar . '</b></i></h3>';
                    }
                    ?>
                    <p>Solicitud</p>
                </div>
            </div>
            <div class="colum">
                <div class="resume-item">
                    <h3><?php echo $visitas[0][1] ?></h3>
                    <p>Visitas</p>
                </div>
            </div>
            <div class="colum">
                <div class="resume-item">
                    <h3>Rolando Porras Muñoz</h3>
                    <p>Jefe de carrera</p>
                </div>
            </div>
        </div>
        <div class="fila">
            <div class="colum">
                <div class="resume-item">
                    <h3>Datos generales</h3>
                    <?php
                    echo '
                    <table>
                        <tr>
                            <td>Ingeniería en Sistemas Computacionales:</td>
                            <td><b>Acreditado en ' . $inforelevante[0][1] . ' por ' . $inforelevante[0][2] . ' años</b></td>
                        </tr>
                        <tr>
                            <td>Matricula registrada ' . $inforelevante[0][1] . ':</td>
                            <td><b>' . $inforelevante[0][3] . '</b></td>
                        </tr>
                        <tr>
                            <td>Especialidades:</td>
                            <td><b>' . $inforelevante[0][4] . ' registradas</b></td>
                        </tr>
                        <tr>
                            <td>Laboratorios:</td>
                            <td><b>' . $inforelevante[0][5] . ' equipados</b></td>
                        </tr>
                        <tr>
                            <td>Desarrollo Tecnológico:</td>
                            <td><b>' . $inforelevante[0][6] . '</b></td>
                        </tr>
                    </table>
                    ';
                    ?>
                </div>
            </div>
            <div class="colum">
                <div class="resume-item">Content</div>
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
<!--Bootstrap JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>