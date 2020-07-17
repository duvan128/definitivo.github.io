<?php
//error_reporting(0);
$errores [] = "";

/*Inicia codigo para mostrar a todas las Noticias*/
$sql = "SELECT * FROM tbeneficios";
$resultado = $conexion->query($sql);
if(!$resultado) {
  $errores [] = '<div class="alert alert-warning">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong>Ups!</strong> Existe un error de sintaxis en la consulta. ¡Comuniquese con el Técnico! :(
  </div>';
}
/*Inicia codigo para mostrar a todas las Noticias*/

/*Inicia Codigo para agregar Noticia*/
if(isset($_POST["addB"]) && $_POST["addB"] == "on") {

    $titulo = $_POST['txtTitulo'];
    $descri = $_POST['txtDescripcion'];
    $img = $_FILES['txtImgBeneficio']['name'];
		//Si existe imagen y tiene un tamaño correcto
    if (($img == !NULL) && ($_FILES['txtImgBeneficio']['size'] <= 9999999999)){
       //indicamos los formatos que permitimos subir a nuestro servidor
       if (($_FILES["txtImgBeneficio"]["type"] == "image/gif")
       || ($_FILES["txtImgBeneficio"]["type"] == "image/jpeg")
       || ($_FILES["txtImgBeneficio"]["type"] == "image/png")
       || ($_FILES["txtImgBeneficio"]["type"] == "image/jpg")){

		      // Ruta donde se guardarán las imagenes que subamos
		  //$directorio = $_SERVER['DOCUMENT_ROOT'].'/fundamac/assets/images/beneficios/';
          $directorio = $_SERVER['DOCUMENT_ROOT'].'/assets/images/beneficios/';
		      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
          move_uploaded_file($_FILES['txtImgBeneficio']['tmp_name'],$directorio.$img);
		    }else{
		       //si no cumple con el formato
           $errores[] = '<div class="alert alert-warning">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong>Ups!</strong> El formato de imagen que intentas agregar no es compatible! Recuerda que el tipo de imagenes que puedes agregar jpg o jpeg. :(
           </div>';
		    }
		}else{
		   //si existe la variable pero se pasa del tamaño permitido
		   if($img== !NULL)
       $errores[] = '<div class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Ups!</strong> El tamaño de la imagen es muy grande! Intenta con otra porfavor. :(
                    </div>';
		}
    $sql="INSERT INTO tbeneficios (NombreB, DescripcionB, ImagenB) VALUES ('$titulo','$descri','$img')";
    $res = mysqli_query($conexion, $sql);
    if ($res == TRUE ) {
        $errores[] = '<div class="alert alert-info">
                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                      <strong>Wow!</strong> Tu Beneficio se ha agregado correctamente! :D
                      </div>';
    }else {
      $errores[] = '<div class="alert alert-info">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Ups!</strong> Tu Beneficio no se agrego correctamente. Contacta al Técnico porfavor :(
                    </div>';
    }
  }

/*Termina Codigo para agregar Noticia*/

/*Inicia codigo para editar Noticia*/
if(isset($_GET['ide'])){
  $ide = $_GET['ide'];
  $id = base64_decode($ide);

  $sql = "SELECT * FROM tbeneficios WHERE IDBeneficio = $id LIMIT 1";
  $resultado = $conexion->query($sql);

  if($resultado == 0){
    $errores[] = '<div class="alert alert-warning">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong>Ups!</strong> El Beneficio a editar no esta en la base de datos. :(
    </div>';
  } else {
    $registro = $resultado->fetch_assoc();

  }
}

if(isset($_POST["editB"]) && $_POST["editB"] == "on") {

  $titulo = $_POST['txtTitulo'];
  $descri = $_POST['txtDescripcion'];
  $img = $_FILES['txtImgBeneficio']['name'];
  //Si existe imagen y tiene un tamaño correcto
  if (($img == !NULL) && ($_FILES['txtImgBeneficio']['size'] <= 9999999999)){
     //indicamos los formatos que permitimos subir a nuestro servidor
     if (($_FILES["txtImgBeneficio"]["type"] == "image/gif")
     || ($_FILES["txtImgBeneficio"]["type"] == "image/jpeg")
     || ($_FILES["txtImgBeneficio"]["type"] == "image/png")
     || ($_FILES["txtImgBeneficio"]["type"] == "image/jpg")){
       $nsql="SELECT ImagenN FROM tnosotros WHERE IDNosotros = $id";
       $nimagen = mysqli_query($conexion, $nsql);
       $row = $nimagen->fetch_array(MYSQLI_ASSOC);
       $file = $_SERVER['DOCUMENT_ROOT'].'/fundamac/assets/images/beneficios/'.$row['ImagenB'];
       //$file = $_SERVER['DOCUMENT_ROOT'].'/assets/images/beneficios/'.$row['ImagenB'];
       unlink($file);
        // Ruta donde se guardarán las imagenes que subamos
        //$directorio = $_SERVER['DOCUMENT_ROOT'].'/fundamac/assets/images/beneficios/';
        $directorio = $_SERVER['DOCUMENT_ROOT'].'/assets/images/beneficios/';
        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
        move_uploaded_file($_FILES['txtImgBeneficio']['tmp_name'],$directorio.$img);
		    }else{
		       //si no cumple con el formato
           $errores[] = '<div class="alert alert-warning">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong>Ups!</strong> El formato de imagen que intentas agregar no es compatible! Recuerda que el tipo de imagenes que puedes agregar jpg o jpeg. :(
           </div>';
		    }
		}else{
		   //si existe la variable pero se pasa del tamaño permitido
		   if($img == !NULL)
       $errores[] = '<div class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Ups!</strong> El tamaño de la imagen es muy grande! Intenta con otra porfavor. :(
                    </div>';
		}

    $sql = "UPDATE tbeneficios SET NombreB = '$titulo', DescripcionB = '$descri', ImagenB = '$img' WHERE IDBeneficio = '$id'";
    $res = mysqli_query($conexion, $sql);
    if ($res == TRUE ) {
        $errores[] = '<div class="alert alert-info">
                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                      <strong>Wow!</strong> Tu Beneficio se ha editado correctamente! :D
                      </div>';
    }else {
      $errores[] = '<div class="alert alert-info">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Ups!</strong> Tu Beneficio no se agrego correctamente. Contacta al Técnico porfavor :(
                    </div>';
    }
  }
/*Termina codigo para editar una Noticia*/
?>
