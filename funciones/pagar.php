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
                $res = peticion_http('http://turismoreal.xyz/api/transaccion'.$reserva['id_reserva'],'GET','',$_COOKIE['token']);
                $pagos=1;
                $pagos2=1;
                $n=round($total/2);
                $n2=$total-$n;
                if($n>50000){
                    do{
                        $r=$n-(50000*$pagos);
                        $pagos = $pagos + 1;
                    }while($r>50000);
                    if($n2>50000){
                        do{
                            $r=$n2-(50000*$pagos2);
                            $pagos2 = $pagos2 + 1;
                        }while($r>50000);
                    }
                }

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