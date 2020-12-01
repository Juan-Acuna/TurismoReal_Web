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
<div class="container" style= "margin-top:100px">
        <H2>Notificaciones</H2>
        <div class="row ">

            <div class="col-lg-12 border m-2  ">
                
                <div class="row  m-1 py-2 ">
                    <div class="col-lg-6 col-xs-12  ">
                    <p class="h2">Notificacion 1</p>
                    </div>
                    <div class="col-lg-6 col-xs-12 text-right">

                        <a href="'.DEPTOS.'/reservar.php?depaid='.$depto['id_depto'].'" class="btn btn-primary">Detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 border m-2">
                
                <div class="row  m-1 py-2 ">
                    <div class="col-lg-6 col-xs-12">
                    <h2>Notificacion 1</h2>
                    </div>
                    <div class="col-lg-6 col-xs-12 text-right">

                        <a href="'.DEPTOS.'/reservar.php?depaid='.$depto['id_depto'].'" class="btn btn-primary">Detalles</a>
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