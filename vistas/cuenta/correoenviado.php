<?php
    include "global.php";
    include F_PETICION;
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<!DOCTYPE html>
<html lang="es" xmlns:th="http://www.thymeleaf.org">
<head>
    <title>Turismo Real</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >

    <!-- Nuestro css-->
    <!--<link href="./fonts/icomoon/style.css" rel="stylesheet">-->
    <link href="<?php echo CSS;?>/bootstrap.min.css"  rel="stylesheet">
        <!-- Nuestro css-->
    <link href="<?php echo CSS;?>/estilos.css" rel="stylesheet"  >
   
    

</head>


<body class="fotitio">
<?php

include F_NAVBAR;

?>
    <div class="container">
        <div class="row">
            <div class="col">
            <h1 class="text-primary">CORREO ENVIADO</h1>
            <h3 class="text-primary">Te hemos enviado un correo para restablecer tu contraseña</h3>
            <p class="text-primary "><a class="link btn btn-primary" href="<?php echo VISTAS;?>/iniciar-sesion.php">Volver</a></p>

            </div>
        </div>
    </div>

    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
    
</body>
</html>
