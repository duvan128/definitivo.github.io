<?php include '../app/appconexion.php';
if (isset($_GET["ide"]) && $_GET["ide"] > 0 && is_numeric($_GET["ide"])) {

  $ide = $_GET["ide"];
  $nsql="SELECT ImagenA FROM tavisosnoticias WHERE IDAvisos = $ide";
  $nimagen = mysqli_query($conexion, $nsql);
  $row = $nimagen->fetch_array(MYSQLI_ASSOC);
  $file = $_SERVER['DOCUMENT_ROOT'].'/fundamac/assets/images/avisosynoticias/'.$row['ImagenA'];
  unlink($file);
  $sql = "DELETE FROM tavisosnoticias WHERE IDAvisos = $ide LIMIT 1";
  $conexion->query($sql);
  header('Location: avisosynoticias.php?Mensaje=Se_elimino_el_Aviso');

}
?>
