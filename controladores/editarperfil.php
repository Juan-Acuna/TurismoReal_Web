<?php
include_once 'global.php';
include 'peticion.php';

$bclave = !empty($_POST['clave']);
if(!empty($_POST['nombres']) 
&& !empty($_POST['apellidos']) 
&& !empty($_POST['direccion']) 
&& !empty($_POST['comuna']) 
&& !empty($_POST['region']) 
&& !empty($_POST['email'])
&& !empty($_POST['nacimiento'])
&& !empty($_POST['telefono'])
&& !empty($_POST['genero'])){
    $body = [];
    $body['Persona'] = new Persona();
    $body['Persona']->Nombres=$_POST['nombres'];
    $body['Persona']->Apellidos = $_POST['apellidos'];
    $body['Persona']->Nacimiento = $_POST['nacimiento'];
    $body['Persona']->Email = $_POST['email'];
    $body['Persona']->Telefono = $_POST['telefono'];
    $body['Persona']->Direccion = $_POST['direccion'];
    $body['Persona']->Comuna = $_POST['comuna'];
    $body['Persona']->Region = $_POST['region'];
    $body['Persona']->Id_genero = $_POST['genero'];
    if($bclave){
        $body['Usuario']=array('Clave'=>$_POST['clave']);
    }
    $r = peticion_http('http://turismoreal.xyz/api/usuario/'.$_POST['username'],'PATCH',$body,$_COOKIE['token']);
    if($r['statusCode']==200){
        header('Location: '.CUENTA.'/miperfil.php');
        die();
    }else{
        //Error
    }
}else{
    //Error
}
?>