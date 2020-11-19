<!DOCTYPE html>
<html lang="en">
    <head>
<?php
    include_once 'global.php';
?>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Turismo Real</title>
        <link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
        
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo CSS;?>/styles.css" rel="stylesheet" />
        <link href="<?php echo CSS;?>/stylish-portfolio.min.css" rel="stylesheet">
        <!--<link rel="stylesheet" href="./fonts/icomoon/style.css">-->
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap-datepicker.css">
    <!--<link rel="stylesheet" href="../../fonts/flaticon/font/flaticon.css">-->
    <link rel="stylesheet" href="<?php echo CSS;?>/aos.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/style.css">   
        <link href="<?php echo CSS;?>/stylish-portfolio.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="<?php echo CSS;?>/miperfil.css"> 
    </head>
    <body >

    <?php
      include "../../includes/navbar.php";
      include "../../funciones/peticion.php";


      if(isset($_COOKIE['token'])){
        $resultado = peticion_http('http://turismoreal.xyz/api/usuario/'.$_COOKIE['username'],'GET','',$_COOKIE['token']);
        if($resultado['statusCode']==200){
        $p=$resultado['contenido']['persona'];
        $u=$resultado['contenido']['usuario'];
        echo  '<header class="perfil">
              <div class="container">
              <h2>Mis Datos</h2><br>
              <form class="form-horizontal">
                      
              <div class="form-group">
              <h4 class="col-sm-5 control-label">Nombre Completo</h4>
              <div class="col-sm-10">
              <h6 class="form-control-static ">'.$p['nombres'].' '.$p['apellidos'].'</h6>
              </div>
              </div>
              <div class="form-group">
              <h4 class="col-sm-5 control-label">Rut</h4>
              <div class="col-sm-10">
              <h6 class="form-control-static">'.$p['rut'].'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Email</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p['email'].'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Contraseña</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">********</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Fecha Nacimiento</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.date("d/m/Y",strtotime($p['nacimiento'])).'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Direccion</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p['direccion'].'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Region</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p['region'].'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Comuna</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p['comuna'].'</h6>
              </div>
            </div>
            
              <div style="text-align:justify!important  ;display:inline;margin-right:5px;">
                <a class="btn btn-primary btn-xxl text-uppercase" style="display:inline-block;" href="'.CUENTAS.'/editar.php">Editar perfil</a>
              
                <a class="btn btn-primary btn-xxl text-uppercase" style="display:inline-block" href="'.VISTAS.'/">Volver</a>
            
              </div>
            </form>
              </div>
            </div>
                  </div><br><br><br><br><br>
              </header>';
        }
      } 
    ?>

<script src="<?php echo BOOSTRAP;?>/jquery/jquery.min.js"></script>
  <script src="<?php echo BOOSTRAP;?>/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php echo BOOSTRAP;?>/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for this template -->
  <script src="<?php echo JS;?>/stylish-portfolio.min.js"></script>
  <!-- Bootstrap core JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <!-- Contact form JS-->
  <script src="<?php echo ASSETS;?>/mail/jqBootstrapValidation.js"></script>
  <script src="<?php echo ASSETS;?>/mail/contact_me.js"></script>
  <!-- Core theme JS-->
  <script src"<?php echo JS;?>/scripts.js"></script>
    </body>
</html>
