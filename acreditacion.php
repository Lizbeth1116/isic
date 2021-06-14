<?php include('head.php'); 
$inforelevante = getInforelevante();?>
<div class="acreditacion">
    <section class="site-section">
        <div class="container texto">
            <div class="section-heading text-center">
                <h2><strong>ACREDITACIÓN</strong></h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="resume-item mb-4">
                        <div class="row">
                            <div class="col-md-6 logo-cacei">
                                <img src="img/logos/cacei-sf.png?1.0.0">
                                <h3><strong>Programa acreditado por CACEI</strong></h3>
                                <p>
                                    El Programa Educativo de Ingeniería en Sistemas Computacionales está acreditado por el Consejo de Acreditación de la Enseñanza de la Ingeniería A.C. (CACEI).
                                </p>
                            </div>
                            <div class="col-md-6 img-certificado">
                                <img src="img/certificado-cacei.png?1.0.0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="resume-item mb-4">
                        <h3><strong>Información Relevante</strong></h3>
                        <?php
                        echo '
                        <table>
                            <tr>
                                <td><strong>Ingeniería en Sistemas Computacionales: </strong></td>
                                <td>Acreditado en ' . $inforelevante[0][1] . ' por ' . $inforelevante[0][2] . ' años</td>
                            </tr>
                            <tr>
                                <td><strong>Matricula registrada ' . $inforelevante[0][1] . ': </strong></td>
                                <td>' . $inforelevante[0][3] . '</td>
                            </tr>
                            <tr>
                                <td><strong>Especialidades: </strong></td>
                                <td>' . $inforelevante[0][4] . ' registradas</td>
                            </tr>
                            <tr>
                                <td><strong>Laboratorios: </strong></td>
                                <td>' . $inforelevante[0][5] . ' equipados</td>
                            </tr>
                            <tr>
                                <td><strong>Desarrollo Tecnológico: </strong></td>
                                <td>' . $inforelevante[0][6] . '</td>
                            </tr>
                        </table>
                        ';
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="resume-item mb-4">
                        <h3><strong>Beneficios</strong></h3>
                        <ul>
                            <li>Formacion académica que cumple con estándares de
                                calidad internacionales.
                            </li>
                            <li>Planes de estudio actualizados, fortaleciendo el desarrollo
                                intelectual y profesional.
                            </li>
                            <li>
                                Valor agregado para la inserción de egresados al mercado
                                laboral (nacional e internacional) o el acceso a estudios de
                                posgrado.
                            </li>
                            <li>
                                Reconocimiento de títulos en el extranjero.
                            </li>
                            <li>
                                Compromiso con la mejora continua.
                            </li>
                        </ul>
                    </div>
                </div>
                <!---->
                <div class="col-md-12">
                    <div class="resume-item mb-4">
                        <h3><strong>Acerca de CACEI</strong></h3>
                        <p>
                            El Consejo de Acreditación de la Enseñanza de la Ingeniería, A.C., (CACEI), es una institución cuyo fin es la acreditación de programas de estudio. Es el reconocimiento público que una organización acreditadora otorga, en el sentido de que éste cumple con determinados criterios y parámetros de calidad. Significa también que el programa tiene pertinencia social. Los parametros de acreditación son que el programa de estudio:
                        </p>
                        <p>
                            <i class="bi bi-check2"></i> Ha sido estudiado y evaluado por expertos en la materia quienes determinan que es de buena calidad.<br>
                            <i class="bi bi-check2"></i> Tiene pertinencia social tiene el fin mayor de proyectar a sus alumnos como factores de cambio social en el desarrollo de su país ante el constante cambio mundial.<br>
                            <i class="bi bi-check2"></i> Cumple con determinados criterios, indicadores y parámetros de calidad en su estructura, organización, funcionamiento, insumos, procesos de enseñanza, servicios y en sus resultados. donde la División de Ingeniería en Sistemas Computacionales y el ITSOEH han cumplido cavalmente<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('footer.php'); ?>