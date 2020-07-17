<!DOCTYPE html>
<?php include "app/appconexion.php"; ?>
<?php include "app/applogin.php"; ?>
<?php sessionExiste(); ?>
<html lang="es">
  <head>
    <title>Iniciar Sesión | COVID-19 Info</title>
    <!--Inicia Librerias-->
    <?php include 'libs.inc'; ?>
    <!--Termina Librerias-->
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="logo container">
            <br>
            <img src="../assets/img/logo.png" style="width:65px;"></img>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="container">
        <div class="row">
          <div class="container">
            <div class="signup-form-container">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" class="justify-content-center" autocomplete="off">
                <center>
                  <?php  foreach ($errores as $key => $error) { echo $error; } ?>
                </center>
                <div class="form-header">
                  <center><h2 class="form-title">Iniciar <span class="blue"><strong>Sesión</strong></span></h2></center>
                </div>
                <hr>
                <div class="form-body">
                  <div class="form-group">
                    <div class="input-group">
                      <label for="usuario_login" id="usuario_login">Usuario:</label>
                    </div>
                    <div class="input-group">
                      <input type="text" id="usuario_login" name="usuario_login" class="form-control" style="height:50px" size="145" placeholder="Teclea tu usuario" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <label for="password_login">Password:</label>
                    </div>
                    <div class="input-group">
                      <input type="password" id="password_login" name="password_login" class="form-control" style="height:50px" size="145" placeholder="Teclea tu contraseña" required>
                    </div>
                  </div>
                </div>
                <div class="form-footer" style="text-align:center;">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-4">
                        <center>
                          <input type="hidden" name="login" value="iniciar">
      										<button class="btn btn-lg btn-block" style="background-color: #631817; color: white;" type="submit">Login</button>
                        </center>
                      </div>
                      <div class="col-md-4"></div>
                    </div>
                  </div>
                </div>
              </form>
              <br>
              <div class="col-md-12">
                <hr>
                <center>
                  <a href="..">
                    <img src="img/flecha.svg" alt="Regresar" width="65">
                  </a>
                </center>
              </div>
              <div class="col-md-12">
                <hr>
                <!--center><a href="#">¿Se te olvid&oacute; tu contraseña?</a><center-->
              </div>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascript -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
