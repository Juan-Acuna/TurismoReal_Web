<?php
    include "global.php";
    include F_PETICION;
    ValidarLogin();
    ValidarRol(5);
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include F_HEAD;?>
</head>
<body>
<?php
include F_NAVBAR;
$resultado = peticion_http('http://turismoreal.xyz/api/reserva','GET','',$_COOKIE['token'],LISTA_RESERVA);
if($resultado['statusCode']==200){

}else if($resultado['statusCode']==400){

}else if($resultado['statusCode']==500){
    MostrarError(ERROR_SERVIDOR);
}
echo '<div class="container vh">
    <H2>Mis Reservas</H2>
    <div class="row ">';
        echo '<div class="col-lg-12 border m-2">
            <h3>Departamento 1</h3>
            <div class="row border m-1 py-2 ">
                <div class="col-lg-4 col-xs-12">
                <img class="foto img-fluid" src="../../assets/img/depa/depa1.jpg" >
                </div>
                <div class="col-lg-5 col-xs-12">
                <p>Departamentio bla bla bla blabl abl abl abl abl abl abl ablablabl abl abl abla bla sdfsdfsdfsfsdfsdfsssdfdsfsdfdsbla bal lb abl abl</p>
                </div>
                <div class="col-lg-3 col-xs-12">
                    <a href="'.DEPTOS.'/reservar.php?depaid='.$depto['id_depto'].'" class="btn btn-primary">Detalles</a>
                    <a href="'.DEPTOS.'/reservar.php?depaid='.$depto['id_depto'].'" class="btn btn-primary">Cancelar Reserva</a>
                </div>
            </div>
        </div>
    </div>
</div>';/*
$resultado = peticion_http('http://turismoreal.xyz/api/Reserva');
if($resultado['statusCode']==200)
{
    foreach($resultado['contenido'] as $item)
    {
        $actual = IMG.'/nodispon.png';
        $fotos = peticion_http('http://turismoreal.xyz/api/Foto/'.$item['id_reserva']);
        if($fotos['statusCode']==200)
        {
            $actual = $fotos['contenido'][0]['ruta'];
        }
        echo '<form action="detalles.php" method="GET" class="depa-item" category="'.$item['id_localidad'].'">
            <div class="row">
            </div>
            <img class="col-xs-12 col-lg-4 fotoaa img-fluid" src="'.$actual.'" alt="aaa" " >
            <input name="depaid" type="hidden" value="'.$item['id_depto'].'"></input>
            <div class=" col-lg-4 tituloaa">
            <H3 >'.$item['nombre'].'</H3>
            <a >Departamento de '.$item['habitaciones'].' dormitorios, '.$item['banos'].' baños</a>
            </div>  
            <button type="submit" class="col-lg-4 btn btn-primary btn-xxl text-uppercase "href="'.DEPTOS.'/detalles.php"> Ver Detalles</button>
        </form>';
    }
}*/
?>
    </div>
    <?php include F_FOOTER;?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>