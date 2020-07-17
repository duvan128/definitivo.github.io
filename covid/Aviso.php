<?php
include 'Pages/app/conexion.php';
if (isset($_GET['id'])) {
    $i = $_GET['id'];
		$id = base64_decode($i);
  }
	$where = "";
	$sql = "SELECT a.TituloA TituloA, a.DescripcionA DescripcionA, a.CategoriaA CategoriaA, a.TipoA TipoA, a.ImagenA ImagenA, a.FechaA FechaA, b.NombreU NombreU FROM tavisosnoticias a INNER JOIN tusuarios b ON a.IdUsuario = b.IDUsuario WHERE IDAvisos = '$id'";
	$resultado = $conexion->query($sql);
  $row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COVID-19 Info</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="logo">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,500,500i,600,600i,700,700i&subset=cyrillic" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: COVID-19 - v2.1.0
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-COVID-19/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<section id="hero3" class="d-flex flex-column align-items-center justify-content-center">
    <h1><?php echo $row['TituloA']; ?></h1>
    <a href="#about" class="btn-get-started scrollto"><i class="icofont-simple-down"></i></a>

  </section><!-- End Hero -->

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"> <img src="assets/img/logo.png" alt="Logotipo COVID-19"> <span>COVID-19 Info</span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Inicio</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <section id="about" class="about">
      <div class="container">
        <?php if ($row['TipoA'] == 'I') { echo "<center><img src='assets/img/avisosynoticias/".$row['ImagenA']."' style='width:70%; height:70%;'/></center>"; }else{ echo "<center><video controls src='assets/img/avisosynoticias/".$row['ImagenA']."' style='width:100%; height:100%;'></video></center>"; } ?>
          <br>
        <div class="row" style="text-align:center;">

          <div class="col-sm">
            Tipo de Noticia: <br> <b><?php echo $row['CategoriaA']; ?></b>
          </div>
          <div class="col-sm">
            Redacción: <br> <b><?php echo $row['NombreU']; ?></b>
          </div>
          <div class="col-sm">
            Fecha de Publicación: <br> <b><?php echo $row['FechaA']; ?></b>
          </div>
        </div>

    <div class="section-title h3">
      <br/>
      <h3><?php echo $row['DescripcionA']; ?></h3>
    </div>

    </main>

      <footer id="footer">
        <div class="container">
          <div class="copyright">
            &copy; Copyright <strong><span>COVID-19</span></strong>. Todos los derechos Reservados
          </div>
        </div>
      </footer><!-- End  Footer -->

      <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

      <script src="assets/vendor/jquery/jquery.min.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
      <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
      <script src="assets/vendor/counterup/counterup.min.js"></script>
      <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="assets/vendor/venobox/venobox.min.js"></script>
      <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>

  </body>



</html>
