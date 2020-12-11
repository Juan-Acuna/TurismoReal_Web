<?php
    include "global.php";
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
$resultado = peticion_http('http://turismoreal.xyz/api/reserva/usuario/'.$_COOKIE['username'],'GET','',$_COOKIE['token'],LISTA_RESERVA);

switch($resultado['statusCode']){
    case 200:
        echo '<div class="container vh">
        <div class="row">
            <div class="col-lg-12 col-xs-12  m-2">';
            foreach($resultado['contenido'] as $item){
                $d = (peticion_http('http://turismoreal.xyz/api/departamento/'.$item->Id_depto,'GET','','',CLASE_DEPARTAMENTO))['contenido'];
                $e = (peticion_http('http://turismoreal.xyz/api/estadoreserva/'.$item->Id_estado,'GET','',$_COOKIE['token'],CLASE_ESTADORESERVA))['contenido'];

              echo'<div class="row border m-2 py-2">
                        <div class="col-xs-12 col-lg-4">
                            <h2> ID '.$item->Id_reserva.'</h2>
                        </div>
                        <div class="col-xs-12 col-lg-4 font-weight-bold">
                            
                            <h6 class="font-weight-bold">Nombre Departamento: '.$d->Nombre.'</h6>
                            <h6 class="font-weight-bold">Estado: '.$e->Nombre.'</h6> 
                        </div>
                        <div class="col-xs-12 col-lg-4 text-right">
                            <a href="'.RESERVAS.'/detalle.php?idres='.$item->Id_reserva.'" class="btn btn-primary">Ver detalles</a> 
                        </div>            
                </div>'; 
            }
    echo  ' </div>
        </div>
    </div>';
    break;
    case 400:
        MostrarError(ERROR_DATOS);
    break;
    case 500:
        MostrarError(ERROR_SERVIDOR);
    break;
    default:
        MostrarError(ERROR_CONEXION);
    break;
}



?>


    <?php include F_FOOTER;?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>