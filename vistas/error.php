<?php include_once 'global.php'?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo real</title>
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
</head>
<body>
<?php include F_NAVBAR;?>
    <div class="container vh">
        <div class="row">
            <div class="h1 col-sm-12 col-lg-6">502. Ha ocurrido un error</div> 
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="col-sm-12">El servidor ha encontrado un error temporal y no puede responder a tu petición</div>
                <div class="col-sm-12">Solución: ninguna</div>
            </div>
            <img class="col-sm-12 col-md-6" src="<?php echo IMG;?>/fotoerror.jpg" height="400px" alt="" />
        </div>
    </div>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
        <script src="<?php echo JS;?>/popper.min.js" ></script>
        <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
        <?php include F_FOOTER;?>
    </body>
</html>