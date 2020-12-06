<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
include F_PETICION;

if(!empty($_POST['usuario'])||!empty($_POST['password']))
{
    $body=array('username'=>$_POST['usuario'],'clave'=>$_POST['password']);
    $resultado=peticion_http('http://turismoreal.xyz/api/usuario/autenticar','POST',$body);
    var_dump($resultado);
    switch($resultado['statusCode'])
    {
        case 200:
            setcookie('token',($resultado['contenido'])['token'], time()+3600, '/');
            setcookie('username',($resultado['contenido'])['username'], time()+3600, '/');
            setcookie('rol',($resultado['contenido'])['id_rol'], time()+3600, '/');
            header('Location: '.VISTAS.'/');
            die();
        break;
        default:
            header('Location: '.CUENTA.'/iniciar-sesion.php?error-data='.urlencode(base64_encode($resultado['contenido']['error']))); 
            die();
        break;
    }
}else{
    MostrarError(ERROR_PETICION);
}
?>