<?php

  $errores [] = "";

  if(isset($_POST["login"]) && $_POST["login"] == "iniciar"){

    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario_login']);
    $password = mysqli_real_escape_string($conexion, $_POST['password_login']);

    $sql = "SELECT * FROM tusuarios WHERE UsuarioU = '{$usuario}' LIMIT 1";
    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) > 0){

      $fila = mysqli_fetch_assoc($resultado);
      $contra_encriptada = sha1(md5($password));

      if($fila["ContrasenaU"] == $password){
         $_SESSION['datos_usuario'] = array($fila['IDUsuario'], $fila['NombreU'], $fila['CorreoU'], $fila['UsuarioU'],
                                            $fila['ContrasenaU'], $fila['ImagenU'],
                                            $fila['EstatusU'], $fila['Tipo_UsuarioU']);
         $_SESSION['estado_sesion'] = true;
         header("Location:../pages/principal.php");
      } else {
          $errores[] = '<div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Ups!</strong> El usuario o la contraseña son incorrectos.
          </div>';
      }

    } else {
         $errores[] = '<div class="alert alert-warning">
           <a href="#" class="close" data-dismiss="alert">&times;</a>
           <strong>Ups!</strong> El usuario o la contraseña son incorrectos. :(
         </div>';
    }

  }

function validarSesion(){
  if ($_SESSION['estado_sesion'] == NULL) {
    header("Location: ../?No_hay_sesión_abierta");
  }
}

function sessionExiste(){
  if(isset($_SESSION['estado_sesion']) && $_SESSION['estado_sesion'] == true) {
    header("Location: pages/principal.php?Sesión_activa");
  }
}

function cerrarSesion(){
  session_start();
  session_destroy();
  header("Location: ../../");
  exit;
}

?>
