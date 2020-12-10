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
$resultado = peticion_http('http://turismoreal.xyz/api/reserva','GET','',$_COOKIE['token'],LISTA_RESERVA);



?>

<div class="container vh">
    <div class="row">
        <div class="col-lg-12 col-xs-12 border m-2">
            <div class="row m-1 py-2">
                <div class="col-xs-12 col-lg-4">
                    <h2>Reserva 1</h2>
                </div>
                <div class="col-xs-12 col-lg-4 font-weight-bold">
                    
                    <h6 class="font-weight-bold">Nombre departramento: colonmbia</h6>
                    <h6 class="font-weight-bold">Estado: Susio</h6> 
                </div>
                <div class="col-xs-12 col-lg-4 text-right">
                    <button class="btn btn-primary">Ver detalles</button> 
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