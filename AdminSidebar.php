<div class="wrapper">
        <nav id="sidebar" class="active">
            <ul class="tabs list-unstyled components">
                <?php echo '
                <li><a href="AdminInicio.php?1.0.0" class="'.$pagina0.'"><i class="bi bi-house"></i>Inicio</a></li>
                <li><a href="AdminEspecialidad.php?1.0.0" class="'.$pagina1.'"><i class="bi bi-journal-text"></i>Especialidad</a></li>
                <li><a href="AdminMalla.php?1.0.0" class="'.$pagina2.'"><i class="bi bi-receipt-cutoff"></i>Malla Curricular</a></li>
                <li><a href="AdminInvestigacion.php?1.0.0" class="'.$pagina3.'"><i class="bi bi-people"></i>Investigacion</a></li>
                <li><a href="AdminGalerias.php?1.0.0" class="'.$pagina4.'"><i class="bi bi-images"></i>Galerías</a></li>
                <li><a href="AdminTutorias.php?1.0.0" class="'.$pagina11.'"><i class="bi bi-file-earmark-person"></i>Docentes</a></li>
                <li><a href="AdminAsesorias.php?1.0.0" class="'.$pagina5.'"><i class="bi bi-person-check-fill"></i>Asesorias</a></li>
                <li><a href="AdminComplementarias.php?1.0.0" class="'.$pagina6.'"><i class="bi bi-puzzle"></i>Complementarias</a></li>
                <li><a href="AdminHistorialEsp.php?1.0.0" class="'.$pagina7.'"><i class="bi bi-clock-history"></i>Hitorial Especialidad</a></li>
                <li><a href="AdminSolicitudes.php?1.0.0" class="'.$pagina8.'"><i class="bi bi-envelope"></i>
                ';
                        $pendientes = getSolicitud();
                        $contar = (int) 0;
                        if ($pendientes[0][0] != 'x') {
                            foreach ($pendientes as $solicitudNV) {
                                if ($solicitudNV[10] == 2) {
                                    $contar++;
                                }
                            }
                        }
                        if ($contar == 0) {
                            echo 'Solicitudes</a></li>';
                        } else {
                            echo 'Solicitudes <b class="notificacion" style="font-size: 12px;">' . $contar . '</b></a></li>';
                        }
                echo '<li><a href="AdminGenerales.php?1.0.0" class="'.$pagina9.'"><i class="bi bi-card-heading"></i>Acreditación</a></li>';
                echo '<li><a href="AdminContraseña.php?1.0.0" class="'.$pagina10.'"><i class="bi bi-shield-lock"></i>Seguridad</a></li>';
                ?>
            </ul>
        </nav>
    </div>