<?php include 'peticion.php';
if(!empty($_POST['rut'])||!empty($_POST['nombres'])||!empty($_POST['apellidos'])||!empty($_POST['fnacimiento'])||!empty($_POST['email'])||!empty($_POST['telefono'])||!empty($_POST['direccion'])||!empty($_POST['comuna'])||!empty($_POST['region'])||!empty($_POST['sexo'])||!empty($_POST['usuario'])||!empty($_POST['password']))
{
        $body = array('Usuario' => array(
            'username'=> $_POST['usuario'],
            'clave'=> $_POST['password'],
            'id_rol'=> 5),

            'Persona'=> array(
            'rut'=> $_POST['rut'],
            'nombres'=> $_POST['nombres'],
            'apellidos'=> $_POST['apellidos'],
            'nacimiento'=> $_POST['fnacimiento'],
            'email' =>$_POST['email'],
            'telefono'=>$_POST['telefono'],
            'direccion'=> $_POST['direccion'],
            'comuna'=> $_POST['comuna'],
            'region' =>$_POST['region'],
            'id_genero'=> $_POST['sexo']
            )
        );
        $resultado=peticion_http('http://turismoreal.xyz/api/usuario','POST',$body);

        if($resultado['statusCode']==200)
        {setcookie('token',($resultado['contenido'])['token'], time()+3600, '/');
        header('Location: '.VISTAS.'/'); 
        die();
        }
        /*else{setcookie('error',($resultado['contenido'])['error'], time()+60, '/');
            header('Location: ../vistas/index.php'); 
            die();}*/
    
    
}


?>