<?php
include('./headAdmin.php');
$pagina4 = 'active';
include('AdminSidebar.php');
$peri = getPeriodo();
$CarruselExpo = getCarruselExpo();
$postfb = getPostfb();
?>
<!DOCTYPE HTML>
<div class="admon">
    <div class="container">
        <h2>Galerias</h2>
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'tab1')" id="defaultOpen"><i class="bi bi-award"></i>Reconocimientos</button>
            <button class="tablinks" onclick="openCity(event, 'tab2')"><i class="bi bi-images"></i>Carrusel Inicio</button>
            <button class="tablinks" onclick="openCity(event, 'tab3')"><i class="bi bi-card-image"></i>Carrusel Expo</button>
            <button class="tablinks" onclick="openCity(event, 'tab4')"><i class="bi bi-calendar-week"></i>Expo ISIC</button>
        </div>
        <div id="tab1" class="tabcontent">
            <div id="titulo">
                <h6><b>Post a mostrar en el inicio</b></h6>
            </div>
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th>Subtitulo</th>
                        <th><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal1AddPost"><i class="bi bi-plus-circle"></i>Agregar nuevo post</button>
                            <div class="modal topmargin-sm" id="myModal1AddPost">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header-->
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="color:darkslategrey;">Agregar</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form class="needs-validation" novalidate action="Controlador/ControlAgregar.php" method="POST">
                                                <div class="form-group" style="display:none">
                                                    <input type="text" class="form-control" id="opExp" name="opExp" value="4">
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nombre" style="color:black;">Subtitulo:</label>
                                                    <input type="text" class="form-control" id="subPostAdd" placeholder="Ingrese un subtitulo a mostrar" name="subPostAdd" required>
                                                    <div class="valid-feedback">Valido.</div>
                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="objetivo" style="color:black;">Post:</label>
                                                    <textarea class="form-control" rows="5" id="postLinkAdd" placeholder="Ingrese el codigo del post a mostrar" name="postLinkAdd" required></textarea>
                                                    <div class="valid-feedback">Valido.</div>
                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        for ($i = 0; $i < sizeof($postfb); $i++) {
                            echo '<tr>
                            <td>' . $postfb[$i][3] . '</td>
                            <td> 
                            <div class="btn-group">
                            <button class="btn btn-light btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-toggle="modal" data-target="#myModalEditPost" onclick="datosModalPost(\'' . $postfb[$i][0] . '\', \'' . $postfb[$i][3] . '\');"><i class="bi bi-pencil-square"></i>Editar</a>';
                            if ($postfb[$i][2] === 1) {
                                echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=15*' . $postfb[$i][0] . '*2*1"><i class = "bi bi-eye-slash"></i>Ocultar</a>';
                            } else {
                                echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=15*' . $postfb[$i][0] . '*1*1"><i class = "bi bi-eye"></i>Activar</a>';
                            }
                            echo '<a class="dropdown-item" href = "Controlador/ControlBorrar.php?id=15*' . $postfb[$i][0] . '*0*2"><i class = "bi bi-trash-fill"></i>Eliminar</a>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="modal topmargin-sm" id="myModalEditPost">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header-->
                                                <div class="modal-header">
                                                    <h5 class="modal-title" style="color:darkslategrey;">Editar</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form class="needs-validation" novalidate action="Controlador/ControlEditar.php" method="POST">
                                                        <div class="form-group" style="display:none">
                                                            <input type="text" class="form-control" id="idPost" name="idPost">
                                                        </div>
                                                        <div class="form-group" style="display:none">
                                                            <input type="text" class="form-control" id="opExp" name="opExp" value="4">
                                                        </div>
                                                        <div class="form-group" style="display:none">
                                                            <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nombre" style="color:black;">Subtitulo:</label>
                                                            <input type="text" class="form-control" id="subPost" placeholder="Ingrese un subtitulo a mostrar" name="subPost" required>
                                                            <div class="valid-feedback">Valido.</div>
                                                            <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                </tr>';
                        }
                        ?>
                </tbody>
            </table>
            <div class="" style="color: gray; background: lightgoldenrodyellow; padding: 15px; border-radius:5px; border: 1px solid darkkhaki;">
                <i class="bi bi-exclamation-diamond-fill"></i><b>Importante</b> Cambie el valor del ancho o 'width' del enlace de facebook a 100%. Ejemplo: <b>width="100%"</b>
            </div>
        </div>
        <div id="tab2" class="tabcontent">
            <div id="titulo">
                <h6><b>Imagenes a mostrar en el carrusel de la página de inicio</b></h6>
            </div>
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal1AddCarrIni"><i class="bi bi-plus-circle"></i></button>
                            <div class="modal topmargin-sm" id="myModal1AddCarrIni">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header-->
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="color:darkslategrey;">Agregar</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form class="needs-validation" novalidate action="Controlador/ControlAgregar.php" enctype="multipart/form-data" method="POST">
                                                <div class="form-group" style="display:none">
                                                    <input type="text" class="form-control" id="opExp" name="opExp" value="3">
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <input type="text" class="form-control" id="pertCarIni" name="pertCarIni" value="1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="imagenAdd" style="color:black;">Imagen:</label>
                                                    <input type="file" class="form-control" id="imgCarIniAdd" name="imgCarIniAdd" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        for ($i = 0; $i < sizeof($CarruselExpo); $i++) {
                            if ($CarruselExpo[$i][4] == 1) {
                                echo '<tr>
                                <td><img src="img/conocenos/carousel/' . $CarruselExpo[$i][1] . '" width=160px></img></td>
                                <td> 
                                <div class="btn-group">
                                <button class="btn btn-light btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#myModalEditCarIni" onclick="datosModalCarrIni(\'' . $CarruselExpo[$i][0] . '\', \'' . $CarruselExpo[$i][1] . '\');"><i class="bi bi-pencil-square"></i>Editar</a>';
                                if ($CarruselExpo[$i][3] === 1) {
                                    echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=14*' . $CarruselExpo[$i][0] . '*2*1"><i class = "bi bi-eye-slash"></i>Ocultar</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=14*' . $CarruselExpo[$i][0] . '*1*1"><i class = "bi bi-eye"></i>Activar</a>';
                                }
                                echo '<a class="dropdown-item" href = "Controlador/ControlBorrar.php?id=14*' . $CarruselExpo[$i][0] . '*0*2*' . $CarruselExpo[$i][1] . '"><i class = "bi bi-trash-fill"></i>Eliminar</a>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="modal topmargin-sm" id="myModalEditCarIni">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header-->
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:darkslategrey;">Editar</h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form class="needs-validation" novalidate action="Controlador/ControlEditar.php" enctype="multipart/form-data" method="POST">
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="idCarrouIni" name="idCarrouIni">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opExp" name="opExp" value="3">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="imagenAdd" style="color:black;">Imagen:</label>
                                                                <input type="file" class="form-control" id="imgCarIni" name="imgCarIni">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="nomOriImgCarrIni"  name="nomOriImgCarrIni">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>';
                            }
                        }
                        ?>
                </tbody>
            </table>
            <div class="" style="color: gray; background: lightgoldenrodyellow; padding: 15px; border-radius:5px; border: 1px solid darkkhaki;">
                <i class="bi bi-exclamation-diamond-fill"></i><b>Nota</b> La medida recomendada para las imagenes de carrusel de eventos es 1100 x 500 pixeles.
            </div>
        </div>
        <div id="tab3" class="tabcontent">
            <div id="titulo">
                <h6><b>Imagenes a mostrar en el carrusel de la página de eventos</b><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal1AddcCarr"><i class="bi bi-plus-circle"></i>Agregar</button></h6>
            </div>
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Texto</th>
                        <th>
                            <div class="modal topmargin-sm" id="myModal1AddcCarr">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header-->
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="color:darkslategrey;">Agregar</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form class="needs-validation" novalidate action="Controlador/ControlAgregar.php" enctype="multipart/form-data" method="POST">
                                                <div class="form-group" style="display:none">
                                                    <input type="text" class="form-control" id="opExp" name="opExp" value="2">
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <input type="text" class="form-control" id="pertCarExp" name="pertCarExp" value="2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nombre" style="color:black;">Texto Inferior:</label>
                                                    <input type="text" class="form-control" id="txtCarAdd" placeholder="Ingresa un breve texto a mostrar" name="txtCarAdd">
                                                    <div class="valid-feedback">Valido.</div>
                                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="imagenAdd" style="color:black;">Imagen:</label>
                                                    <input type="file" class="form-control" id="imgCarAdd" name="imgCarAdd" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        for ($i = 0; $i < sizeof($CarruselExpo); $i++) {
                            if ($CarruselExpo[$i][4] == 2) {
                                echo '<tr>
                                <td><img src="img/carousel-eventos/' . $CarruselExpo[$i][1] . '" width=160px></img></td>
                                <td>' . $CarruselExpo[$i][2] . '</td>
                                <td> 
                                <div class="btn-group">
                                <button class="btn btn-light btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#myModalEditCar" onclick="datosModalCarr(\'' . $CarruselExpo[$i][0] . '\', \'' . $CarruselExpo[$i][1] . '\', \'' . $CarruselExpo[$i][2] . '\');"><i class="bi bi-pencil-square"></i>Editar</a>';
                                if ($CarruselExpo[$i][3] === 1) {
                                    echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=12*' . $CarruselExpo[$i][0] . '*2*1"><i class = "bi bi-eye-slash"></i>Ocultar</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=12*' . $CarruselExpo[$i][0] . '*1*1"><i class = "bi bi-eye"></i>Activar</a>';
                                }
                                echo '<a class="dropdown-item" href = "Controlador/ControlBorrar.php?id=12*' . $CarruselExpo[$i][0] . '*0*2*' . $CarruselExpo[$i][1] . '"><i class = "bi bi-trash-fill"></i>Eliminar</a>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="modal topmargin-sm" id="myModalEditCar">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header-->
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:darkslategrey;">Editar</h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form class="needs-validation" novalidate action="Controlador/ControlEditar.php" enctype="multipart/form-data" method="POST">
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="idCarrou" name="idCarrou">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opExp" name="opExp" value="2">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nombre" style="color:black;">Nombre:</label>
                                                                <input type="text" class="form-control" id="txtCar" placeholder="Ingresa un breve texto a mostrar" name="txtCar" required>
                                                                <div class="valid-feedback">Valido.</div>
                                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="imagenAdd" style="color:black;">Imagen:</label>
                                                                <input type="file" class="form-control" id="imgCar" name="imgCar">
                                                            </div>
                                                            <div class="form-group" style="display:none">
                                                                <input type="text" class="form-control" id="nomOriImgCarr"  name="nomOriImgCarr">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>';
                            }
                        }
                        ?>
                </tbody>
            </table>
            <div class="" style="color: gray; background: lightgoldenrodyellow; padding: 15px; border-radius:5px; border: 1px solid darkkhaki;">
                <i class="bi bi-exclamation-diamond-fill"></i><b>Nota</b> La medida recomendada para las imagenes de carrusel de eventos es 2732 x 900 pixeles.
            </div>
        </div>
        <div id="tab4" class="tabcontent">
            <!--Tabla de especialidad: Sección 1-->
            <div id="titulo">
                <h6><b>Expo Sistemas Proyectatec </b> <button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModalAddPeri"><i class="bi bi-calendar-plus"></i> Agregar nueva galería</button></h6>
            </div>
            <div class="modal topmargin-sm" id="myModalAddPeri">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header-->
                        <div class="modal-header">
                            <h5 class="modal-title" style="color:darkslategrey;">Agregar Periodo</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="Controlador/ControlAgregar.php" method="POST">

                                <div class="form-group" style="display:none">
                                    <input type="text" class="form-control" id="opExp" name="opExp" value="0">
                                </div>
                                <div class="form-group" style="display:none">
                                    <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                </div>
                                <div class="form-group">
                                    <label for="desc" style="color:black;">Año:</label>
                                    <input type="text" class="form-control" id="addAnioExp" placeholder="Ingrese el año" name="addAnioExp" required>
                                    <div class="valid-feedback">Valido.</div>
                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                </div>
                                <div class="form-group">
                                    <label for="addperiodoExpo" style="color:black;">Periodo:</label>
                                    <select id="addperiodoExpo" name="addperiodoExpo" class="custom-select mb-3 form-control" required>
                                        <option selected>-Selecciona-</option>
                                        <option value="1">Enero - Mayo</option>
                                        <option value="2">Agosto - Diciembre</option>
                                    </select>
                                    <div class="valid-feedback">Valido.</div>
                                    <div class="invalid-feedback">Por favor verifique los campos.</div>
                                </div>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            for ($i = 0; $i < sizeof($peri); $i++) {
                echo '<div id="titulo">';
                if ($peri[$i][1] === 1) {
                    echo '<h6><b style="padding-right: 10px;">Enero - Mayo ' . $peri[$i][2] . '</b>';
                } else if ($peri[$i][1] === 2) {
                    echo '<h6><b style="padding-right: 10px;">Agosto - Diciembre ' . $peri[$i][2] . '</b>';
                }
                echo '<div class="btn-group-sm">
                    <a type="button" class="btn btn-light" data-toggle="modal" data-target="#myModalAddImg" onclick="datosModalExp2(\'' . $peri[$i][0] . '\', \'' . $peri[$i][4] . '\');"><i class="bi bi-card-image"></i></a>
                    <a type="button" class="btn btn-light" data-toggle="modal" data-target="#myModalEdExp" onclick="datosModalExp(\'' . $peri[$i][0] . '\', \'' . $peri[$i][1] . '\', \'' . $peri[$i][2] . '\');"><i class="bi bi-pencil-square"></i></a>
                        <div class="modal topmargin-sm" id="myModalEdExp">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header-->
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="color:darkslategrey;">Editar Periodo</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="Controlador/ControlEditar.php" method="POST">
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="idPeriExp" name="idPeriExp">
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="opExp" name="opExp" value="0">
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="AnioExpOri" name="AnioExpOri">
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="periodoExpoOri" name="periodoExpoOri">
                                            </div>
                                            <div class="form-group">
                                                <label for="desc" style="color:black;">Año:</label>
                                                <input type="text" class="form-control" id="AnioExp" placeholder="Ingrese el año" name="AnioExp" required>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="perExpo" style="color:black;">Periodo:</label>
                                                <select id="periodoExpo" name="periodoExpo" class="custom-select mb-3 form-control" required>
                                                    <option selected>-Selecciona-</option>
                                                    <option value="1">Enero - Mayo</option>
                                                    <option value="2">Agosto - Diciembre</option>                                                     
                                                </select>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal topmargin-sm" id="myModalAddImg">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header-->
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="color:darkslategrey;">Editar Periodo</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="Controlador/ControlAgregar.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="addIdPeriImag" name="addIdPeriImag" value="1">
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="addCarpetaImag" name="addCarpetaImag">
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="opExp" name="opExp" value="1">
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                            </div>
                                            <div class="form-group">
                                                <label for="desc" style="color:black;">Descripcion:</label>
                                                <input type="text" class="form-control" id="addDescripcionExp" placeholder="Ingresa una descripcion a la imagen" name="addDescripcionExp" required>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="imag" style="color:black;">Imagen:</label>
                                                <input type="file" class="form-control" id="addImgExp" name="addImgExp" required>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>';
                if ($peri[$i][3] === 1) {
                    echo '<a type="button" class="btn btn-light mr-2" href="Controlador/ControlBorrar.php?id=7*' . $peri[$i][0] . '*2*1"><i class = "bi bi-eye"></i></a>';
                } else {
                    echo '<a type="button" class="btn btn-light" href="Controlador/ControlBorrar.php?id=7*' . $peri[$i][0] . '*1*1"><i class = "bi bi-eye-slash"></i></a>';
                }
                echo '<a type = "button" class = "btn btn-light" href = "Controlador/ControlBorrar.php?id=7*' . $peri[$i][0] . '*0*2*' . $peri[$i][4] . '"><i class = "bi bi-trash-fill"></i></a>
                            </div></h6>
                    </div>
                    <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>';
                $imgExpo = getImagenesExpo($peri[$i][0]);
                for ($j = 0; $j < sizeof($imgExpo); $j++) {
                    echo '<tr> <td><img src="img/expoISC/' . $peri[$i][4] . '/' . $imgExpo[$j][3] . '" width=120px></img></td>';
                    echo '<td>' . $imgExpo[$j][1] . '</td><td>';
                    if ($imgExpo[0][0] > 0) {
                        echo ' <div class="btn-group">
                        <button class="btn btn-light btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                        </button>
                         <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModal" onclick="datosModalExp1(\'' . $imgExpo[$j][0] . '\', \'' . $imgExpo[$j][1] . '\', \'' . $imgExpo[$j][3] . '\', \'' . $peri[$i][4] . '\');"><i class="bi bi-pencil-square"></i> Editar</a>';
                        if ($imgExpo[$j][2] === 1) {
                            echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=6*' . $imgExpo[$j][0] . '*2*1"><i class = "bi bi-eye-slash"></i>Ocultar</a>';
                        } else {
                            echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=6*' . $imgExpo[$j][0] . '*1*1"><i class = "bi bi-eye"></i>Activar</a>';
                        }
                        echo '<a class="dropdown-item" href="Controlador/ControlBorrar.php?id=6*' . $imgExpo[$j][0] . '*0*2*' . $imgExpo[$j][3] . '*' . $peri[$i][4] . '"><i class = "bi bi-trash-fill"></i> Eliminar</a>
                        </div>
                        </div>
                        </div>
                        <div class="modal topmargin-sm" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header-->
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="color:darkslategrey;">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="Controlador/ControlEditar.php" enctype="multipart/form-data" method="POST">
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="idImgExp" name="idImgExp">
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="opExp" name="opExp" value="1">
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="opGlobal" name="opGlobal" value="4">
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="CarpetaImag" name="CarpetaImag">
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <input type="text" class="form-control" id="nomImagOri" name="nomImagOri">
                                            </div>
                                            <div class="form-group">
                                                <label for="desc" style="color:black;">Descripcion:</label>
                                                <input type="text" class="form-control" id="descripcionExp" placeholder="Ingresa una descripcion a la imagen" name="descripcionExp" required>
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor verifique los campos.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="imag" style="color:black;">Imagen:</label>
                                                <input type="file" class="form-control" id="ImgExp" name="ImgExp">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    </tr>';
                    }
                }
                echo '</tbody>
              </table>';
            }
            ?>
        </div>
        <script type="text/javascript" src="js/tabs.js"></script>
    </div>
</div>
<?php include('AdminFooter.php')?>
<!--JS Local-->
<script type="text/javascript" src="js/editarExpo.js"></script>
<script type="text/javascript" src="js/editarGalerias.js?1.0.0"></script>
</body>

</html>