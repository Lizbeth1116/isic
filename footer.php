<section id="footer" class="bg-dark">
    <div class="container">
        <img src="img/logos/isic-itsoeh-logo-blanco.png?1.0.0" alt="logo" class="logo-itsoeh">

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
                <a href="Login.php" data-toggle="modal" data-target="#myModal1"><i class="bi bi-arrow-bar-right"></i> Atención: M.C. Rolando Porras Muñoz</a>
            </li>
        </ul>
        <small>© 2021 Ingeniería en Sistemas Computacionales | ITSOEH</small>
        <div class="modal fade topmargin-xs" id="myModal1">
            <div class="modal-dialog">
                <div class="login modal-content">
                    <!-- Modal Header -->
                    <button type="button" class="close ml-auto p-3" data-dismiss="modal" style="outline:none;">&times;</button>
                    <div class="col-12 user-img">
                        <img src="img/logos/logo-isc.png" />
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form class="col-12" action="AdminInicio.php?1.0.0" method="POST" name="logi">
                            <div class="p-3">
                                <div class="form-group" id="user-group">
                                    <input class="form-control" id="admin" type="text" placeholder="Administador" name="admin" />
                                </div>
                                <div class="form-group" id="contrasena-group">
                                    <input class="form-control" id="pass" type="password" placeholder="Password" name="pass" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-info">Iniciar sesión</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Fin footer-->
<h1 id="tam" style="font-size:0px;"><?php echo '' . $aux2 . '' ?></h1>
<script type="text/javascript" src="js/mallaCurricular.js?1.0.0"></script>
<script type="text/javascript" src="js/index.js?1.0.0"></script>
<script type="text/javascript" src="js/main.js?1.0.0"></script>
<script type="text/javascript" src="js/typeit.js"></script>
<!--Bootstrap JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>