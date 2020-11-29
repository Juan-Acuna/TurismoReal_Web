<?php
    include_once 'global.php';
?>
<html >
  <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Turismo Real</title>
        <link rel="icon" type="image/x-icon" href="<?php echo ASSETS;?>/img/cropped-favicon-tr.ico"  />
        
        <!-- Font Awesome icons (free version)-->
        
        <!-- Google fonts-->

        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
  </head>
  <body class="bg-white">
  <?php

include "../../assets/includes/navbar.php";

?>
    <div class="container bg-white"style="margin-top:100px">
        <div class="row text-center">
            <div class="col-12 mt-5">
                <h3>Esperando confirmacion del cliente</h3>
            </div>
            <div class="col-12">
                <img src="../../assets/img/loading.gif" alt="">
            </div>
        </div>
    </div>

    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>

  </body>
</html>
