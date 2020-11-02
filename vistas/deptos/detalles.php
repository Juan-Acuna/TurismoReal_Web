<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include_once 'global.php';
?>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Turismo Real</title>
        <link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
        <!-- Font Awesome icons (free version)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
       
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo CSS;?>/styles.css" rel="stylesheet" />
        
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet"> 
    <link href="<?php echo CSS;?>/styles.css" rel="stylesheet" />
    <link href="<?php echo CSS;?>/stylish-portfolio.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo CSS;?>/depadetalle.css">

</head>

<body id="page-top">
    
    <script>function cambiarimagen(img){
        var main = document.getElementById("imgMain");
        main.src=img.src;
        main.alt=img.alt;
        }
        window.onload = function(){
            cambiarimagen(document.getElementById('0'));
        };
    </script>
<?php
    include "../../includes/navbar.php";
    include "../../funciones/peticion.php";

    if($_GET['depaid']!=null){
        
        $respuesta=peticion_http('http://turismoreal.xyz/api/departamento/'.$_GET['depaid']);
        if($respuesta['statusCode']==200){
            $depto=$respuesta['contenido'];
           
            $fotos = peticion_http('http://turismoreal.xyz/api/Foto/'.$depto['id_depto']);
            echo '<header class="wrap">
            <h1>Descripción del Departamento</h1>
                <section class="depa-list">
                <div class="store-wrapper">
                <div class="category-list">';
            if($fotos['statusCode']==200)
            {
                for($i=0; $i<=3; $i++){
                    $actual = IMG.'/nodispon.png';
                    if(count($fotos['contenido'])>$i){
                        $actual = $fotos['contenido'][$i]['ruta'];
                    }
                    echo'<img id="'.$i.'" onclick="cambiarimagen(this)"  src="'.$actual.'" alt="aaa" style="height:79px" >';
                    
                }
                $loc = (peticion_http('http://turismoreal.xyz/api/localidad/'.$depto['id_localidad']))['contenido'];
                $h= "un dormitorio";
                if($depto['habitaciones']>1){
                    $h= $depto['habitaciones']." dormitorios";
                }
                $b= "un baño";
                if($depto['banos']>1){
                    $b= $depto['banos']." baños";
                }
            } 
            echo '</div> 
                    <div class="fotoaa">
                            <img id="imgMain" src="'.IMG.'/nodispon.png" alt="aaa" style="height:316px; width: 450px;">
                        </div>
                        <div style="margin-left:1%;">
                        
                        <div style="height:250px">
                            <H3 >'.$depto['nombre'].'</H3>
                            <a>Departamento de '.$depto['mts_cuadrados'].' metros cuadrados, ubicado en la localidad de '.$loc['nombre'].', este cuenta con '.$h.', '.$b.', cocina y una amplia sala de estar.</a>
                            
                        </div>  <a style="float:right; "class="btn btn-primary btn-xl text-uppercase " href="'.DEPTOS.'/reservar.php?depaid='.$depto['id_depto'].'"> Reservar</a>
                    </div>
                </section> 
        </header>';
        }
    }
    //
    //<img id="imgMain" src="'.IMG.'/nodispon.png" alt="aaa" style="height:316px; width: 450px;">


?>


 
</body>

<html>