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
      <title>Editar Usuario | FUNDAMAC</title>
      <?php include 'libs.inc'; ?>
    </head>

    <body>
      <?php include 'header.inc'; ?>
      <div class="container">
        <div class="row">
          <hr />
          <div class="container">
            <div class="row">
              <div class="col-sm-6" style="text-align:center;">
                <a href="usuarios.php">
                  <img src="../img/flecha.svg" style="cursor:pointer; " width="50px">
                </a>
              </div>
              <div class="col-sm-6" style="text-align:center">
                <ol class="breadcrumb">
                  <li class="active">
                    <a href="#" class="blue"><b>*Editar Usuarios*</b>: Aqui puedes Editar la Información del Usuarios seleccionado.</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <hr/>
        </div>
    <div class="row">
      <div class="container">
        <div class="" >
            <form  method="post" enctype="multipart/form-data" class="justify-content-center">
              <center><?php  foreach ($errores as $key => $error) { echo $error;  } ?></center>
              <div class="logo">
                <center><h2>Editar <span class="blue"><strong>Usuario</strong></span></h2></center>
              </div>
              <input type="hidden" id="ID" name="ID" value="<?php echo $registro['IDUsuario']; ?>" />
              <div class="form-body">
                <div class="form-group">
                  <div class="label-group">
                    <label for="txtNombre" class="col-sm-12 control-label">Nombre:</label>
                  </div>
                  <div class="input-group">
                    <input type="text" id="txtNombre" class="form-control" value="<?php echo $registro['NombreU'] ?>" name="txtNombre" style="height:40px" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="label-group">
                    <label for="txtCorreo" class="col-sm-12 control-label">Correo:</label>
                  </div>
                  <div class="input-group">
                    <input type="email" id="txtCorreo" class="form-control" value="<?php echo $registro['CorreoU'] ?>" name="txtCorreo" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="label-group">
                    <label for="txtUsuario" class="col-sm-12 control-label">Usuario:</label>
                  </div>
                    <div class="input-group">
                      <input type="text" id="txtUsuario" class="form-control" value="<?php echo $registro['UsuarioU'] ?>" name="txtUsuario" >
                    </div>
                </div>
                <div class="form-group">
                  <div class="label-group">
                    <label for="txtContrasena" class="col-sm-12 control-label">Contraseña:</label>
                  </div>
                  <div class="input-group">
                    <input type="password" id="txtContrasena" class="form-control" value="<?php echo $registro['ContrasenaU'] ?>" name="txtContrasena" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="label-group">
                    <label for="txtRepitecontrasena" class="col-sm-12 control-label">Repite la contraseña:</label>
                  </div>
                  <div class="input-group">
                    <input type="password" id="txtRepiteContrasena" class="form-control" value="<?php echo $registro['ContrasenaU'] ?>" name="txtRepiteContrasena">
                  </div>
                </div>
                <div class="form-group">
                  <div class="label-group">
                    <label for="txtImagen" class="col-sm-12 control-label">Selecciona fotode Perfil:</label>
                  </div>
                  <div class="input-group">
                    <input type="file" id="txtImagen" class="form-control" value="<?php echo $registro['ImagenU'] ?>"  required name="txtImagen">
                  </div>
                </div>
                <div class="form-group">
                  <div class="label-group">
                    <label for="comboEstatus" class="col-sm-12 control-label">Estatus:</label>
                  </div>
                  <div class="input-group">
                    <select class="form-control"  id="comboEstatus" name="comboEstatus" >
                      <option value="1"<?php if($registro['EstatusU']=='1') echo 'selected'; ?>>Activo</option>
                      <option value="0"<?php if($registro['EstatusU']=='0') echo 'selected'; ?>>Inactivo</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="label-group">
                    <label for="comboTUsuario" class="col-sm-12 control-label" >Tipo de Usuario:</label>
                  </div>
                  <div class="input-group">
                    <select class="form-control" id="comboTUsuario" name="comboTUsuario" >
                      <option value="1"<?php if($registro['Tipo_UsuarioU']=='1') echo 'selected'; ?>>Administrador</option>
                      <option value="0"<?php if($registro['Tipo_UsuarioU']=='0') echo 'selected'; ?>>Técnico</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-footer">
                <center>
                  <input type="hidden" name="editU" value="on">
                  <button class="btn" style="background-color: #631817; color: white;" type="submit">Guardar Información</button>
                </center>
              </div>
              <br>
            </form>
          </div>
        </div>
      </div>
    </div>
      <!-- Javascript -->
        <script src=".."></script>
    </body>
</html>
