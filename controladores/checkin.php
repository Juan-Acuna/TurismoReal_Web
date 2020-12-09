<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
include_once F_PETICION;
ValidarLogin();
ValidarPost('data');
ValidarPost('idres');
$res = peticion_http('http://turismoreal.xyz/api/reserva/iniciarcheck/'.$_POST['idres'].'/'.$_POST['data'],'POST','',$_COOKIE['token']);
switch($res['statusCode']){
    case 200:
        header('Location:'.GESTION.'/esperando-confirmacion.php?data='.urlencode(base64_encode('data-valida,'.$_POST['idres'])));
    break;
    case 400:
        var_dump($res);
        //MostrarError(ERROR_CONEXION);
    break;
    case 401:
        var_dump($res);
        //MostrarError(ERROR_SESION);
    break;
    case 500:
        var_dump($res);
        //MostrarError(ERROR_SERVIDOR);
    break;
    default:
        var_dump($res);
        //MostrarError(ERROR_DATOS);
break;
}
?>