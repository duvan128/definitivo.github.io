
<!DOCTYPE html>
<?php include "../app/appconexion.php"; ?>
<?php include "../app/applogin.php"; ?>
<?php validarSesion(); ?>
<?php if(isset($_GET['op']) && $_GET['op'] == 'salir'): ?>
  <?php cerrarSesion(); ?>
<?php endif; ?>
<html lang="es">

    <head>
      <title>Menú Principal | COVID-19 Info</title>
      <?php include 'libs.inc'; ?>
    </head>

    <body>
    <?php include 'header.inc'; ?>
    <div class="container">
	     <div class="logo">
	        <br>
          <center><h2>Panel de <span class="blue"><strong>Administración</strong></span></h2></center>
          </div>
          <hr>
          <?php if ($_SESSION['datos_usuario'][6]==0) {
            echo '<center><h2>Disculpa las molestias <span class="blue"><strong>'.$_SESSION["datos_usuario"][1].'</strong></span> pero estas dado de baja, porfavor comunicate con el <span class="blue"><strong>Administrador</strong></span>.</h2></center><hr>';
          }else {
            echo '<div class="row">

            <div class="col-sm-4">
             <center><a href="usuarios.php"><img src="../img/usuario.svg" alt="Usuarios" width="100px" /></a></center>
                      <center>Usuarios</center>
           </div>
              <div class="col-sm-4">
        	    	<center><a href="avisosynoticias.php"><img src="../img/exito.svg" alt="Avisos y Noticias" width="100px" /></a></center>
                        <center>Avisos y Noticias</center>
        	    </div>

        	  </div>
        	  <hr>';
            if ($_SESSION['datos_usuario'][6]==1) {
             echo '<div class="row">

         	  </div>';
           }
          } ?>

    <div class="row">
      <div class="col-sm-12">
        <center><a href="../.."><img src="../img/flecha.svg" alt="Mis datos" width="50px" /></a></center>
      </div>
    </div>
	</div>
  <br>
</body>
</html>
