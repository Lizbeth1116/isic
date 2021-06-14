<?php
include('headAdmin.php');
$pagina0 = 'active';
include('AdminSidebar.php');
?>
<div class="inicio">
    <div class="container">
        <h2>Dashboard</h2>
        <div class="fila">
            <div class="colum">
                <div class="resume-item">
                    <?php 
                    if($contar==0){
                        echo '<h3 style="color:#5e5e5e;"><i class="bi bi-envelope-fill"></i></h3>';
                    }else{
                    echo '<h3><i class="bi bi-envelope-fill"><b style="font-size: 10px; color:#13f579;">+'.$contar.'</b></i></h3>';
                    }
                    ?>
                    <p>Solicitud</p>
                </div>
            </div>
            <div class="colum">
                <div class="resume-item">
                    <h3>589</h3>
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
                    <table>
                        <tr>
                            <td>Ingeniería en Sistemas Computacionales:</td>
                            <td><b>Acreditado en 2019 por 5 años</b></td>
                        </tr>
                        <tr>
                            <td>Matricula registrada 2019:</td>
                            <td><b>256 Estudiantes</b></td>
                        </tr>
                        <tr>
                            <td>Especialidades:</td>
                            <td><b>2 registradas</b></td>
                        </tr>
                        <tr>
                            <td>Laboratorios:</td>
                            <td><b>4 equipados</b></td>
                        </tr>
                        <tr>
                            <td>Desarrollo Tecnológico:</td>
                            <td><b>1 Centro de formación de capital humano</b></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="colum">
                <div class="resume-item">Content</div>
            </div>
        </div>
    </div>
</div>
<?php include('AdminFooter.php')?>
</body>
</html>