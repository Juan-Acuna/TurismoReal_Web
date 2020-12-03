<?php
    include_once 'global.php';
    include 'peticion.php';
    if($_GET['origen']=='web')
   {
       
    if($_GET['password']!=null)
    {
        
        if(isset($_COOKIE['tok']))
        {
            $body=array('Usuario'=>array('Clave'=>$_GET['password']));
            $resultado=peticion_http('http://turismoreal.xyz/api/usuario/'.$_COOKIE['username'],'PATCH',$body, $_COOKIE['tok']);
            if($resultado['statusCode']==200)
            {
                header('Location: '.CUENTA.'/iniciar-sesion.php'); 
                die();
            }
        }

   }
    }else 
    {
        $resultado=peticion_http('http://turismoreal.xyz/api/interno/gestion/restablecer/'.$_GET['username'].'/'.$_GET['codigo'].'.'.$_GET['sal']);
        if($resultado['statusCode']==200)
        {
            setcookie('tok',($resultado['contenido'])['token'], time()+3600, '/');
            setcookie('username',($resultado['contenido'])['username'], time()+3600, '/');
            header('Location: '.CUENTA.'/restablecer.php'); 
            die();

        }
        
    }
?>