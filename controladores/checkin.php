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
        MostrarError(ERROR_CONEXION);
    break;
    case 401:
        MostrarError(ERROR_SESION);
    break;
    case 500:
        MostrarError(ERROR_SERVIDOR);
    break;
    default:
        MostrarError(ERROR_DATOS);
break;
}
?>