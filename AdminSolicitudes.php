<?php
include('./headAdmin.php');
$solicitud = getSolicitud();
$pagina8 = 'active';
include('AdminSidebar.php');
?>
<div class="admon">
    <div class="container">
        <h2>Solicitudes</h2>
        <!--Tabla de especialidad: Sección 1-->
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'tab1')" id="defaultOpen"><i class="bi bi-envelope-fill"></i>Pendientes</button>
            <button class="tablinks" onclick="openCity(event, 'tab2')"><i class="bi bi-envelope-open-fill"></i>Vistas</button>
        </div>
        <div id="tab1" class="tabcontent">
            <!--Tabla de solicitudes no vistas: Sección 1-->
            <div id="titulo">
                <h6><b>Solicitudes no vistas </b>
                    <?php echo '<b class="notificacion" id="contarN" style="font-size: 15px;">' . $contar . '</b>'; ?>
                </h6>
            </div>
            <table class="table table-light table-hover solicitud-n">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <!--<th>Matricula</th>-->
                        <th>Proyecto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($solicitud[0][0] != 'x') {
                        foreach ($solicitud as $solicitudNV) {
                            if ($solicitudNV[10] == 2) {
                                $contar ++;
                                echo '
                                <tr>
                                    <td><b>' . $solicitudNV[9] . '</b></td>
                                    <!--<td>' . $solicitudNV[7] . '</td>-->
                                    <td><b>' . $solicitudNV[8] . '<b></td>
                                    <td> <a href="#" data-toggle="modal" data-target="#myModalSoliComNo" onclick="modVerMasSoli(\'' . $solicitudNV[1] . '\', \'' . $solicitudNV[2] . '\', \'' . $solicitudNV[3] . '\', \'' . $solicitudNV[4] . '\', \'' . $solicitudNV[5] . '\', \'' . $solicitudNV[6] . '\', \'' . $solicitudNV[7] . '\', \'' . $solicitudNV[8] . '\', \'' . $solicitudNV[9] . '\');"><b>Ver mas...</b></a>
                                        <div class="modal topmargin-sm" id="myModalSoliComNo">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header-->
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:darkslategrey;">Datos de la solicitud</h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <p id="pSoliNo"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-light btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>Opciones
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a type="button" class="dropdown-item" href="Controlador/ControlBorrar.php?id=13*' . $solicitudNV[0] . '*1"><i class = "bi bi-envelope-open-fill"></i>Marcar como vista</a>
                                                <a type="button" class="dropdown-item" href="Controlador/ControlBorrar.php?id=13*' . $solicitudNV[0] . '*2"><i class="bi bi-trash-fill"></i>Eliminar</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>';
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="tab2" class="tabcontent">
            <!--Tabla de solicitudes vistas: Sección 2-->
            <div id="titulo">
                <h6><b>Solicitudes vistas</b></h6>
            </div>
            <table class="table table-light table-hover solicitud-v">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <!--<th>Matricula</th>-->
                        <th>Proyecto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($solicitud[0][0] != 'x') {
                        foreach ($solicitud as $solicitudNV) {
                            if ($solicitudNV[10] == 1) {
                                echo '
                                <tr>
                                    <td>' . $solicitudNV[9] . '</td>
                                    <!--<td>' . $solicitudNV[7] . '</td>-->
                                    <td>' . $solicitudNV[8] . '</td>
                                    <td> <a href=# data-toggle="modal" data-target="#myModalSoliCom" onclick="modVerMasSoli2(\'' . $solicitudNV[1] . '\', \'' . $solicitudNV[2] . '\', \'' . $solicitudNV[3] . '\', \'' . $solicitudNV[4] . '\', \'' . $solicitudNV[5] . '\', \'' . $solicitudNV[6] . '\', \'' . $solicitudNV[7] . '\', \'' . $solicitudNV[8] . '\', \'' . $solicitudNV[9] . '\');">Ver mas</a>
                                        <div class="modal topmargin-sm" id="myModalSoliCom">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:darkslategrey;">Datos de la solicitud</h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p id="pSoli"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-light btn-sm" type="button">
                                            <a href="Controlador/ControlBorrar.php?id=13*' . $solicitudNV[0] . '*2"><i class="bi bi-trash-fill"></i></a>
                                        </button>
                                    </td>
                                </tr>';
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="js/tabs.js"></script>
</div>
</div>
</div>
<?php include('AdminFooter.php')?>
<!--JS Local-->
<script type="text/javascript" src="js/verMas.js"></script>
</body>

</html>