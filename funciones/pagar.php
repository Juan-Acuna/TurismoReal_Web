<?php
include_once 'global.php';
include "peticion.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        switch($_POST['act']){
            case 'pay':
                $apagar=0;
                $dep = json_decode($_POST['depto'],true);
                $reserva = json_decode($_POST['reserva'],true);
                $total = 0;
                $res = peticion_http('http://turismoreal.xyz/api/reserva/'.$reserva['id_reserva'],'GET','',$_COOKIE['token']);
                if($res['statusCode']==200){
                    if($res['id_estado']==1){
                        $dep = peticion_http('http://turismoreal.xyz/api/departamento/'.$res['contenido']['id_depto']);
                        if($dep['statusCode']==200){
                            $total=$res['valor_total'];
                            $pagos=1;
                            $pagos2=1;
                            $n=round($total/2);
                            if((round($res['pagos']/2)%2)!=0){
                                $apagar = round($total-(($res['pagos']-1)*50000));
                            }else{
                                $apagar=round($total/$res['pagos']);
                            }
                            $transaccion = array(
                                "Monto"=>$apagar,
                                "Comentario"=>"Arriendo Depto. ".$dep['nombre']."(Pago 1).",
                                "Username"=>$_COOKIE['username'],
                                "Id_reserva"=>$reserva['id_reserva'],
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
                        }  
                    }else if($res['contenido']['id_estado']==2){

                    }
                    
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
                $apagar=0;
                $res = peticion_http('http://turismoreal.xyz/api/reserva/'.$_GET['rs'],'GET','',$_COOKIE['token']);
                if($res['statusCode']==200){
                    $total = $res['contenido']['valor_total'];
                    $pagado=$res['contenido']['valor_pagado'];
                    $pagos=$res['contenido']['pagos'];
                    $n_pagos=$res['contenido']['n_pago'];
                    if($total>$pagado){
                        if(!($n_pagos>=round($pagos))){
                            if((round($pagos/2)%2)!=0){
                                $p = round($total-(($pagos-1)*50000));
                            }else{
                                $p = round($total/$pagos);
                            }
                            $apagar=($total-$p)/($pagos-1);
                            $transaccion = array(
                                "Monto"=>$apagar,
                                "Comentario"=>"Arriendo Depto. ".$dep['contenido']['nombre']."(Pago ".($n_pagos+1).").",
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
                        }
                    }
                }
            break;
        }
    break;
}
?>