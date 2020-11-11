<!DOCTYPE html>
<html lang="en">
    <head>
<?php
    include_once 'global.php';
    include '../../funciones/peticion.php'
?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Turismo Real</title>
        <link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <script src="<?php echo VENDOR;?>/js/boostrap.js"></script>
        <link href="<?php echo CSS;?>/styles.css" rel="stylesheet" />
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link href="<?php echo CSS;?>/styles.css" rel="stylesheet" />
        <link href="<?php echo CSS;?>/stylish-portfolio.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="<?php echo CSS;?>/misreservas.css">
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
include '../../includes/navbar.php'
?>



    <div class="container depa-list mt-6 border-0">
    
        <h2 class="titulo ml-3">Mis Reservas</h2>
        <?php
        $res = peticion_http('http://turismoreal.xyz/api/reserva/usuario/'.$_COOKIE['username'],'GET',$_COOKIE['token']);
        if($res['statusCode']==200){
            $eres = (peticion_http('http://turismoreal.xyz/api/estadoreserva','GET','',$_COOKIE['token']))['contenido'];
            $ee = array();
            $bg=array('1'=>'primary','2'=>'info','3'=>'success','4'=>'secondary','5'=>'danger');
            foreach($eres as $e){
                $ee[$e['id_estado'].''] = $e['nombre'];
            }
            foreach($res['contenido'] as $r){
                $depto=(peticion_http('http://turismoreal.xyz/api/departamento/'.$r['id_depto']))['contenido'];
                $imgs=array();
                $fotos=peticion_http('http://turismoreal.xyz/api/foto/'.$depto['id_depto']);
                echo '<div class="row m-3 mt-1 mb-1 border pb-md-2 pr-md-2 pt-md-2 pl-0">
                        <div class="col-xs-12 col-md-12"><h3><span class="text-uppercase">'.$depto['nombre'].'</span>   <span class="bg-'.$bg[$r['id_estado']].' rounded-pill p-md-2 p-xs-1 float-md-right" style="font-size:16px;color:#fff">'.$ee[$r['id_estado']].'</span></h3>
                        </div>
                        <div class="col-xs-12 col-md-4">';
                $actual = IMG.'/nodispon.png';
                if($fotos['statusCode']==200)
                {
                    $actual = $fotos['contenido'][0]['ruta'];
                }
                echo '<img class="foto img-fluid" src="'.$actual.'" >
                </div>
                <div class="col-xs-12 col-md-5"><p>Departamentio bla bla bla blabl abl abl abl abl abl abl ablablabl abl abl abla bla sdfsdfsdfsfsdfsdfsssdfdsfsdfdsbla bal lb abl abl</p>
                </div>
                <div class="col-xs-12 col-md-3">
                    <a style=""class="btn btn-primary  text-uppercase mb-1" href="'.DEPTOS.'/reservar.php?depaid='.$depto['id_depto'].'"> Detalles</a>
                </div>
                </div>';
            }
           
        }else if($res['statusCode']==400){
            //sin reservas
        }else{
            //Error
        }
        ?>
    </div>
</body>
</html>