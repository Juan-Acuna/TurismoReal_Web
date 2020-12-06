<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
$b=false;
$d='';
if(isset($_GET['error-data']))
{
    if($_GET['error-data'] == "" || $_GET['error-data'] == null){
        MostrarError(ERROR_CONEXION);
    }
    $b=true;
    $d=base64_decode(urldecode($_GET['error-data']));
}?>
<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
<?php include F_HEAD;?>
</head>
<body class="fotitio ">
<?php
include F_NAVBAR;
?>
<form class="formularioiniciosesion" style="background-color:transparent; margin-top:100px;" method="POST" action="<?php echo FUNCIONES;?>/iniciarsesion.php">
    <div class="container vh">
        <h1 class="text-center display-3 mb-3 text-primary">INICIO SESIÓN</h1>
        <div class="row d-flex justify-content-center " >
            <div class="col-xs-12 col-md-6 " >
                <input onclick="LimpiarError('alertDiv')" class="form-control border rounded mb-3" type="text" name="usuario" placeholder="Usuario" required>
                <input onclick="LimpiarError('alertDiv')" class="form-control border rounded mb-3 " type="password" name="password" placeholder="Clave" required>
                <?php
                    if($b)
                    {
                    echo '<div id="alertDiv" class="col-xs-12 alert alert-danger" role="alert">
                            <strong>Error! </strong>'.$d.'
                        </div>';
                    }
                ?>
            </div>
            <div class="col-12 text-center">
                <input type="submit" value="INICIAR SESION" class="btn btn-primary btn-lg" onclick="LimpiarError('alertDiv')">
                <p style="color:white">¿Olvidaste tu clave? <a class="link" href="<?php echo CUENTA;?>/recuperar.php" style="color:white">Recuperar </a></p>
                <p style="color:white">¿No tienes una cuenta? <a class="link" href="<?php echo CUENTA;?>/registrarse.php" style="color:white">Regístrate </a></p>
            </div>
        </div>
    </div>
</form>
    <?php include F_FOOTER;?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>