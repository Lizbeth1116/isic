<?php
include('head.php');
$Docente = getDocente();
?>
<div class="organigrama topmargin-sm">
    <div class="container">
        <div class="level-1 rectangle">
            <div class="row">
                <div class="col">
                    <h3><strong>Rolando Porras Muñoz</strong></h3>
                    <p style="color:#fff !important;">Jefe de carrera</p>
                    <p style="color:#fff !important;"><i class="bi bi-envelope"></i> rporras@itsoeh.edu.mx</p>
                </div>
            </div>
        </div>
        <ol class="level-2-wrapper">
            <li>
                <div class="level-2 rectangle">
                    <div class="row">
                        <div class="col">
                            <h5><strong>Mario Pérez Bautista</strong></h5>
                            <p style="color:#fff !important;">Presidente de academia</p>
                            <p style="color:#fff !important;"><i class="bi bi-envelope"></i> mperez@itsoeh.edu.mx</p>
                        </div>
                    </div>
                </div>
                <ol class="level-3-wrapper">
                    <li>
                        <h6 class="level-3 rectangle" ><a data-toggle="modal" data-target=".bd-example-modal-lg-2">Profesores de tiempo completo</a></h6>
                        <div class="modal fade bd-example-modal-lg-2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="container mb-4">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><strong>Profesores de tiempo completo</strong></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-light">
                                                <thead>
                                                    <tr>
                                                        <th>Profesor(a)</th>
                                                        <th>Correo</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                for ($i = 0; $i < sizeof($Docente); $i++) {
                                                    if ($Docente[$i][4] === 2) {
                                                        echo '
                                                        <tr>
                                                            <td>' . $Docente[$i][1] . '</td>
                                                            <td>' . $Docente[$i][2] . '</td>
                                                        </tr>';
                                                    }
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <h6 class="level-3 rectangle"><a data-toggle="modal" data-target=".bd-example-modal-lg">Profesores</a></h6>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="container mb-4">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><strong>Profesores</strong></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-light">
                                                <thead>
                                                    <tr>
                                                        <th>Profesor(a)</th>
                                                        <th>Correo</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                for ($i = 0; $i < sizeof($Docente); $i++) {
                                                    if ($Docente[$i][4] === 1) {
                                                        echo '
                                                        <tr>
                                                            <td>' . $Docente[$i][1] . '</td>
                                                            <td>' . $Docente[$i][2] . '</td>
                                                        </tr>';
                                                    }
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ol>
            </li>
            <li>
                <div class="level-2 rectangle">
                    <div class="row">
                        <!--<div class="col-sm-4"><img src="img/organigrama/xo.png" class="nivel-2"></div>-->
                        <div class="col">
                            <h5><strong>Xochitl Torres Reyes</strong></h5>
                            <p style="color:#fff !important;">Asistente</p>
                            <p style="color:#fff !important;"><i class="bi bi-envelope"></i> xtorres@itsoeh.edu.mx</p>
                        </div>
                    </div>


                </div>
            </li>
        </ol>
    </div>
</div>

<?php
include('investigacion.php');
include('footer.php');
?>