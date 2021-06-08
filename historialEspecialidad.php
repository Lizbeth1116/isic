<?php
include('head.php');
$HistorialInfo = getHistorialInfo();
?>
<div class="historial">
    <section class="site-section">
        <div class="container">
            <div class="section-heading text-center">
                <h2><strong>HISTORIAL DE ESPECIALIDADES</strong></h2>
            </div>
            <?php
            for ($i = 0; $i < sizeof($HistorialInfo); $i++) {
                if ($HistorialInfo[$i][4] == 1) {
                    echo '
                    <div class="row">
                        <div class="col-md-12">
                            <div class="resume-item mb-4">
                                <h3><strong>' . $HistorialInfo[$i][1] . '</strong></h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="img/especialidades/historial/' . $HistorialInfo[$i][3] . '">
                                    </div>
                                    <div class="col-md-4">
                                        <h4><strong>Objetivo</strong></h4>
                                        <p>
                                            ' . $HistorialInfo[$i][2] . '
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <h4><strong>Contenido</strong></h4>
                                        <ul>';
                                        $ContenidoHistorial = getContenidoHistorial($HistorialInfo[$i][0]);
                                        for ($j = 0; $j < sizeof($ContenidoHistorial); $j++) {
                                            if ($ContenidoHistorial[$j][1] == 1){
                                                echo '<li>' . $ContenidoHistorial[$j][0] . '</li>';
                                            }
                                        }
                                        echo '
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
                }
            }
            ?>
    </section>
</div>
<?php include('footer.php'); ?>