<?php
    include "global.php";
    include F_PETICION;
    ValidarLogin();
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
         <!-- Archivos CSS BOOTSTRAP 4 -->
         <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
    </head>
    <body>';
include F_NAVBAR;
$notifs = peticion_http('http://turismoreal.xyz/api/notificacion/usuario/'.$_COOKIE['username'],'','',$_COOKIE['token'],LISTA_NOTIFICACION);
    echo '<div class="container vh" style= "margin-top:100px">
    <H2>Notificaciones</H2>
    <div class="row">';
    if($notifs['statusCode']==200){
        foreach($notifs['contenido'] as $n){
            echo '<div class="col-lg-12 border m-2">
                    <div class="row  m-1 py-2 ">
                        <div class="col-lg-6 col-xs-12">';
            if($n->Visto=='1'){
                echo       '<p class="h2">'.$n->Titulo.'</p>';
            }else{
                echo       '<h2>'.$n->Titulo.'</h2>';
            }
            echo       '</div>
                        <div class="col-lg-6 col-xs-12 text-right">
                            <a href="'.NOTIFICACIONES.'/detalle.php?'.$n->Id_notificacion.'" class="btn btn-primary">Ver</a>
                        </div>
                    </div>
                </div>';
        }
    }else{
        echo '<p class="text-muted m-5">No hay notificaciones.</p>';
    }
    echo '</div>
     </div>';
?>
    <?php include F_FOOTER;?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src=".<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>