<?php
include_once 'global.php';

include "peticion.php";

if(isset($_POST['json']) && isset($_COOKIE['token'])){
    $j = json_decode($_POST['json'],true);
    $total=0;
    $dep = peticion_http('http://turismoreal.xyz/api/departamento/'.$j['id_depto']);
    if($dep['statusCode']==200){
        foreach($j['servicios'] as $s){
            $res = peticion_http('http://turismoreal.xyz/api/servicio'.$s['id_servicio']);
            if($res['statusCode']==200){
                $total = $total + ($res['contenido']['valor']*$s['cupos']);
            }
        }
        $total = $total + ($dep['contenido']['arriendo'] * $j['estadia']['dias']);
        $body = array(
            'Valor_total'=>$total,
            'Inicio_estadia'=>$j['estadia']['inicio'],
            'Fin_estadia'=>$j['estadia']['fin'],
            'Username'=>$_COOKIE['username'],
            'Id_depto'=>$j['id_depto'],
            'Id_tipo'=>1
        );
        $reserva = peticion_http('http://turismoreal.xyz/api/reserva','POST',$body,$_COOKIE['token']);
        if($reserva['statusCode']==200){
            $transaccion = array(
                "Monto"=>round($total/4),
                "Comentario"=>"Arriendo Depto. ".$dep['contenido']['nombre'].".",
                "Username"=>$_COOKIE['username'],
                "Id_reserva"=>$reserva['contenido']['id_reserva']
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
        }else{
            echo 'Error en reserva';
            echo $reserva['statusText'].' - ';
            var_dump($reserva['contenido']);
        }
    }else{
        echo 'Error en depto';
        echo $dep['statusText'].' - ';
        var_dump($dep['contenido']);
    }
}else if(isset($_GET['cancel'])){
    $r = peticion_http('http://turismoreal.xyz/api/reserva/'.$_GET['cancel'],'DELETE','',$_COOKIE['token']);
    if($r['statusCode']==200){
        header('Location: '.DEPTOS.'/');
        die();
    }else{
        header('Location: '.CUENTA.'/miperfil.php');
        die();
    }
}
?>