<?php
    include "global.php";
    include F_PETICION;
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
<title>Turismo Real</title>
<link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo JS;?>/api_turismoreal.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
</head>
<body class="fotitio" style="background-attachment:fixed;">
<?php

include F_NAVBAR;

?>
    
    
    
    
    <form class=" text-center  formularioregistro container" style="Background-color:transparent!important" action="<?php echo FUNCIONES;?>/registro.php" method="POST">
        
        <div class="row text-center justify-content-center ">
        <div class="contenedor text-center col-xs-12  col-md-5 col-lg-4" >
        <h1 class="text-primary text-center mb-4 display-4">Registrarse</h1>

            <input class="form-control mb-3" type="text" name="rut"  placeholder="Rut"/>     
            <input class="form-control mb-3" type="text" name="nombres" placeholder="Nombres"/>
            <input class="form-control mb-3" type="text" name="apellidos" placeholder="Apellidos" />
            <input class="form-control mb-3" type="date" name="fnacimiento" placeholder="Fecha Nacimiento" />
            <input class="form-control mb-3" type="text" name="email" placeholder="Email" />
            <input class="form-control mb-3" type="text" name="telefono" placeholder="Telefono" />
            <input class="form-control mb-3" type="text" name="direccion" placeholder="Direccion" />
            <select class="form-control mb-3" class="form-control"  name="region" placeholder="Región" id="regiones"> </select>
            <select class="form-control mb-3" name="comuna" placeholder="Comuna" id="comunas"> </select>
            <select class="form-control mb-3"  name="sexo" placeholder="Sexo" id="genero"> </select>
            <input class="form-control mb-3" type="text" name="usuario" id="usuario" placeholder="Nombre Usuario" />

            <span id="usuarioerror"></span>
            
                <input class="form-control" type="password" name="password" placeholder="Contraseña" />
            
            <input class="btn btn-primary btn-lg my-3" type="submit" value="Registrarse" class="button">
            <p class="text-primary">Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
            <p class="text-primary">¿Ya tienes una cuenta?<a style="text-decoration:none" class="link" href="<?php echo VISTAS;?>/iniciar-sesion.php"> Iniciar Sesion</a></p>
    </div>    
        </div>
        
    </form>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
    <?php include F_FOOTER;?>
</body>
</html>
