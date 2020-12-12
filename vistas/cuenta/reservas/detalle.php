<?php
    include "global.php";
    include_once F_PETICION;
    ValidarLogin();
    ValidarRol(5);
    ValidarGet('idres');
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
$resultado = peticion_http('http://turismoreal.xyz/api/reserva/'.$_GET['idres'],'GET','',$_COOKIE['token'],CLASE_RESERVA);

switch($resultado['statusCode']){
    case 200:
        
        $r = $resultado['contenido'];
        $d = (peticion_http('http://turismoreal.xyz/api/departamento/'.$r->Id_depto,'GET','','',CLASE_DEPARTAMENTO))['contenido'];
        $e = (peticion_http('http://turismoreal.xyz/api/estadoreserva/'.$r->Id_estado,'GET','',$_COOKIE['token'],CLASE_ESTADORESERVA))['contenido'];
echo'<div class="container  vh" style="margin-top:100px">';
    echo'    <div class="row border p-5">
                <div class="col-xs-12 col-lg-12 ">
                    <H3>Datos Reserva</H3>
                    <div class="row ">
                        <div class="col-xs-12 col-lg-12 border pt-2">
                            <p>Numero Reserva: '.$r->Id_reserva.'</p>
                            <p>Fecha Inicio Estadia: '.date("d/m/Y",strtotime($r->Inicio_estadia)).'</p>
                            <p>Fecha Termino Estadia: '.date("d/m/Y",strtotime($r->Fin_estadia)).'</p>
                            <p>Nombre Departamento '.$d->Nombre.'</p>
                            <a  class="btn btn-primary text-right">Agregar Acompañante</a>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-12 mt-4">
                    <h3>Pagos</h3>
                    <div class="row">
                        <div class="col-xs-12 col-lg-12 border pt-2">
                            <p>Valor pagado: '.$r->Valor_pagado.'</p>
                            <p class="border-bottom">Numero de pagos: '.$r->N_pago.' </p>
                            <p>Pago Total: '.$r->Valor_total.'</p>
                            
                        </div>
                        <a href="'.RESERVAS.'/index.php" class="btn btn-primary">Volver</a>
                        ';
                   
        echo'</div>
            </div>
        </div>
    </div>';
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