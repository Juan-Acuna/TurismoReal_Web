<?php
    include "global.php";
    include "../../controladores/peticion.php";
    $rol=$_COOKIE['rol'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Turismo Real</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="<?php echo JS;?>/api_turismoreal.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
   
    

</head>


<body class="fotitio">
<?php

include "../../assets/includes/navbar.php";

?>
    <form class="formulariorecuperar" style="background-color:transparent" method="POST" action="<?php echo FUNCIONES;?>/recuperar.php">
        
        <div class="row text-center justify-content-center ">
        <div class="contenedor text-center col-xs-12  col-md-5 col-lg-4" >
        <h1 class="text-primary text-center mb-4 display-4">Recupera tu clave</h1>
        <h3 style="color:white">Te enviaremos un correo para que puedas restablecer tu clave</h3>
            <input class="form-control mb-3" type="text" name="email" placeholder="Email" />

            <input class="btn btn-primary btn-lg my-3" type="submit" value="Recuperar" class="button">
            <p class="text-primary">¿Recordaste la contraseña?<a style="text-decoration:none" class="link" href="<?php echo VISTAS;?>/iniciar-sesion.php"> Iniciar Sesion</a></p>
    </div>    
        </div>
        
    </form>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>

    
</body>
</html>
