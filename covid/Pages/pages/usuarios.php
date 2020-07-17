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
      <title>Usuarios | COVID-19 Info</title>
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
                  <a href="#" class="blue"><b>*Catálogo de Usuarios*</b>: Aqui puedes dar de Alta, Asignar Perfil, Eliminar y Editar Información de Usuarios.</a>
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
              <button value="Nuevo" onclick="window.location.href='NuevoUsuario.php'" style="background-color: #631817; color: white;" class="btn BTN.LG">Nuevo Usuario</button>
            </div>
          </div>
          <center>
          <div class="register-container container">
            <?php foreach ($alertas as $key => $alerta) : echo $alerta; endforeach; ?>
            <?php foreach ($errores as $key => $error) : echo $error; endforeach; ?>
            <?php if(isset($_GET["Mensaje"])): ?>
              <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                El Usuario se ha eliminado <strong>¡Correctamente!</strong>
              </div>
            <?php endif; ?>
            <div class="logo">
              <center><h2>Lista de <span class="blue"><strong>Usuarios</strong></span></h2></center>
            </div>
            <br>
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Foto de Perfil</th>
                    <th>Estatus</th>
                    <th>Tipo de Usuario</th>
                    <center>
                    <th colspan="2">Acciones</th>
                    </center>
                  </tr>
                </thead>
                <tbody>
                  <?php $contador = 1; ?>
                  <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                  <tr>
                    <td><?php echo $row['IDUsuario']; ?></td>
                    <td><?php echo $row['NombreU']; ?></td>
                    <td><?php echo $row['CorreoU']; ?></td>
                    <td><?php echo $row['UsuarioU']; ?></td>
                    <td><img src="../../assets/img/usuarios/<?php echo $row['ImagenU']; ?>" width="50"/></td>
                    <td><?php if($row['EstatusU']==1){echo "Activo";}else{echo "Inactivo";} ?></td>
                    <td><?php if($row['Tipo_UsuarioU']==1){echo "Administrador";}else{echo "Técnico";}?></td>
                    <td style="text-align:center;"><a href="editUsuario.php?ide=<?php echo base64_encode($row['IDUsuario']); ?>"><img src="../img/edit.svg" width="35px"></img></a></td>
                    <td style="text-align:center;"><a href="javascript:void(0);" onclick="EliminarU('<?php echo $row['IDUsuario']; ?>')"><img src="../img/trash.svg"  width="35px"></img></a></td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <br>
    </body>
    <script src="../js/funciones.js"></script>
</html>
