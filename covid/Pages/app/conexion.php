<?php
error_reporting(0);
//$conexion = mysqli_connect("sql303.260mb.net","n260m_26212841","yesidsvc");
$conexion = mysqli_connect("localhost:3308","root","");
            mysqli_set_charset($conexion, "utf-8");
$bddatos = mysqli_select_db($conexion, "covid");
//$bddatos = mysqli_select_db($conexion, "n260m_26212841_covidinfo19");

  if (!$conexion) {
       echo '<div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">&times</a>
        <strong>Ups!</strong> No se pude establecer una conexión con la Base de Datos.
      </div>';
  }

  if (!$bddatos) {
       echo '<div class="alert alert-warning">
         <a href="#" class="close" data-dismiss="alert">&times</a>
         <strong>Ups!</strong> No se pude seleccionar Base de Datos.
       </div>';
  }

?>
