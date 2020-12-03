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
    <head>';
    include F_HEAD;
    echo '</head>
    <body>';

include F_NAVBAR;

if(isset($_POST['ncode'])){
    $not = peticion_http('http://turismoreal.xyz/api/notificacion/'.$_POST['ncode'],'GET','',$_COOKIE['token'],CLASE_NOTIFICACION);
    if($not['statusCode']==200){
        $n = $not['contenido'];
        echo '<div class="container vh" style="margin-top: 150px">
                <div class="row border p-2">
                    <div class="col-xs-12 col-lg-12 mt-2">
                        <h2>'.$n->Titulo.'</h2>
                    </div>
                    <div class="col-xs-12 col-lg-12 mb-2 ">
                        <div class="row">
                            <div class="col-xs-12 col-lg-9 mb-5">
                            <p>'.$n->Contenido.'</p>
                            </div>
                            <div class="col-xs-12 col-lg-3 align-self-end">
                            <button class="btn btn-primary">Volver</button>';
                            if($n->Link!="" && $n->Link!=null){
                                echo '<button class="btn btn-primary" onclick="window.location.href=\''.$n->Link.'\';">Ir al Sitio</button>';
                            }
                            echo '</div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
            <script src=".<?php echo JS;?>/popper.min.js" ></script>
            <script src="<?php echo JS;?>/bootstrap.min.js" ></script>';
            include F_FOOTER;
        echo '</body>
        </html>';
    }
}
?>