<?php include "../app/appconexion.php"; ?>
<?php include "../app/applogin.php"; ?>
<?php validarSesion(); ?>
<?php if(isset($_GET['op']) && $_GET['op'] == 'salir'): ?>
  <?php cerrarSesion(); ?>
<?php
endif; 
error_reporting(0);
?>
<?php include '../app/appAvisosyNoticias.php'; ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Nuevo Aviso | FUNDAMAC</title>
    <?php include 'libs.inc'; ?>
  </head>

    <body>
    <?php include 'header.inc'; ?>
    <div class="container">
      <div class="row">
        <hr />
        <div class="col-sm-6" style="text-align:center;">
          <a href="avisosynoticias.php">
            <img src="../img/flecha.svg"  width="50px">
          </a>
        </div>
        <div class="col-sm-6" style="text-align:center">
          <ol class="breadcrumb">
            <li class="active">
              <a href="#" class="blue"><b>*Agregar Aviso*</b>: Aquí puedes dar de Alta un Aviso.</a>
            </li>
          </ol>
        </div>
        <hr/>
      </div>
      <div class="row">
        <div class="container">
          <div class="signup-form-container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" class="justify-content-center" autocomplete="off">
              <?php  foreach ($errores as $key => $error) { ?>
                <center><?php echo $error; ?></center>
              <?php } ?>
              <div class="form-header">
                <center><h2 class="form-title">Nuevo <span class="blue"><strong>Aviso</strong></span></h2></center>
              </div>
              <div class="form-body">
                <div class="form-group">
                  <div class="input-group">
                    <label for="txtTitulo"><b>Titulo</b>: </label>
                  </div>
                  <div class="input-group">
                    <input name="txtTitulo" id="txtTitulo" type="text" class="form-control" required placeholder="Escribe el titulo del Aviso" style="height:50px" size="145">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <label for="txtCategoria"><b>Categoria</b>: </label>
                  </div>
                  <div class="input-group">
                    <select name="txtCategoria" id="txtCategoria" class="form-control" style="height:40px">
                      <option value="Inspiración">Inspiración</option>
                      <option value="Notificación">Notificación</option>
                      <option value="Evento">Evento</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <label for="txtArchivo"><b>Selecciona Archivo</b>: </label>
                  </div>
                  <div class="input-group">
                    <input name="txtArchivo" id="txtArchivo" type="file" class="form-control" required style="height:50px" size="145">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <label for="txtDescripcion"><b>Descripción</b>: </label>
                  </div>
                  <div class="input-group">
                    <textarea name="txtDescripcion" id="summernote" type="text" class="form-control" required placeholder="Escribe el texto de la noticia" ></textarea>
                  </div>
                  <div class="input-group">
                    <input name="txtidUsuario" id="txtidUsuario" type="text" class="form-control" hidden required style="height:50px" size="145" value="<?php echo $_GET["varone"]; ?>">
                  </div>
                </div>
              </div>
              <div class="form-footer">
                <center>
                  <input type="hidden" name="addAN" value="on">
                  <button class="btn" style="background-color: #631817; color: white;" type="submit">Guardar Información</button>
                </center>
              </div>
            </form>
            <br>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascript -->
    <script src="../js/bootstrap.min.js"></script>
    <!--Inicialización de SummerNote-->
    <script>
      $('#summernote').summernote({
        height: 400,
        codemirror: { // codemirror options
        theme: 'superhero'
      }             // configurando la altura maxima
        });
    </script>
    <!--Termina Inicialización de SummerNote-->
    </body>
</html>
