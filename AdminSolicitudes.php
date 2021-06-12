<?php
include('./headAdmin.php');
$solicitud = getSolicitud();
?>
<div class="admon">
    <div class="container">
        <h2>Solicitudes</h2>
        <!--Tabla de especialidad: Sección 1-->
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'tab1')" id="defaultOpen"><i class="bi bi-envelope-fill"></i>Solicitudes no vistas</button>
            <button class="tablinks" onclick="openCity(event, 'tab2')"><i class="bi bi-envelope-open-fill"></i>Solicitudes vistas</button>

        </div>
        <div id="tab1" class="tabcontent">
            <!--Tabla de solicitudes no vistas: Sección 1-->
            <div id="titulo">
                <h6><b>Solicitudes no vistas</b></h6>
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
                                    <td> <a href="#" data-toggle="modal" data-target="#myModalSoliComNo2" onclick="modVerMasSoli(\'' . $solicitudNV[1] . '\', \'' . $solicitudNV[2] . '\', \'' . $solicitudNV[3] . '\', \'' . $solicitudNV[4] . '\', \'' . $solicitudNV[5] . '\', \'' . $solicitudNV[6] . '\', \'' . $solicitudNV[7] . '\', \'' . $solicitudNV[8] . '\', \'' . $solicitudNV[9] . '\');">Ver mas...</a>
                                        <div class="modal topmargin-sm" id="myModalSoliComNo2">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:darkslategrey;">Datos de la solicitud</h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p id="pSoliNo"></p>
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
<script type="text/javascript" src="js/editarMallaCurricular.js?1.0.0"></script>
<script type="text/javascript" src="js/editarInvestigacion.js?1.0.0"></script>
<script type="text/javascript" src="js/verMas.js"></script>
<!--Bootstrap JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>