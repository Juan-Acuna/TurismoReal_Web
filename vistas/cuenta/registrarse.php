<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
<?php
    include_once 'global.php';
?>
<title>Turismo Real</title>
<link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo JS;?>/api_turismoreal.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <!-- Nuestro css-->
    <link href="<?php echo CSS;?>/styles.css" rel="stylesheet"  >
    <link href="<?php echo CSS;?>/stylish-portfolio.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>/registro.css" th:href="@{<?php echo CSS;?>/registro.css}">

</head>
<body class="fotitio" style="background-attachment:fixed;">
<?php
        include "../../includes/navbar.php";
    ?>
    <form class="formularioregistro" style="Background-color:transparent!important" action="<?php echo FUNCIONES;?>/registro.php" method="POST">
        <h1 style="color:white!important">Registrarse</h1>
        <div class="contenedor" >
                <div class="input-contenedor" >
                    <input type="text" name="rut"  placeholder="Rut"/>
                </div>
                <div class="input-contenedor" >
                    <input type="text" name="nombres" placeholder="Nombres"/>
                </div>
                <div class="input-contenedor" >
                    <input type="text" name="apellidos" placeholder="Apellidos" />
                </div>
                <div class="input-contenedor" >
                    <input type="date" name="fnacimiento" placeholder="Fecha Nacimiento" />
                </div>
                <div class="input-contenedor" >
                    <input type="text" name="email" placeholder="Email" />
                </div>
                <div class="input-contenedor">
                    <input type="text" name="telefono" placeholder="Telefono" />
                </div>
                <div class="input-contenedor">
                    <input type="text" name="direccion" placeholder="Direccion" />
                </div>
                <div class="input-contenedor" >
                    <select  name="region" placeholder="Región" id="regiones"> </select>
                </div>
                <div class="input-contenedor" >
                    <select name="comuna" placeholder="Comuna" id="comunas"> </select>
                </div>
                <div class="input-contenedor" >
                    <select  name="sexo" placeholder="Sexo" id="genero"> </select>
                </div>
                <div class="input-contenedor" >
                    <input type="text" name="usuario" id="usuario" placeholder="Nombre Usuario" />
                </div>
                <span id="usuarioerror"></span>
                <div class="input-contenedor" >
                    <input type="password" name="password" placeholder="Contraseña" />
                </div>
                <input type="submit" value="Registrarse" class="button">
                <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
                <p>¿Ya tienes una cuenta?<a style="text-decoration:none" class="link" href="<?php echo VISTAS;?>/iniciar-sesion.php">Iniciar Sesion</a></p>
        </div>
    </form>
            </div>
        </div>
    </div>
</body>
</html>
