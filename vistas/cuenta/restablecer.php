<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <title>Turismo Real</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >

    <!-- Nuestro css-->
    <link href="<?php echo CSS;?>/styles.css" rel="stylesheet"  >
    <link href="<?php echo CSS;?>/stylish-portfolio.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>/recuperar.css" th:href="@{<?php echo CSS;?>/recuperar.css}">
    <!--<link href="./fonts/icomoon/style.css" rel="stylesheet">-->
    <link href="<?php echo CSS;?>/bootstrap.min.css"  rel="stylesheet">
    <link href="<?php echo CSS;?>/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo CSS;?>/owl.carousel.min.css"  rel="stylesheet">
    <link href="<?php echo CSS;?>/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo CSS;?>/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo CSS;?>/jquery.fancybox.min.css"  rel="stylesheet">
    <link href="<?php echo CSS;?>/bootstrap-datepicker.css" rel="stylesheet">
    <!--<link href="../fonts/flaticon/font/flaticon.css" rel="stylesheet">-->
    <link href="<?php echo CSS;?>/aos.css" rel="stylesheet">
   
    

</head>


<body class="fotitio">
<?php
        include "../../includes/navbar.php";
    ?>
    <form class="formulariorecuperar" style="background-color:transparent" method="GET" action="<?php echo FUNCIONES;?>/restablecer.php">
    
        <h1 style="color:white">Restablece tu contraseña</h1>
        
         <div class="contenedor">
                <div>
                    <h3 style="color:white">Ingresa una nueva contraseña</h3>
                    <input type="password" name="password" placeholder="Ingresa tu Contraseña">
                    <input type="hidden" name="origen" value="web">

                </div>

             <input type="submit" value="Restablecer Contraseña" class="button">
         </div>
    </form>

    <script src="<?php echo JS;?>/jquery-3.3.1.min.js"></script>
  <script src="<?php echo JS;?>/jquery-ui.js"></script>
  <script src="<?php echo JS;?>/popper.min.js"></script>
  <script src="<?php echo JS;?>/bootstrap.min.js"></script>
  <script src="<?php echo JS;?>/owl.carousel.min.js"></script>
  <script src="<?php echo JS;?>/jquery.countdown.min.js"></script>
  <script src="<?php echo JS;?>/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo JS;?>/jquery.easing.1.3.js"></script>
  <script src="<?php echo JS;?>/aos.js"></script>
  <script src="<?php echo JS;?>/jquery.fancybox.min.js"></script>
  <script src="<?php echo JS;?>/jquery.sticky.js"></script>

  
  <script src="<?php echo JS;?>/main.js"></script>
    
</body>
</html>
