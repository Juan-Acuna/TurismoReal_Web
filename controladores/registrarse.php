<?php 
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    include 'peticion.php';
    if(!empty($_POST['rut'])||!empty($_POST['nombres'])||!empty($_POST['apellidos'])||!empty($_POST['fnacimiento'])||!empty($_POST['email'])||!empty($_POST['telefono'])||!empty($_POST['direccion'])||!empty($_POST['comuna'])||!empty($_POST['region'])||!empty($_POST['sexo'])||!empty($_POST['usuario'])||!empty($_POST['password']))
    {
        $body = new PersonaUsuario();
        $body->Usuario = new Usuario();
        $body->Persona = new Persona();
        $body->Usuario->Username=$_POST['usuario'];
        $body->Usuario->Clave = $_POST['password'];
        $body->Usuario->Id_rol = 5;
        $body->Persona= new Persona();
        $body->Persona->Rut = $_POST['rut'];
        $body->Persona->Nombres = $_POST['nombres'];
        $body->Persona->Apellidos = $_POST['apellidos'];
        $body->Persona->Nacimiento = $_POST['fnacimiento'];
        $body->Persona->Email  = $_POST['email'];
        $body->Persona->Telefono = $_POST['telefono'];
        $body->Persona->Direccion = $_POST['direccion'];
        $body->Persona->Comuna = $_POST['comuna'];
        $body->Persona->Region = $_POST['region'];
        $body->Persona->Id_genero = $_POST['sexo'];
        $resultado=peticion_http('http://turismoreal.xyz/api/usuario','POST',$body);
        if($resultado['statusCode']==200)
        {
            setcookie('token',($resultado['contenido'])['token'], time()+3600, '/');
            setcookie('username',($resultado['contenido'])['username'], time()+3600, '/');
            setcookie('rol',($resultado['contenido'])['id_rol'], time()+3600, '/');
            header('Location: '.VISTAS.'/'); 
            die();
        }/*else{setcookie('error',($resultado['contenido'])['error'], time()+60, '/');
            header('Location: ../vistas/index.php'); 
            die();}*/
    }
?>