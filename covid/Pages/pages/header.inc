<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-sm-6" style="text-align:center;">
        <div class="logo container">
          <br>
          <img src="../../assets/img/logo.png" style="width:65px;"></img>
        </div>
      </div>
      <div class="col-sm-6" style="text-align:center;">
        <a href="#sesion" data-toggle="collapse">
          <div class="logo container">
            <br>
            <img class="imgRedonda" src="../../assets/img/usuarios/<?php echo $_SESSION['datos_usuario'][5];?>" style="width:65px;"></img><br>
          </div>
        </a>
        <div id="sesion" class="collapse col-md-12">
          <h6><b><a style="color:#631817;" href="<?php echo $_SERVER['PHP_SELF']; ?>?op=salir">Cerrar Sesión</a></b></h6>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12" style="text-align:center;">
        <h6><b><span class="blue">Bienvenid@: <?php echo $_SESSION['datos_usuario'][1];?></span></b></h6>
      </div>
    </div>
  </div>
</div>
<br>
