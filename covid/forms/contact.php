<?php
error_reporting(0);
//if (isset($_POST['enviarC']) && $_POST['enviarC'] == "on") {


 $nombre = $_POST['name'];
  $email = $_POST['email'];
$mensaje = $_POST['message'];
$subject = $_POST['subject'];

var_dump($nombre);
var_dump($email);
var_dump($mensaje);
var_dump($subject);

$body = "<html>
          <head>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            <title></title>
          </head>
          <body>
            <h1>Hola ! $nombre ha escrito una petición desde el sitio de COVID-19 Información</h1>
            <h2 style='color:#fa180c;'><b>$nombre dice lo siguiente</b></h2>
            <p style='color: #fa180c;'><h3>$mensaje</h3><br><br></p>
            <hr>
          </body>
        </html>";

  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $headers .= "From: Daniel <danielrg841@gmail.com>\r\n";


  if (mail($email,$subject,$body,$headers)) {
    echo "<div class='alert alert-form alert-success text-xs-center'>
       <a href='#' class='close' data-dismiss='alert'>&times;</a>
       <center><strong>Wow! $nombre</strong> Tu correo se ha enviado correctamente.<br>Esperamos que esto te haya gustado!</center>
    </div>";

  }else {
    echo "<div class='alert alert-form alert-danger text-xs-center'>
       <a href='#' class='close' data-dismiss='alert'>&times;</a>
       <strong>Ups! $nombre</strong> no fue posible enviar el correo, por favor contacta al administrador.
    </div>";
  }

?>
