<?php include '../app/appconexion.php';
if (isset($_GET["ide"]) && $_GET["ide"] > 0 && is_numeric($_GET["ide"])) {

  $ide = $_GET["ide"];
  $nsql="SELECT ImagenU FROM tusuarios WHERE IDUsuario = $ide";
  $nimagen = mysqli_query($conexion, $nsql);
  $row = $nimagen->fetch_array(MYSQLI_ASSOC);
  $file = $_SERVER['DOCUMENT_ROOT'].'/fundamac/assets/images/usuarios/'.$row['ImagenU'];
  unlink($file);
  $sql = "DELETE FROM tusuarios WHERE IDUsuario = $ide LIMIT 1";
  $conexion->query($sql);
  header('Location: usuarios.php?Mensaje=Se_elimino_al_Usuario');

}
?>
