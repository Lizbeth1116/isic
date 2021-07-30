<?php
include('./headAdmin.php');
$asesoria = getAsesorias();
$doce = getDocente();
$pagina11 = 'active';
include('AdminSidebar.php');
?>
<div class="admon">
    <div class="container">
        <h2>Tutores</h2>
        <br>


        <form action="../../form-result.php" method="post" target="_blank">

    <table class="table table-light table-hover">
                <tr>
                    <th>Tutor</th>
                    <th>Correo</th> </tr>
<?php
                                        for ($j = 0; $j < sizeof($doce); $j++) {
                                           echo '<tr><td > <label><input type="checkbox" name="tutores"> ' . $doce[$j][1] . '</td></label>
                                           
                                           <td >' . $doce[$j][2] . '</td></tr>';
                                        }
                                        ?>
   

  </p>

  <p><input type="submit" value="Enviar datos"></p>
 </table>
</form>
      
                                        
                                 
                        
                       
                  
       
    </div>
</div>
<?php include('AdminFooter.php')?>
<!--JS Local-->
<script type="text/javascript" src="js/editarAsesorias.js?1.0.0"></script>
</body>

</html>