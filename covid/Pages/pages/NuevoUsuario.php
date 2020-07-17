<?php include "../app/appconexion.php"; ?>
<?php include "../app/applogin.php"; ?>
<?php validarSesion(); ?>
<?php if(isset($_GET['op']) && $_GET['op'] == 'salir'): ?>
  <?php cerrarSesion(); ?>
<?php endif; ?>
<?php include '../app/appUsuario.php'; ?>
<!DOCTYPE html>
<html lang="es">

    <head>
      <title>Nuevo Usuario | FUNDAMAC</title>
      <?php include 'libs.inc'; ?>
    </head>

    <body>
      <?php include 'header.inc'; ?>
      <div class="container">
        <div class="row">
          <hr />
          <div class="col-sm-6" style="text-align:center;">
            <a href="usuarios.php">
              <img src="../img/flecha.svg" style="cursor:pointer; " width="50px">
            </a>
          </div>
          <div class="col-sm-6" style="text-align:center">
            <ol class="breadcrumb">
              <li class="active">
                <a href="#" class="blue"><b>*Nuevo Usuario*</b>: Aqui puedes Agregar un Nuevo Usuario.</a>
              </li>
            </ol>
          </div>
          <hr/>
        </div>
        <div class="container">
          <div class="row">
            <div class="container">
            <div class="signup-form-container">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" class="justify-content-center" autocomplete="off">
                <?php  foreach ($errores as $key => $error) { ?>
                  <center><?php echo $error; ?></center>
                <?php } ?>
                <div class="form-header">
                  <center><h2 class="form-title">Nuevo <span class="blue"><strong>Usuario</strong></span></h2></center>
                </div>
                <div class="form-body">
                 <div class="form-group">
                   <div class="label-group">
                     <label for="txtNombre" class="col-sm-12 control-label">Nombre:</label>
                   </div>
                   <div class="input-group">
                     <input type="text" id="txtNombre" class="form-control" required placeholder="Escribe tu nombre" name="txtNombre" style="height: 50px;" size="145">
                    </div>
                  </div>
                   <div class="form-group">
                     <div class="label-group">
                       <label for="txtCorreo" class="col-sm-12 control-label">Correo:</label>
                     </div>
                     <div class="input-group">
                       <input type="email" id="txtCorreo" class="form-control" required placeholder="Escribe tu correo electronico" name="txtCorreo" style="height: 50px;" >
                     </div>
                   </div>
                     <div class="form-group">
                       <div class="input-group">
                         <label for="txtUsuario" class="col-sm-12 control-label">Usuario:</label>
                       </div>
                       <div class="input-group">
                         <input type="text" id="txtUsuario" class="form-control" required placeholder="Escribe tu usuario personal" name="txtUsuario" style="height: 50px;" >
                       </div>
                    </div>
                    <div class="form-group">
                      <div class="label-group">
                        <label for="txtContrasena" class="col-sm-12 control-label">Contraseña:</label>
                      </div>
                      <div class="input-group">
                        <input type="password" id="txtContrasena" class="form-control" required placeholder="Escribe tu contraseña" name="txtContrasena" style="height: 50px;" >
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="label-group">
                        <label for="txtRepitecontrasena" class="col-sm-12 control-label">Repite la contraseña:</label>
                      </div>
                      <div class="input-group">
                        <input type="password" id="txtRepiteContrasena" class="form-control" required placeholder="Por seguridad, repite tu contraseña" name="txtRepiteContrasena" style="height: 50px;" >
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="label-group">
                        <label for="txtImagen" class="col-sm-12 control-label">Selecciona foto de perfil:</label>
                      </div>
                      <div class="input-group">
                        <input type="file" id="txtImagen" class="form-control" required name="txtImagen" style="height: 50px;" >
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="label-group">
                        <label for="comboEstatus" class="col-sm-12 control-label">Estatus:</label>
                      </div>
                      <div class="input-group">
                        <select class="form-control" id="comboEstatus" name="comboEstatus" style="height: 50px;">
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="label-group">
                        <label for="comboTUsuario" class="col-sm-12 control-label">Tipo de Usuario:</label>
                      </div>
                      <div class="input-group">
                        <select class="form-control" id="comboTUsuario" name="comboTUsuario" style="height: 50px;">
                          <option value="1">Administrador</option>
                          <option value="0">Técnico</option>
                        </select>
                      </div>
                    </div>
                 </div>
                 <div class="form-footer">
                   <center>
                     <input type="hidden" name="addU" value="on">
                     <button type="submit" class="btn" style="background-color: #fa180c; color: white;">Guardar Información</button>
                   </center>
                </div>
                <br>
            </form>
          </div>
        </div>
      </div>
    </div>
    </body>
</html>
