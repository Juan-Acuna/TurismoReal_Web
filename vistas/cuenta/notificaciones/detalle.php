<?php
    include "global.php";
    include F_PETICION;
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
     <!-- Archivos CSS BOOTSTRAP 4 -->
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
</head>
<body>

<?php

include F_NAVBAR;
?>
    <div class="container" style="margin-top: 150px">
        <div class="row border p-2">
            <div class="col-xs-12 col-lg-12 mt-2">
                <h2>Detalle Notificacion</h2>
            </div>
            <div class="col-xs-12 col-lg-12 mb-2 ">
                <div class="row">
                    <div class="col-xs-12 col-lg-9 mb-5">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, nemo quidem aliquid error rem necessitatibus commodi omnis aut provident dolor, dicta laboriosam? Sit hic similique commodi consequuntur ipsum nostrum libero?</p>

                    </div>
                    <div class="col-xs-12 col-lg-3 align-self-end">
                    <button class="btn btn-primary">Volver</button>
                    <button class="btn btn-primary">Ir al Sitio</button>
                    
                    </div>
                </div>

            </div>
        </div>
    </div>
    




    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src=".<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>   
</body>
</html>