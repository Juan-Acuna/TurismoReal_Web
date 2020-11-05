<?php
include_once 'global.php';
include "peticion.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        switch($_POST['act']){
            case 'pay':
                $dep = json_decode($_POST['depto'],true);
                $reserva = json_decode($_POST['reserva'],true);
                $total = intval($_POST['total']);
                if()
                $transaccion = array(
                    "Monto"=>round($total/4),
                    "Comentario"=>"Arriendo Depto. ".$dep['contenido']['nombre'].".",
                    "Username"=>$_COOKIE['username'],
                    "Id_reserva"=>$reserva['contenido']['id_reserva'],
                    "Id_tipo"=>1
                );
                $pago = peticion_http('http://turismoreal.xyz/api/transaccion','POST',$transaccion,$_COOKIE['token']);
                if($pago['statusCode']==200){
                    header('Location: '.$pago['contenido']['payment_url']);
                    die();
                }else{
                    echo 'Error en transaccion';
                    echo $pago['statusText'].' - ';
                    var_dump($pago['contenido']);
                }
            break;
            case '':
                
            break;
        }
    break;
    case 'GET':
        switch($_GET['act']){
            case 'cancel':
                $r = peticion_http('http://turismoreal.xyz/api/reserva/'.$_GET['cancel'],'DELETE','',$_COOKIE['token']);
                if($r['statusCode']==200){
                    header('Location: '.DEPTOS.'/');
                    die();
                }
            break;
            case 'repay':
            break;
        }
    break;
}
?>