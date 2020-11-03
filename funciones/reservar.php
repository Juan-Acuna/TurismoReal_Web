<?php
include_once 'global.php';

include "../../funciones/peticion.php";

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
            'Inicio_estadia'=>date('YYY-MM-DD',strtotime($j['estadia']['inicio'])),
            'Fin_estadia'=>date('YYY-MM-DD',strtotime($j['estadia']['fin'])),
            'Username'=>$_COOKIE['username'],
            'Id_depto'=>$j['id_depto']
        );
        $res = peticion_http('http://turismoreal.xyz/api/reserva','POST',$body,$_COOKIE['token']);
        if($res['statusCode']==200){
            
        }
    }
}
?>