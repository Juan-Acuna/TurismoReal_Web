<?php
    include 'peticion.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    
    if($_POST['email']!=null)
    {
        $resultado=peticion_http('http://turismoreal.xyz/api/interno/gestion/recuperar/'.$_POST['email']);
        if($resultado['statusCode']==200)
        {
            header('Location: '.CUENTA.'/correoenviado.php'); 
            die();
        }
    }
?>