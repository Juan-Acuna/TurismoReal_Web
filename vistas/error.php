<?php include_once 'global.php';
if($_SERVER['REDIRECT_STATUS']==404){
    MostrarError(ERROR_404);
}
ValidarGet('codigo-error','source');
$codigo = $_GET['codigo-error'];

echo '<!DOCTYPE html>
<html lang="es">
<head>';
include F_HEAD;
echo '</head>
<body>';
include F_NAVBAR;
$t = '502. Ha ocurrido un error';
$d = 'El servidor ha encontrado un error temporal y no puede responder a tu petición';
$s = 'Solución: ninguna';
switch($codigo){
    case ERROR_PETICION:
    break;
    case ERROR_404:
    break;
    case ERROR_CONEXION:
    break;
    case ERROR_DATOS:
    break;
    case ERROR_ROL:
    break;
    case ERROR_SERVIDOR:
    break;
    case ERROR_SESION:
    break;
}
echo '<div class="container vh">
        <div class="row">
        <div class="h1 col-sm-12 col-lg-6">'.$t.'</div> 
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="col-sm-12">'.$d.'</div>
                <div class="col-sm-12">'.$s.'</div>
                </div>
            <img class="col-sm-12 col-md-6" src="<?php echo IMG;?>/fotoerror.jpg" height="400px" alt=""/>
        </div>
    </div>';
    include F_FOOTER;?>
        <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
        <script src="<?php echo JS;?>/popper.min.js"></script>
        <script src="<?php echo JS;?>/bootstrap.min.js"></script>
    </body>
</html>