<?php
    include "global.php";
    include "../../../controladores/peticion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
</head>
<body>
<?php

include "../../../assets/includes/navbar.php";
?>



    <div class="container border" style="margin-top:100px">
        <div class="row m-2">
            <div class="col-xs-12 col-lg-12">
                <H3>Datos Reserva</H3>
                <div class="row">
                    <div class="col-xs-12 col-lg-12 border pt-2">
                        <p>Numero Reserva</p>
                        <p>Usuario</p>
                        <p>Fecha Inicio Estadia</p>
                        <p>Fecha Termino Estadia</p>
                        <p>Estado del Departamento</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12">
                <h3>Pagos</h3>
                <div class="row">
                    <div class="col-xs-12 col-lg-12 border pt-2">
                        <p>Valor pagado</p>
                        <p>Check-in</p>
                        <p>Check-out</p>
                        <p>Multa Total</p>
                        <p>Pago Multa</p>
                        <p>Pagos</p>
                        <p class="border-bottom">Numero de pagos</p>
                        <p>Pago Total</p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>













    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>