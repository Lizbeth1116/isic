<div class="investigacion">
    <div class="container">
        <h1 class="text-center text">LINEAS DE <strong>INVESTIGACIÓN</strong></h1>
        <div class="cont-invest">
        <?php
        $aux = "";
        for ($i = 0; $i < sizeof($inv); $i++) {
            if ($inv[$i][7] != 2) {
                if ($aux != $inv[$i][1]) :
                    echo '</table>';

                    $aux = $inv[$i][1];
                    echo '<div id="titulo" class="topmargin-xs">
                                        <h6><b>' . $inv[$i][1] . '</b></h6>
                                    </div>
                                    <table class="table table-light">
                                        <thead>
                                            <tr>
                                                <th>Grado Académico</th>
                                                <th>Profesor</th>
                                                <th>Cargo</th>
                                            </tr>
                                        </thead>';
                    echo '<tr>
                                        <td>' . $inv[$i][2] . '</td> 
                                        <td>' . $inv[$i][4] . '</td>';
                    echo '<td><span class="badge badge-pill badge-primary"> Lider </span></td>';
                else :
                    if ($inv[$i][6] == 1) :
                        echo '<tr>
                                        <td>' . $inv[$i][2] . '</td> 
                                        <td>' . $inv[$i][4] . '</td>';
                        if ($inv[$i][5] == 1) :
                            echo '<td id="lider">
                                            Lider
                                        </td>';
                        else :
                            echo '
                                        <td>
                                            Colaborador
                                        </td> 
                                    </tr>';
                        endif;
                    endif;
                endif;
            }
        }
        ?>
        </table>
        </div>
    </div>
</div>