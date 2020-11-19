<?php
    include "global.php";
    include "../../controladores/peticion.php";
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
     <!-- Archivos CSS BOOTSTRAP 4 -->
        <link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo CSS?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS?>/estilos.css" type="text/css">
    <script src="<?php echo JS; ?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS; ?>/scripts.js"></script>
</head>
<body>
    <!--BARRA DE NAVEGACION-->

<?php
include "../../assets/includes/navbar.php";
?>
    <section class="filtro pt-5 mt-5">
        <div class="container" >

        
            <h1 class="col-lg-9 offset-lg-1 text-center"  >Departamentos Disponibles</h1>
            <h3 class="col-lg-3 d-none d-sm-none  d-md-none  d-lg-block">Localidades</h3>
            <div class="row ">
                <div class="col-lg-2 filter filter-basic" >
                    <div class="row">
                        <div class="col-lg-12 filter-nav btn-group-vertical">
                            <button class="categoryDepa btn btn-primary active align-content-lg-around" onclick="Filtrar(this)" category="all">Todo</button>
                            <?php
                            $resultado = peticion_http('http://turismoreal.xyz/api/Localidad');
                            if($resultado['statusCode']==200)
                            {
                                foreach($resultado['contenido'] as $item)
                                {
                                    echo '<button class="categoryDepa btn btn-primary" onclick="Filtrar(this)" category="'.$item['id_localidad'].'">'.$item['nombre'].'</button>';
                                }
                            }
                            ?>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-10" >   
                    <?php
                        $resultado = peticion_http('http://turismoreal.xyz/api/Departamento');
                        if($resultado['statusCode']==200)
                        {
                            foreach($resultado['contenido'] as $item)
                            {
                                $actual = IMG.'/nodispon.png';
                                $fotos = peticion_http('http://turismoreal.xyz/api/Foto/'.$item['id_depto']);
                                if($fotos['statusCode']==200)
                                {
                                    $actual = $fotos['contenido'][0]['ruta'];
                                } 
                                echo '<form action="detalles.php" method="GET" class="depa-item d-flex" category="'.$item['id_localidad'].'">
                                        <div class="row text-center text-lg-left   mb-2 border  rounded" >
                                            <img class="col-xs-12 col-lg-4 fotoaa img-fluid"   src="'.$actual.'" alt="aaa" " >
                                            <input name="depaid" type="hidden" value="'.$item['id_depto'].'"></input>
                                            <div class="col-xs-12 col-lg-6 tituloaa">
                                            <H3 >'.$item['nombre'].'</H3>
                                            <a >Departamento de '.$item['habitaciones'].' dormitorios, '.$item['banos'].' baños</a>
                                            </div>
                                                <div class="col-xs-12 col-lg-2  align-self-xs-center" >
                                                <button  type="submit" class="  btn btn-primary btn-xl text-uppercase "href="'.DEPTOS.'/detalles.php"> Ver Detalles</button>    
                                            </div>  
                                        </div>
                                    </form>';
                            }
                        }
                    ?>
                </div>
                </div>
            </div>
    </section>
    <?php echo FOOTER;?>
    <script src="<?php echo JS; ?>/popper.min.js" ></script>
    <script src="<?php echo JS; ?>/bootstrap.min.js" ></script>
</body>
</html>