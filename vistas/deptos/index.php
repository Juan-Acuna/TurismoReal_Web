<?php
    include "global.php";
    include F_PETICION;
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<!doctype html>
<html lang="es">
<head>
    <?php include F_HEAD;?>
</head>
<body style="position:relative">
<?php
include F_NAVBAR;
?>
<section class="filtro pt-5 mt-5">
    <div class="container vh" >
        <h1 class="col-lg-9 offset-lg-1 text-center"  >Departamentos Disponibles</h1>
        <h3 class="col-lg-3 d-none d-sm-none  d-md-none  d-lg-block">Localidades</h3>
        <div class="row ">
            <div class="col-lg-2 filter filter-basic" >
                <div class="row">
                    <div class="col-lg-12 filter-nav btn-group-vertical">
                        <button class="categoryDepa btn btn-primary active align-content-lg-around" onclick="Filtrar(this)" category="all">Todo</button>
                        <?php
                        $resultado = peticion_http('http://turismoreal.xyz/api/Localidad','GET','','',LISTA_LOCALIDAD);
                        if($resultado['statusCode']==200)
                        {
                            foreach($resultado['contenido'] as $item)
                            {
                                echo '<button class="categoryDepa btn btn-primary" onclick="Filtrar(this)" category="'.$item->Id_localidad.'">'.$item->Nombre.'</button>';
                            }
                        }else if($resultado['statusCode']==400){
                            MostrarError(ERROR_DATOS);
                        }else{
                            MostrarError(ERROR_SERVIDOR);
                        }
                        ?>
                    </div>
                </div>    
            </div>
            <div class="col-lg-10" >   
                <?php
                    $resultado = peticion_http('http://turismoreal.xyz/api/Departamento','GET','','',LISTA_DEPARTAMENTO);
                    if($resultado['statusCode']==200)
                    {
                        foreach($resultado['contenido'] as $item)
                        {
                            $actual = IMG.'/nodispon.png';
                            $fotos = peticion_http('http://turismoreal.xyz/api/Foto/'.$item->Id_depto,'GET','','',LISTA_FOTO);
                            if($fotos['statusCode']==200)
                            {
                                $actual = $fotos['contenido'][0]->Ruta;
                            } 
                            echo '<form action="detalles.php" method="GET" class="depa-item d-flex" category="'.$item->Id_localidad.'">
                                    <div class="row text-center text-lg-left   mb-2 border  rounded" >
                                        <img class="col-xs-12 col-lg-4 fotoaa img-fluid"   src="'.$actual.'" alt="aaa" " >
                                        <input name="depaid" type="hidden" value="'.$item->Id_depto.'"></input>
                                        <div class="col-xs-12 col-lg-6 tituloaa">
                                        <H3 >'.$item->Nombre.'</H3>
                                        <a >Departamento de '.$item->Habitaciones.' dormitorios, '.$item->Banos.' baños</a>
                                        </div>
                                            <div class="col-xs-12 col-lg-2  align-self-xs-center" >
                                            <button  type="submit" class="  btn btn-primary btn-xl text-uppercase "href="'.DEPTOS.'/detalles.php"> Ver Detalles</button>    
                                        </div>  
                                    </div>
                                </form>';
                        }
                    }else{
                        MostrarError(ERROR_DATOS);
                    }
                ?>
            </div>
            </div>
        </div>
</section>
<?php include F_FOOTER;?>
<script src="<?php echo JS; ?>/popper.min.js" ></script>
<script src="<?php echo JS; ?>/bootstrap.min.js" ></script>
</body>
</html>