<?php
    include_once 'global.php';
    $b=false;
    $d='';
    if(isset($_COOKIE['error']))
        {
            $b=true;
            $d=$_COOKIE['error'];
            setcookie('error', '', time()-3600,  '/');
        }

    echo '
    <!DOCTYPE html>
    <html lang="en" xmlns:th="http://www.thymeleaf.org">
    <head>

    ';?>
    <title>Turismo Real</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
    <!--JQUERY-->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >

    <!-- Nuestro css-->
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
    

</head>


<body class="fotitio ">
<?php

include "../assets/includes/navbar.php";

?>

        <form class=" formularioiniciosesion   " style="background-color:transparent; margin-top:100px;" method="POST" action="<?php echo FUNCIONES;?>/iniciarsesion.php">
            <div class="container">
                <h1 class="text-center display-3 mb-3 text-primary">INICIO SESIÓN</h1>
                <div class="row d-flex justify-content-center " >
                    <div class="col-xs-12 col-md-6 " >
                    <input class="form-control border rounded mb-3" type="text" name="usuario" placeholder="Usuario" required>
                    <input class="form-control border rounded mb-3 " type="password" name="password" placeholder="Clave" required>
                    </div>

                    <?php
            if($b)
            {
            echo '<div class="alert alert-danger" role="alert">
            <strong>Error! </strong>'.$d.'
            </div>';
            }

        ?>
        <div class="col-12 text-center">
        <input type="submit" value="INICIAR SESION" class="btn btn-primary btn-lg">
                <p style="color:white">¿Olvidaste tu clave? <a class="link" href="<?php echo CUENTA;?>/recuperar.php" style="color:white">Recuperar </a></p>

                <p style="color:white">¿No tienes una cuenta? <a class="link" href="<?php echo CUENTA;?>/registrarse.php" style="color:white">Regístrate </a></p>
                </div>
            </div>
        </form>
    
        
   
    </form>

    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
    
</body>
</html>