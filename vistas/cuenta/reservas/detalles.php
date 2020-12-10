<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';;
    include_once F_PETICION;
    ValidarLogin();
    ValidarRol(5);
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <?php include F_HEAD;?>
</head>
<body>
<?php
include F_NAVBAR;
?>
    <div class="container  vh" style="margin-top:100px">
        <div class="row border p-5">
            <div class="col-xs-12 col-lg-12 ">
                <H3>Datos Reserva</H3>
                <div class="row ">
                    <div class="col-xs-12 col-lg-12 border pt-2">
                        <p>Numero Reserva</p>
                        <p>Fecha Inicio Estadia</p>
                        <p>Fecha Termino Estadia</p>
                        <p>Nombre Departamento</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 mt-4">
                <h3>Pagos</h3>
                <div class="row">
                    <div class="col-xs-12 col-lg-12 border pt-2">
                        <p>Valor pagado</p>
                        <p class="border-bottom">Numero de pagos</p>
                        <p>Pago Total</p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <?php include F_FOOTER;?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>