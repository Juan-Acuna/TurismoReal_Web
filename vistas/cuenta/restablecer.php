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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
</head>
<body class="fotitio">
<?php
include F_NAVBAR;
?>
    <form class="formulariorecuperar" style="background-color:transparent" method="GET" action="<?php echo FUNCIONES;?>/restablecer.php">
        <h1 class="text-center mb-4 display-4 text-primary">Restablece tu contraseña</h1>
         <div class="container contenedor text-center col-xs-12  col-md-5 col-lg-4">
                <div class="row  text-center justify-content-center">
                    <div class="col-xs-12">
                    <h3 style="color:white">Ingresa una nueva contraseña</h3>
                    <input class="form-control" type="password" name="password" placeholder="Ingresa tu Contraseña">
                    <input type="hidden" name="origen" value="web">
                    </div>
                </div>
             <input class="btn btn-primary mt-3" type="submit" value="Restablecer Contraseña" class="button">
         </div>
    </form>
    <?php include F_FOOTER;?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>
