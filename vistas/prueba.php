<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="<?php echo ASSETS;?>/img/cropped-favicon-tr.ico"  />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <link rel="stylesheet" type="text/css" href="/Descargas/Agencia/css/registro.css" th:href="@{/Descargas/Agencia/css/registro.css}">
</head>
<body>
    <form class="formularioregistro">
        <h1>Registrate</h1>
        <div class="contenedor">
                <div class="input-contenedor" >
                    <input type="text"  placeholder="Rut"/>
                </div>
                <div class="input-contenedor" >
                    <input type="text"  placeholder="Nombres"/>
                </div>
                <div class="input-contenedor" >
                    <input type="text"  placeholder="Apellidos" />
                </div>
                <div class="input-contenedor" >
                    <input type="date"  placeholder="Fecha Nacimiento" />
                </div>
                <div class="input-contenedor" >
                    <input type="text"  placeholder="Email" />
                </div>
                <div class="input-contenedor">
                    <input type="text"  placeholder="Telefono" />
                </div>
                <div class="input-contenedor">
                    <input type="text"  placeholder="Direccion" />
                </div>
                <div class="input-contenedor" >
                    <input type="text"  placeholder="Comuna" />
                </div>
                <div class="input-contenedor" >
                    <input type="text"  placeholder="Contrasena" />
                </div>
                <div class="input-contenedor" >
                    <input type="password"  placeholder="Contrasena" />
                </div>
        </div>
    </form>

    <form class="formulario">
    
        <h1>Registrate</h1>
         <div class="contenedor">
         
         <div class="input-contenedor">
             <i class="fas fa-user icon"></i>
             <input type="text" placeholder="Nombre Completo">
             
             </div>
             
             <div class="input-contenedor">
             <i class="fas fa-envelope icon"></i>
             <input type="text" placeholder="Correo Electronico">
             
             </div>
             
             <div class="input-contenedor">
            <i class="fas fa-key icon"></i>
             <input type="password" placeholder="Contraseña">
             
             </div>
             <input type="submit" value="Registrate" class="button">
             <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
             <p>¿Ya tienes una cuenta?<a class="link" href="loginvista.html">Iniciar Sesion</a></p>
         </div>
        </form>



</body>
</html>