<?php
//error_reporting(0);
$errores [] = "";

/*Inicia codigo para mostrar a todos los Usuarios*/
$sql = "SELECT * FROM tusuarios";
$resultado = $conexion->query($sql);
if(!$resultado) {
  $errores [] = '<div class="alert alert-warning">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong>Ups!</strong> Existe un error de sintaxis en la consulta. ¡Comuniquese con el Técnico! :(
  </div>';
}
/*Inicia codigo para mostrar a todos los Usuarios*/

/*Inicia Codigo para agregar Usuario*/
if(isset($_POST["addU"]) && $_POST["addU"] == "on") {

     $nombre = $_POST['txtNombre'];
     $correo = $_POST['txtCorreo'];
   $usuario  = $_POST['txtUsuario'];
    $passwor = $_POST['txtContrasena'];
   $password = $_POST['txtRepiteContrasena'];
        $img = $_FILES['txtImagen']['name'];
     $status = $_POST['comboEstatus'];
   $tusuario = $_POST['comboTUsuario'];

  if($passwor == $password){

    $sql = "SELECT NombreU, CorreoU from tusuarios where NombreU='$nombre' && CorreoU = '$correo'";
    $res = mysqli_query($conexion, $sql);
    $row = mysqli_num_rows($res);

      if($row > 0){
        $errores[] = '<div class="alert alert-warning">
           <a href="#" class="close" data-dismiss="alert">&times;</a>
           <strong>Ups!</strong> El Usuario o Correo que intentas agregar ya esta en uso! Verifica tus datos porfavor. :(
        </div>';
      } else {
        if (($img == !NULL) && ($_FILES['txtImagen']['size'] <= 9999999999)){
           //indicamos los formatos que permitimos subir a nuestro servidor
           if (($_FILES["txtImagen"]["type"] == "image/gif")
           || ($_FILES["txtImagen"]["type"] == "image/jpeg")
           || ($_FILES["txtImagen"]["type"] == "image/jpg")
           || ($_FILES["txtImagen"]["type"] == "image/png")){

              // Ruta donde se guardarán las imagenes que subamos
              //$directorio = $_SERVER['DOCUMENT_ROOT'].'/FUNDAMAC/assets/img/usuarios/';
              $directorio = $_SERVER['DOCUMENT_ROOT'].'/assets/img/usuarios/';
              // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
              move_uploaded_file($_FILES['txtImagen']['tmp_name'],$directorio.$img);
            }else{
               //si no cumple con el formato
               $errores[] = '<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <strong>Ups!</strong> El formato de imagen que intentas agregar no es compatible! Verifica en tu manual los tipos de imagenes que puedes agregar porfavor. :(
               </div>';
            }
        }else{
           //si existe la variable pero se pasa del tama?o permitido
           if($img == !NULL)
           $errores[] = '<div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Ups!</strong> El tamaño de la imagen es muy grande! Intenta con otra porfavor. :(
                        </div>';
        }
           $sql1 = "INSERT INTO tusuarios
                (NombreU,CorreoU, UsuarioU, ContrasenaU, Fecha_RegistroU, ImagenU, EstatusU, Tipo_UsuarioU)
                VALUES ('$nombre','$correo','$usuario','$password', NOW(), '$img', '$status','$tusuario')";
           $resultado = mysqli_query($conexion, $sql1);

           if($resultado == TRUE) {
              $errores[] = '<div class="alert alert-info">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <strong>Wow!</strong> El usuario se agrego correctamente! :D
              </div>';

           } else {
              $errores[] = '<div class="alert alert-warning">
                 <a href="#" class="close" data-dismiss="alert">&times;</a>
                 <strong>Ups!</strong> El usuario no se ha agregado correctamente! Verifica tus datos porfavor. :(
              </div>';
           }
      }
  }else{
    $errores[] = '<div class="alert alert-warning">
       <a href="#" class="close" data-dismiss="alert">&times;</a>
       <strong>Ups!</strong> Las Contraseñas que ingresó no son iguales. Verifiquelas porfavor.
    </div>';
  }
}
/*Termina Codigo para agregar Usuario*/

/*Inicia codigo para editar Usuario*/
if(isset($_GET['ide'])){

   $ide = $_GET['ide'];
   $id = base64_decode($ide);
  $sql = "SELECT * FROM tusuarios WHERE IDUsuario = $id LIMIT 1";
  $resultado = $conexion->query($sql);

  if($resultado == 0){
    $errores[] = '<div class="alert alert-warning">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong>Ups!</strong> El usuario a editar no esta en la base de datos. :(
    </div>';
  } else {
    $registro = mysqli_fetch_assoc($resultado);
  }
}

if (isset($_POST["editU"]) && $_POST["editU"] == "on") {
         $id = $_POST['ID'];
     $nombre = $_POST['txtNombre'];
     $correo = $_POST['txtCorreo'];
   $usuario  = $_POST['txtUsuario'];
    $passwor = $_POST['txtContrasena'];
   $password = $_POST['txtRepiteContrasena'];
        $img = $_FILES['txtImagen']['name'];
     $status = $_POST['comboEstatus'];
   $tusuario = $_POST['comboTUsuario'];

  if($passwor == $password){
      if (!empty($nombre) && !empty($correo) &&
          !empty($usuario) && !empty($passwor) && !empty($password)) {
            if (($img == !NULL) && ($_FILES['txtImagen']['size'] <= 9999999999)){
        		   //indicamos los formatos que permitimos subir a nuestro servidor
        		   if (($_FILES["txtImagen"]["type"] == "image/gif")
        		   || ($_FILES["txtImagen"]["type"] == "image/jpeg")
        		   || ($_FILES["txtImagen"]["type"] == "image/jpg")
        		   || ($_FILES["txtImagen"]["type"] == "image/png")){
                 $nsql="SELECT ImagenU FROM tusuarios WHERE IDUsuario = $id";
                 $nimagen = mysqli_query($conexion, $nsql);
                 $row = $nimagen->fetch_array(MYSQLI_ASSOC);
                 $file = $_SERVER['DOCUMENT_ROOT'].'/covid/assets/img/usuarios/'.$row['ImagenU'];
                 //$file = $_SERVER['DOCUMENT_ROOT'].'/assets/img/usuarios/'.$row['ImagenU'];
                 unlink($file);
        		      // Ruta donde se guardarán las imagenes que subamos
        		      $directorio = $_SERVER['DOCUMENT_ROOT'].'/covid/assets/img/usuarios/';
                  //$directorio = $_SERVER['DOCUMENT_ROOT'].'/assets/img/usuarios/';
        		      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
        		      move_uploaded_file($_FILES['txtImagen']['tmp_name'],$directorio.$img);
        		    }else{
        		       //si no cumple con el formato
                   $errores[] = '<div class="alert alert-warning">
                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                      <strong>Ups!</strong> El formato de imagen que intentas agregar no es compatible! Verifica en tu manual los tipos de imagenes que puedes agregar porfavor. :(
                   </div>';
        		    }
        		}else{
        		   //si existe la variable pero se pasa del tama?o permitido
        		   if($img == !NULL)
               $errores[] = '<div class="alert alert-warning">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Ups!</strong> El tamaño de la imagen es muy grande! Intenta con otra porfavor. :(
                            </div>';
        		}
            $sql1="UPDATE tusuarios SET NombreU = '$nombre', CorreoU = '$correo', UsuarioU = '$usuario',
            ContrasenaU = '$password', Fecha_RegistroU = NOW(), ImagenU = '$img', EstatusU = '$status',
            Tipo_UsuarioU = '$tusuario'
                   WHERE IDUsuario = '$id' LIMIT 1";
            $resultado = mysqli_query($conexion, $sql1);
            if($resultado == TRUE){
              $errores[] = '<div class="alert alert-info">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  Los datos del <strong>Usuario</strong> se han actualizado correctamente! :D
              </div>';
            } else {
              $errores[] = '<div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Ups!</strong> Los datos del Usuario no se han actualizado! Contacta al Técnico. :(
                </div>';
            }
      }else {
        $errores[] = '<div class="alert alert-warning">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          <strong>Ups!</strong> Favor de llenar el formulario correctamente. :(
          </div>';
      }

  }else{
     $errores[] = '<div class="alert alert-warning">
       <a href="#" class="close" data-dismiss="alert">&times;</a>
       <strong>Ups!</strong> Las Contraseñas que ingresó no son iguales. Verifiquelas porfavor.
     </div>';
    }
}
/*Termina codigo para editar Usuario*/

?>
