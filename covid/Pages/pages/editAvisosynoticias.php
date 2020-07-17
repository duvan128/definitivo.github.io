<?php include "../app/appconexion.php"; ?>
<?php include "../app/applogin.php"; ?>
<?php validarSesion(); ?>
<?php if(isset($_GET['op']) && $_GET['op'] == 'salir'): ?>
  <?php cerrarSesion(); ?>
<?php endif; ?>
<?php include '../app/appAvisosyNoticias.php'; ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Editar Aviso | FUNDAMAC</title>
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
              <a href="#" class="blue"><b>*Editar Aviso*</b>: Aquí puedes editar la información del Aviso seleccionado.</a>
            </li>
          </ol>
        </div>
        <hr/>
      </div>
      <div class="row">
        <div class="container">
          <form method="post" enctype="multipart/form-data" class="justify-content-center" autocomplete="off">
            <?php  foreach ($errores as $key => $error) { ?>
              <center><?php echo $error; ?></center>
            <?php } ?>
            <div class="form-header">
              <center><h2 class="form-title">Editar <span class="blue"><strong>Aviso</strong></span></h2></center>
            </div>
            <input type="hidden" id="id" name="id" value="<?php echo $registro['IDAvisos']; ?>" />
            <div class="form-body">
              <div class="form-group">
                <div class="label-group">
                  <label for="txtTitulo"><b>Titulo</b>: </label>
                </div>
                <div class="input-group">
                  <input name="txtTitulo" id="txtTitulo" type="text" class="form-control" required value="<?php echo $registro['TituloA'] ?>" size="145">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <label for="txtCategoria"><b>Categoria</b>: </label>
                </div>
                <div class="input-group">
                  <select name="txtCategoria" id="txtCategoria" class="form-control" style="height:40px">
                    <option value="Inspiración" <?php if($registro['CategoriaA']=='Inspiración') echo 'selected'; ?>>Inspiración</option>
                    <option value="Notificación" <?php if($registro['CategoriaA']=='Notificación') echo 'selected'; ?>>Notificación</option>
                    <option value="Evento" <?php if($registro['CategoriaA']=='Evento') echo 'selected'; ?>>Evento</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <label for="txtArchivo"><b>Selecciona Archivo</b>: </label>
                </div>
                <div class="input-group">
                  <input name="txtArchivo" id="txtArchivo" type="file" class="form-control" required style="height:50px" size="145"> &nbsp <?php echo $registro['ImagenA'] ?></input>
                </div>
                <div class="label-group">
                  <center>
                    <p>
                        <br>
                    </p>
                    <?php if ($registro['TipoA'] == 'I') { echo "<img src='../../assets/images/avisosynoticias/".$registro['ImagenA']."' style='width:50%;'/>"; }else{ echo "<video style='width:70%;' controls muted><source src='../../assets/images/avisosynoticias/".$registro['ImagenA']."' type='video/mp4'></video>"; } ?>
                  </center>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <label for="txtDescripcion"><b>Descripción</b>: </label>
                </div>
                <div class="input-group">
                  <textarea name="txtDescripcion" id="summernote" type="text"  required class="form-control" ><?php echo $registro['DescripcionA']; ?></textarea>
                </div>
              </div>
            </div>
            <div class="form-footer">
              <center>
                <input type="hidden" name="editAN" value="on">
                <button class="btn" style="background-color: #fa180c; color: white;" type="submit">Guardar Información</button>
              </center>
            </div>
          </form>
          <br>
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
