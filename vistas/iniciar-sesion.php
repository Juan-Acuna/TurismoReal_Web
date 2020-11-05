<?php
    include_once 'global.php';
    $b=false;
    $d='';
    if(isset($_COOKIE['error']))
        {
            $b=true;
            $d=$_COOKIE['error'];
            setcookie('error', '', time()-3600,  '/');
        }

    echo '
    <!DOCTYPE html>
    <html lang="en" xmlns:th="http://www.thymeleaf.org/%22%3E
    <head>';
?>
    <title>Turismo Real</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >

    <!-- Nuestro css-->
    <link href="<?php echo CSS;?>/styles.css" rel="stylesheet"  >
    <link href="<?php echo CSS;?>/stylish-portfolio.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>/iniciosesion.css" th:href="@{<?php echo CSS;?>/iniciosesion.css}">
    <link href="./fonts/icomoon/style.css" rel="stylesheet">
    <link href="<?php echo CSS;?>/bootstrap.min.css"  rel="stylesheet">
    <link href="<?php echo CSS;?>/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo CSS;?>/owl.carousel.min.css"  rel="stylesheet">
    <link href="<?php echo CSS;?>/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo CSS;?>/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo CSS;?>/jquery.fancybox.min.css"  rel="stylesheet">
    <link href="<?php echo CSS;?>/bootstrap-datepicker.css" rel="stylesheet">
    <link href="../fonts/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="<?php echo CSS;?>/aos.css" rel="stylesheet">
   
    

</head>


<body class="fotitio">
<?php
        include "../includes/navbar.php";
    ?>
    <form class="formularioiniciosesion " style="background-color:transparent" method="POST" action="<?php echo FUNCIONES;?>/iniciarsesion.php">
    
        <h1 style="color:white">Login</h1>
         <div class="contenedor">

             <div >
             <input type="text" name="usuario" placeholder="Usuario">
             
             </div>
             <div >

             <input type="password" name="password" placeholder="Clave">
             </div>
             <?php
                if($b)
                {
                    echo '<span id="msjerror" >'.$d.'</span>';
                }
                ?>
             <input type="submit" value="Login" class="button">

             <p style="color:white">¿Olvidaste tu clave? <a class="link" href="<?php echo CUENTA;?>/recuperar.php" style="color:white">Recuperar </a></p>
             
             <p style="color:white">¿No tienes una cuenta? <a class="link" href="<?php echo CUENTA;?>/registrarse.php" style="color:white">Regístrate </a></p>
         </div>
    </form>

    <script src="<?php echo jS;?>/jquery-3.3.1.min.js"></script>
  <script src="<?php echo jS;?>/jquery-ui.js"></script>
  <script src="<?php echo jS;?>/popper.min.js"></script>
  <script src="<?php echo jS;?>/bootstrap.min.js"></script>
  <script src="<?php echo jS;?>/owl.carousel.min.js"></script>
  <script src="<?php echo jS;?>/jquery.countdown.min.js"></script>
  <script src="<?php echo jS;?>/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo jS;?>/jquery.easing.1.3.js"></script>
  <script src="<?php echo jS;?>/aos.js"></script>
  <script src="<?php echo jS;?>/jquery.fancybox.min.js"></script>
  <script src="<?php echo jS;?>/jquery.sticky.js"></script>

  
  <script src="<?php echo jS;?>/main.js"></script>
    
</body>
</html>
