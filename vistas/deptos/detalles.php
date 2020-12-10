<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';;
    include_once F_PETICION;
    ValidarGet('depaid');
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }

echo '<!doctype html>
<html lang="es" class="h-100">
<head>';
include F_HEAD;
echo '</head>
<body>
<script>function cambiarimagen(img){
        var main = document.getElementById("imgMain");
        main.src=img.src;
        main.alt=img.alt;
        }
        window.onload = function(){
            cambiarimagen(document.getElementById("0"));
        };
    </script>';

include F_NAVBAR;
    if($_GET['depaid']!=null){
        $respuesta=peticion_http('http://turismoreal.xyz/api/departamento/'.$_GET['depaid'],'GET','','',CLASE_DEPARTAMENTO);
        if($respuesta['statusCode']==200){
            $depto=$respuesta['contenido'];
            $imgs = array();
            $fotos = peticion_http('http://turismoreal.xyz/api/Foto/'.$depto->Id_depto,'GET','','',LISTA_FOTO);
            echo '
<div class="container vh mb-5">
    <div class="row">
        <div class="col-lg-12 col-xs-12"><h1>Detalle Departamento</h1></div>
    </div>
        <div class="row border ">
            <div class="col-lg-6 col-xs-12  p-2">
                <div class="row p-3 border-right">
                    <div class="col-lg-12 col-xs-12">
                        <img class="img-fluid" id="imgMain" src="'.IMG.'/nodispon.png" alt="">
                    </div>
                <div class="col-lg-12 col-xs-3">
            <div class="row">';
                    if($fotos['statusCode']==200)
                    {
                        for($i=0; $i<=3; $i++){
                            $actual = IMG.'/nodispon.png';
                            if(count($fotos['contenido'])>$i){
                                $actual = $fotos['contenido'][$i]->Ruta;
                            }
                            array_push($imgs,$actual);
                        }
                    }else{
                        for($i=0; $i<=3; $i++){
                            array_push($imgs,IMG.'/nodispon.png');
                        }
                    }
                    echo'<img class="col-3 " id="0" onclick="cambiarimagen(this)" src="'.$imgs[0].'" alt="fff">';
                    echo'<img class="col-3 " id="1" onclick="cambiarimagen(this)" src="'.$imgs[1].'" alt="fff">';
                    echo'<img class="col-3 " id="2" onclick="cambiarimagen(this)" src="'.$imgs[2].'" alt="fff">';
                    echo'<img class="col-3 " id="3" onclick="cambiarimagen(this)" src="'.$imgs[3].'" alt="fff">';
                        $rloc = peticion_http('http://turismoreal.xyz/api/localidad/'.$depto->Id_localidad,'GET','','',CLASE_LOCALIDAD);
                        $loc = $rloc['contenido'];
                        $h= "un dormitorio";
                        if($depto->Habitaciones>1){
                            $h= $depto->Habitaciones." dormitorios";
                        }
                        $b= "un baño";
                        if($depto->Banos>1){
                            $b= $depto->Banos." baños";
                        }
                        echo'  </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-2">
                <div class="row p-3">
                    <div class="col-lg-12">
                    <H3 >'.$depto->Nombre.'</H3>
                    <a>Departamento de '.$depto->Mts_cuadrados.' metros cuadrados, ubicado en la localidad de '.$loc->Nombre.', este cuenta con '.$h.', '.$b.', cocina y una amplia sala de estar.</a></div>
                    <div class="col-lg-12 d-flex justify-content-end">
                    <a class="btn btn-primary btn-xxl order-lg-last text-uppercase';
                    if(isset($_COOKIE['token'])){
                        echo '" href="'.DEPTOS.'/reservar.php?depaid='.$depto->Id_depto.'"';
                    }else{
                        echo ' text-muted" disabled';
                    }
                    echo '>Reservar</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>';
}
}
?>
        <?php include F_FOOTER;?>
        <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
        <script src="<?php echo JS;?>/popper.min.js" ></script>
        <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
    </body>
</html>