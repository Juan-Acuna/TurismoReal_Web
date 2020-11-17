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
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo CSS;?>/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="./fonts/icomoon/style.css">
    <link href="<?php echo CSS;?>/styles.css" rel="stylesheet" />
        <link href="<?php echo CSS;?>/stylish-portfolio.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo CSS;?>/style.css">  
    <link rel="stylesheet" href="<?php echo CSS;?>/pagar.css">
</head>
<body>
<?php
        include "../../includes/navbar.php";
        include "../../funciones/peticion.php";
        if(isset($_POST['json'])){
            echo '<script>
                    var json='.$_POST['json'].'; 
                </script>';
            $j = json_decode($_POST['json'],true);
            echo '<header class="wrap">
            <section class="depa-list mt-2">
                <div class="depa-item" style="vertical-align:top;text-align:justify;display:inline-block;">  
                        <H1 class="text-uppercase mb-5">Confirmar Reserva</H1>';
                    $res = peticion_http('http://turismoreal.xyz/api/departamento/'.$j['id_depto']);
                    if($res['statusCode']==200){
                        $d = $res['contenido'];
                        $actual = IMG.'/nodispon.png';
                        $fotos = peticion_http('http://turismoreal.xyz/api/Foto/'.$d['id_depto']);
                        if($fotos['statusCode']==200){
                            $actual = $fotos['contenido'][0]['ruta'];
                        }
                        $loc = (peticion_http('http://turismoreal.xyz/api/localidad/'.$d['id_localidad']))['contenido'];
                        $h="una habitación";
                        $b="un baño";
                        if($d['habitaciones']>1){
                            $h=$d['habitaciones']." habitaciones";
                        }
                        if($d['banos']>1){
                            $b=$d['banos']." baños";
                        }
                        $pad = 60;
                          echo '<div class="depa-list mt-3 mr-3" style="display:inline-block;width:58.5%;">
                          <h4 class="text-uppercase">Departamento "'.$d['nombre'].'"</h4>
                          <hr>
                          <div style="width:55%;display:inline-block;vertical-align:top;">
                                <p>LOCALIDAD:      '.str_pad($loc['nombre'],$pad,' ',STR_PAD_LEFT).'.</p>
                                <p>HABITACIONES:   '.str_pad($h,$pad,' ',STR_PAD_LEFT).'.</p>
                                <p>BAÑOS:          '.str_pad($b,$pad,' ',STR_PAD_LEFT).'.</p>
                                <p>MTS. CUADRADOS: '.str_pad($d['mts_cuadrados'],$pad,' ',STR_PAD_LEFT).'.</p>
                            </div>
                            <img style="width:40%;height:auto;display:inline-block;" src="'.$actual.'" alt="aaa">
                            </div>';
                            echo '<div class="depa-list mt-3" style="display:inline-block;width:40%;">
                                <H4 class="text-uppercase">Estadía</H4>
                                <hr>
                                <p>INICIO:         '.str_pad($j['estadia']['inicio'],$pad,' ',STR_PAD_LEFT).'.</p>
                                <p>FIN:            '.str_pad($j['estadia']['fin'],$pad,' ',STR_PAD_LEFT).'.</p>
                                <p>DÍAS:           '.str_pad($j['estadia']['dias'],$pad,' ',STR_PAD_LEFT).'.</p>
                                <p>COSTO ESTADÍA:  '.str_pad('$'.$j['estadia']['costo'],$pad,' ',STR_PAD_LEFT).'.</p>
                                </div>';
                                echo '<div class="depa-list mt-3 pr-0">
                                <H4 class="text-uppercase">Servicios Extra</H4>
                                <hr class="mr-4">';
                                $t=0;
                                foreach($j['servicios'] as $s){
                                    $t = $t + ($s['costo'] * $s['cupos']);
                                    echo '<div style="width:48%;display:inline-block;border:1px #bbb solid;border-radius:7px;" class="p-3 mr-4 mb-3">
                                    <h5 class="text-uppercase">'.$s['nombre'].': '.str_pad('$'.($s['costo']*$s['cupos']),15,' ',STR_PAD_LEFT).'</h5>
                                    <h6 class="text-uppercase">'.$s['centro'].'</h6>
                                    <p>Cupos: '.$s['cupos'].'</p>
                                    <p>Horario: '.$s['inicio'].' - '.$s['fin'].'</p>
                                    </div>';
                                }
                                echo '<p class="text-uppercase">Total servicios extra: $'.$t.'.</p>
                                </div><div class="depa-list mt-3">
                                <H3 class="text-uppercase">TOTAL: $'.$j['total'].'</H3>
                                <div style="text-align:end;">
                                <a class="btn btn-primary btn-xxl text-uppercase mr-2" style="display:inline-block;" href="">Volver a la reserva</a>
                                <button onclick="document.getElementById(\'id01\').style.display=\'block\';document.getElementById(\'sender\').value=JSON.stringify(json);document.getElementById(\'sender2\').value=JSON.stringify(json);" class="w3-button w3-black btn btn-primary btn-xxl text-uppercase">Proceder con el pago</button>
                                </div>
                                </div>
                        </div>
                    </section> ';
                  echo '<div id="id01" class="w3-modal">
                            <div class="w3-modal-content p-5" style="border-radius:7px;width:80%;">
                                <div class="w3-container mt-6 p-3" >
                                    <span onclick="document.getElementById(\'id01\').style.display=\'none\'" class="w3-button w3-display-topright">&times;</span>
                                    <p class="mb-3">Al continuar con esta transacción, se asume que acepta los terminos y condiciones de uso de nuestro servicio.</p>
                                    <p class="mb-5">A continuación, se le redirigirá a la página de pago de Khipu &trade;</p>
                                    <form class="mt-5" style="text-align:right;" action="'.FUNCIONES.'/reservar.php" method="POST">
                                        <input type="hidden" name="m" value="1">
                                        <input type="hidden" name="json" id="sender">
                                        <button style="background-color:transparent;border:none;display:inline-block;padding:0px;margin:0px;outline:none;" type="submit"><img src="https://s3.amazonaws.com/static.khipu.com/buttons/2015/200x75-transparent.png"></button>
                                    </form>
                                    <form class="mt-5" style="text-align:right;" action="'.FUNCIONES.'/reservar.php" method="POST">
                                        <input type="hidden" name="m" value="2">
                                        <input type="hidden" name="json" id="sender2">
                                        <button style="background-color:transparent;border:none;display:inline-block;padding:0px;margin:0px;outline:none;" type="submit">Pagar con Webpay</button>
                                    </form>
                                </div>
                            </div>
                        </div>';
                    }
                  
        }
?>
</body>