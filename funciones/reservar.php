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
                echo $total;
            }
        }
        $total = $total + ($dep['contenido']['arriendo'] * $j['estadia']['dias']);
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
        $body = array(
            'Valor_total'=>$total,
            'Inicio_estadia'=>$j['estadia']['inicio'],
            'Fin_estadia'=>$j['estadia']['fin'],
            'Username'=>$_COOKIE['username'],
            'Id_depto'=>$j['id_depto'],
            'pagos'=>$pagos+$pagos2
        );
        $reserva = peticion_http('http://turismoreal.xyz/api/reserva','POST',$body,$_COOKIE['token']);
        if($reserva['statusCode']==200){
            echo '<!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Procesando pago...</title>
            </head>
            <body>
                <script>
                var reserva = '.json_encode($reserva['contenido']).';
                var depto = '.json_encode($dep['contenido']).';
                var servicios = '.json_encode($j['servicios']).';
                window.onload = function(){
                    document.getElementById("jsonres").value = JSON.stringify(reserva);
                    document.getElementById("jsondep").value = JSON.stringify(depto);
                    document.getElementById("jsonser").value = JSON.stringify(servicios);
                    document.forms["ff"].submit();
                }
                </script>
                <h1>Procesando pago, por favor espere...</h1>
                <form action="pagar.php" method="POST" name="ff" style="display:none;">
                <input type="hidden" name="reserva" id="jsonres">
                <input type="hidden" name="depto" id="jsondep">
                <input type="hidden" name="servicios" id="jsonser">
                <input type="hidden" name="act" value="pay">
                <input type="hidden" name="total" id="total" value="'.$total.'">
                </form>
            </body>
            </html>';
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
}else{
    echo 'ERROR';
    var_dump($_COOKIE['token']);
    var_dump($_POST['json']);
}
?>