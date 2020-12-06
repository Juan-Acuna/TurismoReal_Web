<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    include_once F_PETICION;
    ValidarLogin();
    ValidarRol(1,4);
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<html >
  <head>
      <?php include F_HEAD;?>
  </head>
  <body class="bg-white">
  <?php
echo '<div disabled>';
include F_FAKE_NAVBAR;
echo '</div>';
?>
    <div class="container bg-white hv">
        <div class="row text-center">
            <div class="col-12 mt-5">
                <h3>Esperando confirmacion del cliente</h3>
            </div>
            <div class="col-12">
                <img src="<?php echo IMG;?>/loading.gif" alt="">
            </div>
        </div>
    </div>
    <?php include F_FOOTER;?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
  </body>
</html>
