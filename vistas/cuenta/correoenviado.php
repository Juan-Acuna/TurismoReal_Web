<?php
    include "global.php";
    include_once F_PETICION;
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<!DOCTYPE html>
<html lang="es" xmlns:th="http://www.thymeleaf.org">
<head>
<?php include F_HEAD;?>
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
    <?php include F_FOOTER;?>
</body>
</html>
