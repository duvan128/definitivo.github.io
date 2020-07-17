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
    <title>Avisos y Noticias | COVID-19 Info</title>
    <?php include 'libs.inc'; ?>
  </head>
  <body>
  <?php include 'header.inc'; ?>
    <div class="container">
      <div class="row">
        <hr />
        <blockquote class="col-md-12">
          <ol class="breadcrumb" style="text-align:center;">
            <li class="active">
              <a href="#" class="blue"><b>*Avisos y Noticias*</b>: Aqui puedes dar Ver, dar de Alta, Eliminar y Editar Información de un Aviso o Noticia.</a>
            </li>
          </ol>
        </blockquote>
        <hr/>
        <div class="col-sm-6" style="text-align:center;">
          <a href="..">
            <img src="../img/flecha.svg" style="cursor:pointer; " width="50px">
          </a>
        </div>
        <div class="col-sm-6" style="text-align:center;">
          <button value="Nuevo" onclick="window.location.href='NuevoAviso.php?varone=<?php echo $_SESSION['datos_usuario'][0]; ?>'" style="background-color: #631817; color: white;" class="btn btn-lg">Nuevo Aviso</button>
        </div>
      </div>
      <center>
        <br>
        <div class="container">
          <?php foreach ($alertas as $key => $alerta) : echo $alerta; endforeach; ?>
          <?php foreach ($errores as $key => $error) : echo $error; endforeach; ?>
          <?php if(isset($_GET["Mensaje"])): ?>
          <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            El Aviso se ha eliminado <strong>¡Correctamente!</strong>
          </div>
          <?php endif; ?>
          <div class="logo">
            <h2>Lista de <strong class="blue">Avisos y Noticias</strong></h2>
          </div>
          <br>
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Titulo</th>
                  <th>Categoria</th>
                  <th>Descripción</th>
                  <th>Archivo Multimedia</th>
                  <center>
                    <th colspan="2">Acciones</th>
                  </center>
                </tr>
              </thead>
              <tbody>
                <?php $contador = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                <tr>
                  <td style="text-align:center;"><?php echo $row['IDAvisos'] ?></td>
                  <td style="text-align:center;"><?php echo $row['TituloA']?></td>
                  <td style="text-align:center;"><?php echo $row['CategoriaA'] ?></td>
                  <td style="text-align:center;"><?php echo $row['DescripcionA'] ?></td>
                  <td style="text-align:center;"><?php if ($row['TipoA'] == 'I') { echo "<img src='../../assets/img/avisosynoticias/".$row['ImagenA']."' style='width:50%;'/>"; }else{ echo "<video style='width:70%;' controls muted><source src='../../assets/img/avisosynoticias/".$row['ImagenA']."' type='video/mp4'></video>"; } ?></td>
                  <td style="text-align:center;"><a href="editAvisosynoticias.php?ide=<?php echo base64_encode($row['IDAvisos']); ?>"><img src="../img/edit.svg" width="35px"></img></a></td>
                  <td style="text-align:center;"><a href="javascript:void(0);" onclick="EliminarAviso('<?php echo $row['IDAvisos']; ?>')"><img src="../img/trash.svg" width="35px"></img></a></td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </body>
    <script src="../js/funciones.js"></script>
  </html>
