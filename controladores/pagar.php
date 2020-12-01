<?php
include_once 'global.php';
include "peticion.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        switch($_POST['act']){
            case 'pay'://KHIPU
                if($_POST['origen']=='web'){
                    $apagar=0;
                    $dep = json_decode($_POST['depto'],true);
                    $reserva = json_decode($_POST['reserva'],true);
                    $servs= json_decode($_POST['servicios'],true);
                    $total = 0;
                    $res = peticion_http('http://turismoreal.xyz/api/reserva/'.$reserva['id_reserva'],'GET','',$_COOKIE['token']);
                    if($res['statusCode']==200){
                        if($res['contenido']['id_estado']==1){
                            $dep = peticion_http('http://turismoreal.xyz/api/departamento/'.$res['contenido']['id_depto']);
                            if($dep['statusCode']==200){
                                $total=$res['contenido']['valor_total'];
                                $n=round($total/2);
                                if($n>50000){
                                    if((round($res['contenido']['pagos']/2)%2)!=0){
                                        $apagar = round($total-(($res['contenido']['pagos']-1)*50000));
                                    }else{
                                        $apagar=round($total/$res['contenido']['pagos']);
                                    }
                                }else{
                                    $apagar=$n;
                                }
                                if($apagar<0){
                                    $apagar=$apagar*-1;
                                }
                                $transaccion = array(
                                    "Monto"=>$apagar,
                                    "Comentario"=>"Arriendo Depto. ".$dep['contenido']['nombre']."(Pago 1/".(round($res['contenido']['pagos']/2)).")",
                                    "Username"=>$_COOKIE['username'],
                                    "Id_reserva"=>$reserva['id_reserva'],
                                    "Id_medio"=>1,
                                    "Id_tipo"=>1
                                );
                                var_dump($transaccion);
                                $r=array();
                                $pago = peticion_http('http://turismoreal.xyz/api/transaccion','POST',$transaccion,$_COOKIE['token']);
                                if($pago['statusCode']==200){
                                    var_dump($servs); echo'<br><br>';
                                    foreach($servs as $s){
                                        $pet = peticion_http('http://turismoreal.xyz/api/servicio/contratar/'.$reserva['id_reserva'].'.'.$s['id_servicio'],'POST','',$_COOKIE['token']);
                                        array_push($r,$pet);
                                    }
                                    var_dump($r);
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
                }else{
                    $respuesta = peticion_http('http://turismoreal.xyz/api/transaccion/notificar/'.$_POST['token_ws'],'POST');
                    $r = $respuesta['contenido'];
                    if($respuesta['statusCode']==200){
                        echo '<!DOCTYPE html>
                                <html lang="es">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <title>Procesando pago...</title>
                                </head>
                                <body>
                                    <form action="'.$r['url'].'" method="POST" name="ff" style="display:none;">
                                        <input type="hidden" name="token_ws" value="'.$_POST['token_ws'].'">
                                    </form>
                                    <script>
                                        window.localStorage.clear();
                                        window.localStorage.setItem("codigo",'.$r['codigo'].');
                                        window.localStorage.setItem("monto",'.$r['monto'].');
                                        window.localStorage.setItem("auth",'.$r['auth'].');
                                        //SE PUEDEN AGREGAR MAS DATOS DESDE LA TRANSACCION
                                        document.forms["ff"].submit();
                                    </script>
                                </body>
                            </html>';
                        die();
                    }
                }
                
            break;
        }
    break;
    case 'GET':
        switch($_GET['act']){
            case 'cancel'://AMBOS
                $r = peticion_http('http://turismoreal.xyz/api/reserva/'.$_GET['rs'],'DELETE','',$_COOKIE['token']);
                if($r['statusCode']==200){
                    header('Location: '.DEPTOS.'/');
                    die();
                }
            break;
            case 'pay'://WEBPAY
                //PARA PAGAR Y CUANDO YA PAGO
                if($_GET['origen']=='web'){
                    $dep = json_decode($_GET['depto'],true);
                    $reserva = json_decode($_GET['reserva'],true);
                    $servs= json_decode($_GET['servicios'],true);
                    $res = peticion_http('http://turismoreal.xyz/api/reserva/'.$reserva['id_reserva'],'GET','',$_COOKIE['token']);
                    if($res['statusCode']==200){
                        if($res['contenido']['id_estado']==1){
                            $dep = peticion_http('http://turismoreal.xyz/api/departamento/'.$res['contenido']['id_depto']);
                            if($dep['statusCode']==200){
                                $total=$res['contenido']['valor_total'];
                                $apagar=round($total/2);
                                if($apagar<0){
                                    $apagar=$apagar*-1;
                                }
                                $transaccion = array(
                                    "Monto"=>$apagar,
                                    "Comentario"=>"Arriendo Depto. ".$dep['contenido']['nombre']."(Pago 1/1).",
                                    "Username"=>$_COOKIE['username'],
                                    "Id_reserva"=>$reserva['id_reserva'],
                                    "Id_medio"=>2,
                                    "Id_tipo"=>1
                                );
                                $r=array();
                                $pago = peticion_http('http://turismoreal.xyz/api/transaccion','POST',$transaccion,$_COOKIE['token']);
                                if($pago['statusCode']==200){
                                    foreach($servs as $s){
                                        $pet = peticion_http('http://turismoreal.xyz/api/servicio/contratar/'.$reserva['id_reserva'].'.'.$s['id_servicio'],'POST','',$_COOKIE['token']);
                                        array_push($r,$pet);
                                    }
                                        echo '<!DOCTYPE html>
                                        <html lang="es">
                                        <head>
                                            <meta charset="UTF-8">
                                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                            <title>Procesando pago...</title>
                                        </head>
                                        <body>
                                            <script>
                                            window.onload = function(){
                                                document.forms["ff"].submit();
                                            }
                                            </script>
                                            <form action="'.$pago['contenido']['url'].'" method="POST" name="ff" style="display:none;">
                                                <input type="hidden" name="token_ws" value="'.$pago['contenido']['token'].'">
                                            </form>
                                        </body>
                                        </html>';
                                    die();
                                }else{
                                    echo 'Error en transaccion';
                                    echo $pago['statusText'].' - ';
                                    var_dump($pago['contenido']);
                                }  
                            }  
                        }/*else if($res['contenido']['id_estado']==2){
                            $res = peticion_http('http://turismoreal.xyz/api/reserva/'.$_GET['id_reserva'],'GET','',$_COOKIE['token']);
                            if($res['statusCode']==200){

                            }
                        }*/
                    }
                }else{
                    
                }
                
            break;
            case 'commit'://WEBPAY
                //CONFIRMAR PAGO
                echo '<!DOCTYPE html>
                    <html lang="es">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Procesando pago...</title>
                        </head>
                        <body>
                            <form action="'.DEPTOS.'/pagado.php" method="POST" name="ff" style="display:none;">
                                <input type="hidden" name="in1" id="inpt1">
                                <input type="hidden" name="in2" id="inpt2">
                                <input type="hidden" name="in3" id="inpt3">
                            </form>
                            <script>
                                document.getElementById("inpt2").value = window.localStorage.getItem("codigo");
                                document.getElementById("inpt3").value = window.localStorage.getItem("monto");
                                document.getElementById("inpt4").value = window.localStorage.getItem("auth");
                                //SE PUEDEN AGREGAR MAS DATOS DESDE LA TRANSACCION
                                window.localStorage.clear();
                                document.forms["ff"].submit();
                            </script>
                        </body>
                    </html>';
                die();
            break;
            case 'repay'://KHIPU
                $apagar=0;
                $res = peticion_http('http://turismoreal.xyz/api/reserva/'.$_GET['rs'],'GET','',$_COOKIE['token']);
                if($res['statusCode']==200){
                    $dep = peticion_http('http://turismoreal.xyz/api/departamento/'.$res['contenido']['id_depto']);
                    $total = $res['contenido']['valor_total'];
                    $pagado=$res['contenido']['valor_pagado'];
                    $pagos=$res['contenido']['pagos'];
                    $n_pagos=$res['contenido']['n_pagos'];
                    if($total>$pagado){
                        if(!($n_pagos>=round($pagos/2))){
                            if((round($pagos/2)%2)!=0){
                                $p = round($total-(($pagos-1)*50000));
                            }else{
                                $p = round($total/$pagos);
                            }
                            $apagar=($total-$p)/($pagos-1);
                            $transaccion = array(
                                "Monto"=>$apagar,
                                "Comentario"=>"Arriendo Depto. ".$dep['contenido']['nombre']."(Pago ".($n_pagos+1)."/".round($pagos/2).").",
                                "Username"=>$_COOKIE['username'],
                                "Id_reserva"=>$res['contenido']['id_reserva'],
                                "id_medio"=>1,
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