<?php


@ini_set( 'upload_max_size' , '256M' );
@ini_set( 'post_max_size', '256M');
@ini_set( 'max_execution_time', '300' );
error_reporting(0);

$errores [] = "";

/*Inicia codigo para mostrar a todas las Noticias*/
$sql = "SELECT * FROM tavisosnoticias";
$resultado = $conexion->query($sql);
if(!$resultado) {
  $errores [] = '<div class="alert alert-warning">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong>Ups!</strong> Existe un error de sintaxis en la consulta. ¡Comuniquese con el Técnico! :(
  </div>';
}
/*Inicia codigo para mostrar a todas las Noticias*/

/*Inicia Codigo para agregar Noticia*/
if(isset($_POST["addAN"]) && $_POST["addAN"] == "on") {
  $titulo = $_POST['txtTitulo'];
  $descri = $_POST['txtDescripcion'];
  $catego = $_POST['txtCategoria'];
  $idUsu = $_POST['txtidUsuario'];

  $archiv = $_FILES['txtArchivo']['name'];
  $tipoar = $_FILES['txtArchivo']['type'];
  if (($archiv == !NULL) && ($_FILES['txtArchivo']['size'] <= 9999999999)){
     //indicamos los formatos que permitimos subir a nuestro servidor
     if ($_FILES['txtArchivo']['type'] == "video/mp4"
        || $_FILES['txtArchivo']['type'] == "image/gif"
        || $_FILES['txtArchivo']['type'] == "image/jpeg"
        || $_FILES['txtArchivo']['type'] == "image/jpg"
        || $_FILES['txtArchivo']['type'] == "image/png"){

        //$directorio = $_SERVER['DOCUMENT_ROOT'].'/covid/assets/img/avisosynoticias/'.$archiv;
        $directorio = $_SERVER['DOCUMENT_ROOT'].'/assets/img/avisosynoticias/'.$archiv;
        if (move_uploaded_file($_FILES['txtArchivo']['tmp_name'],$directorio)){
          if ($tipoar == 'video/mp4') {
            $tipoar = 'V';
          }else {
            $tipoar = 'I';
          }



          $sql="INSERT INTO tavisosnoticias (TituloA, DescripcionA, CategoriaA, ImagenA, TipoA, FechaA, IdUsuario) VALUES ('$titulo','$descri','$catego','$archiv','$tipoar',NOW(),'$idUsu')";
          $res = mysqli_query($conexion, $sql);
          if ($res == TRUE ) {
            $errores[] = '<div class="alert alert-info">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                          <strong>Wow!</strong> Tu Aviso se ha agregado correctamente! :D
                          </div>';
          }else{
            $errores[] = '<div class="alert alert-info">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                          <strong>Ups!</strong> Tu Aviso no se agrego correctamente. Contacta al Técnico porfavor :(
                          </div>';
          }
        }else {
          $errores[] = '<div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Ups!</strong> Tu archivo no se ha podido subir. :(
                        </div>';
        }
     }else {
       $errores[] = '<div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Ups!</strong> El archivo que intentas cargar no es compatible! Intenta con otro archivo que tenga extención mp4 o un formato imagen. :(
                        </div>';
     }
   }else {
     $errores[] = '<div class="alert alert-warning">
                       <a href="#" class="close" data-dismiss="alert">&times;</a>
                       <strong>Ups!</strong> El tamaño del archivo es muy grande! Intenta con otra porfavor. :(
                       </div>';
   }
 }

/*Termina Codigo para agregar Noticia*/

/*Inicia codigo para editar Noticia*/
if(isset($_GET['ide'])){

   $ide = $_GET['ide'];
   $id = base64_decode($ide);
  $sql = "SELECT * FROM tavisosnoticias WHERE IDAvisos = $id LIMIT 1";
  $resultado = $conexion->query($sql);
  if(mysqli_num_rows($resultado)== 0){
    $errores[] = '<div class="alert alert-warning">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong>Ups!</strong> El Aviso a editar no esta en la base de datos. :(
    </div>';
  } else {
    $registro = $resultado->fetch_assoc();
  }
}

if(isset($_POST["editAN"]) && $_POST["editAN"] == "on") {
  $titulo = $_POST['txtTitulo'];
  $descri = $_POST['txtDescripcion'];
  $catego = $_POST['txtCategoria'];
  $archiv = $_FILES['txtArchivo']['name'];
  $tipoar = $_FILES['txtArchivo']['type'];
  if (($archiv == !NULL) && ($_FILES['txtArchivo']['size'] <= 9999999999)){
     //indicamos los formatos que permitimos subir a nuestro servidor
     if ($_FILES['txtArchivo']['type'] == "video/mp4"
        || $_FILES['txtArchivo']['type'] == "image/gif"
        || $_FILES['txtArchivo']['type'] == "image/jpeg"
        || $_FILES['txtArchivo']['type'] == "image/jpg"
        || $_FILES['txtArchivo']['type'] == "image/png"){
          $nsql="SELECT ImagenA FROM tavisosnoticias WHERE IDAvisos = $id";
          $nimagen = mysqli_query($conexion, $nsql);
          $row = $nimagen->fetch_array(MYSQLI_ASSOC);
          $file = $_SERVER['DOCUMENT_ROOT'].'/covid/assets/img/avisosynoticias/'.$row['ImagenA'];
          //$file = $_SERVER['DOCUMENT_ROOT'].'/assets/img/avisosynoticias/'.$row['ImagenA'];
          unlink($file);

        //$directorio = $_SERVER['DOCUMENT_ROOT'].'/covid/assets/img/avisosynoticias/'.$archiv;
        $directorio = $_SERVER['DOCUMENT_ROOT'].'/assets/img/avisosynoticias/'.$archiv;

        if (move_uploaded_file($_FILES['txtArchivo']['tmp_name'],$directorio)){
          if ($tipoar == 'video/mp4') {
            $tipoar = 'V';
          }else {
            $tipoar = 'I';
          }
          $sql="UPDATE tavisosnoticias SET TituloA = '$titulo', DescripcionA = '$descri', CategoriaA = '$catego', ImagenA = '$archiv', TipoA = '$tipoar' WHERE IDAvisos = $id";
          $res = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
          if ($res == TRUE ) {
            $errores[] = '<div class="alert alert-info">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                          <strong>Wow!</strong> Tu Aviso se ha editado correctamente! :D
                          </div>';
          }else{
            $errores[] = '<div class="alert alert-info">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                          <strong>Ups!</strong> Tu Aviso no se edito correctamente. Contacta al Técnico porfavor :(
                          </div>';
          }
        }else {
          $errores[] = '<div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Ups!</strong> Tu archivo no se ha podido subir. :(
                        </div>';
        }
     }else {
       $errores[] = '<div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Ups!</strong> El Archivo que intentas cargar no es compatible! Intenta con otro archivo que tenga extención mp4 o un formato imagen. :(
                        </div>';
     }
   }else {
     $errores[] = '<div class="alert alert-warning">
                       <a href="#" class="close" data-dismiss="alert">&times;</a>
                       <strong>Ups!</strong> El tamaño del archivo es muy grande! Intenta con otra porfavor. :(
                       </div>';
   }
 }
/*Termina codigo para editar una Noticia*/

?>
