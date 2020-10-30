<html>
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
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo CSS;?>/styles.css" rel="stylesheet" />
        <link href="<?php echo CSS;?>/verdepa.css" rel="stylesheet" />
        <link href="<?php echo CSS;?>/stylish-portfolio.min.css" rel="stylesheet">
        
</head>

<body id="page-top">
    
<?php
    include "../../includes/navbar.php";
    include '../../funciones/peticion.php';
?>
    
        <header class="wrap" style="text-align:justify">
        <h1 style="color:black!important;text-align:center">Departamentos Disponibles</h1>
            <div  style="position:relative;">
                <div class=" js-scroll-trigger" class=" navbar navbar-expand-lg navbar-dark btn-filter " style="position:absolute;z-index:100;top:50px;">
                    <div>
                        <a class="mx-0 mx-lg-1 btn btn-xxl text-uppercase btn-filter"  data-toggle="collapse" data-target="#filtro" aria-controls="filtro" aria-expanded="false" aria-label="Toggle navigation" >
                        Filtros
                        <i class="fas fa-bars ml-1"></i>
                    </a>
                </div>

                    <div class="collapse navbar-collapse" id="filtro"><br>
                        <ul class="  navbar-nav ml-auto ">
                            <li class=" mx-0 mx-lg-1"><a href="#" ><a class="categoryDepa btn btn-primary btn-xxl text-uppercase btn-filter " category="all">Todo</a></li><br>
                            <?php
                            $resultado = peticion_http('http://turismoreal.xyz/api/Localidad');
                            if($resultado['statusCode']==200)
                            {
                                foreach($resultado['contenido'] as $item)
                                {
                                    echo '<li class=" mx-0 mx-lg-1"><a href="#" ><a class="categoryDepa btn btn-primary btn-xxl text-uppercase btn-filter " category="'.$item['id_localidad'].'">'.$item['nombre'].'</a></li><br>';
                                }
                            }
                            ?>
                            
                        </ul>
                    </div> 
                </div>
            </div>
            
                <section class="depa-list" style="margin-left:200px;position:relative;">
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
                                   

                                    echo '<form action="detalles.php" method="GET" class="depa-item" category="'.$item['id_localidad'].'">
                        
                                        <img class="fotoaa" src="'.$actual.'" alt="aaa" width="240x700" >
                                        <input name="depaid" type="hidden" value="'.$item['id_depto'].'"></input>
                                        <div class="tituloaa">
                                        <H3 >'.$item['nombre'].'</H3>
                                        <a >Departamento de '.$item['habitaciones'].' dormitorios, '.$item['banos'].' baños</a>
                                        </div>  
                                        <button type="submit" class=" btn btn-primary btn-xxl text-uppercase "href="'.DEPTOS.'/detalles.php"> Ver Detalles</button>
                                    </form>';
                                }
                            }
                            ?>
                    
                   
                    
                </section>                      
        </header>

        <script src"<?php echo BOOSTRAP;?>/jquery/jquery.min.js"></script>
  <script src"<?php echo BOOSTRAP;?>/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src"<?php echo BOOSTRAP;?>/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for this template -->
  <script src="<?php echo JS;?>/stylish-portfolio.min.js"></script>
  <!-- Bootstrap core JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <!-- Contact form JS-->
  <script src="<?php echo ASSETS;?>/mail/jqBootstrapValidation.js"></script>
  <script src="<?php echo ASSETS;?>/mail/contact_me.js"></script>
  <!-- Core theme JS-->
  <script src="<?php echo JS;?>/scripts.js"></script>
</body>
<footer>

</footer>
</html>