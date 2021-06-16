<?php
include('headAdmin.php');
$pagina0 = 'active';
include('AdminSidebar.php');
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
                        echo '<h3><i class="bi bi-envelope-fill"></i><b style="font-size: 14px; color:#5e5e5e;">+' . $contar . '</b></h3>';
                    }
                    ?>
                    <p><a href="AdminSolicitudes.php?1.0.0"><b>Solicitudes</b></a></p>
                </div>
            </div>
            <div class="colum">
                <div class="resume-item">
                    <h3><?php echo $visitas[0][1] ?></h3>
                    <p><b>Visitas</b></p>
                </div>
            </div>
            <div class="colum">
                <div class="resume-item">
                    <h3>Rolando Porras Muñoz</h3>
                    <p><b>Jefe de carrera</b></p>
                </div>
            </div>
        </div>
        <div class="fila">
            <div class="colum">
                <div class="resume-item">
                    <h3>Datos de Acreditación</h3>
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
                <div class="resume-item">
                    <table class="navegador">
                        <tr>
                            <td><b class="chrome">Chrome</b><br></td>
                            <td class="barra">
                                <div id="myProgress">
                                    <div id="myBar1">10%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b class="firefox">Firefox</b><br></td>
                            <td class="barra">
                                <div id="myProgress">
                                    <div id="myBar2">10%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b class="edge">Edge</b><br></td>
                            <td class="barra">
                                <div id="myProgress">
                                    <div id="myBar3">10%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b class="explorer">Explorer</b><br></td>
                            <td class="barra">
                                <div id="myProgress">
                                    <div id="myBar4">10%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b class="safari">Safari</b><br></td>
                            <td class="barra">
                                <div id="myProgress">
                                    <div id="myBar5">10%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b class="otros">Otros</b><br></td>
                            <td class="barra">
                                <div id="myProgress">
                                    <div id="myBar6">10%</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="js/progressbar.js"></script>
<?php include('AdminFooter.php') ?>
</body>

</html>