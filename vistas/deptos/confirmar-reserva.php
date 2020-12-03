<?php
    include "global.php";
    include F_PETICION;
    ValidarLogin();
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
</head>
<body>
<?php
include F_NAVBAR;
if(isset($_POST['json'])){
    echo '<script>
            var json='.$_POST['json'].'; 
        </script>';
    $j = json_decode($_POST['json'],true);
    echo '<div class="container border rounded" style="margin-top: 90px;">
    <h1>CONFIRMAR RESERVA</h1>';
    $res = peticion_http('http://turismoreal.xyz/api/departamento/'.$j['id_depto'],'GET','','',CLASE_DEPARTAMENTO);
    if($res['statusCode']==200){
        $d = $res['contenido'];
        $actual = IMG.'/nodispon.png';
        $fotos = peticion_http('http://turismoreal.xyz/api/Foto/'.$d->Id_depto,'GET','','',LISTA_FOTO);
        if($fotos['statusCode']==200){
            $actual = $fotos['contenido'][0]->Ruta;
        }
        $loc = (peticion_http('http://turismoreal.xyz/api/localidad/'.$d->Id_localidad,'GET','','',CLASE_LOCALIDAD))['contenido'];
        $h="una habitación";
        $b="un baño";
        if($d->Habitaciones>1){
        $h=$d->Habitaciones." habitaciones";
        }
        if($d->Banos>1){
            $b=$d->Banos." baños";
        }
        $pad = 60;
        echo '<div class="row  m-2">
        <div class="col-xs-12 col-lg-6 mb-4 mb-lg-0  border rounded ">
            <h3 class="border-bottom p-2">Departamento "'.$d->Nombre.'"</h3>
            <div class="row ">
            <div class="col-6 ">
            <p>LOCALIDAD: '.$loc->Nombre.'</p>
            <p>HABITACIONES:'.$h.'</p>
            <p>BAÑOS: '.$b.'</p>
            <p>MTS. CUADRADOS: '.$d->Mts_cuadrados.'</p>
            </div>
            <div class="col-6">
                <img class="img-fluid" src="'.$actual.'" alt="">
            </div>
            </div>
        </div>';
        echo '<div class="col-xs-12 col-lg-6 pl-4   border rounded">
        <h3 class="border-bottom p-2">ESTADIA</h3>
            <div class="row">
                <div class="col-xs-12 ">
                    <P>INICIO: '.$j['estadia']['inicio'].'</P>
                    <P>FIN: '.$j['estadia']['fin'].'</P>
                    <P>DIAS: '.$j['estadia']['dias'].'</P>
                    <P>COSTO ESTADIA: $'.$j['estadia']['costo'].'</P>
                </div>
            </div>
        </div>';
        echo '<div class="col-xs-12 col-lg-12 mt-5 border rounded">
            <H3 class=" p-2">SERVICIOS EXTRA</H3>
        <div class="row m-2">';
        $t=0;
        foreach($j['servicios'] as $s){
            $t = $t + ($s['costo'] * $s['cupos']);
            echo '<div class="col-xs-12 col-lg-6 border">
            <H5 class="text-uppercase">'.$s['nombre'].': '.str_pad('$'.($s['costo']*$s['cupos']),15,' ',STR_PAD_LEFT).'</H5>
            <p>Cupos: '.$s['cupos'].'</p>
            <P>Horario: '.$s['inicio'].' - '.$s['fin'].'</P>
        </div>';
        }
        echo '<div class="col-xs-12 col-lg-12 mt-2">
                <H5>TOTAL SERVICIOS EXTRA: $'.$t.'.</H5>
            </div>
        </div>
        </div>';
        echo '<div class="col-xs-12 col-lg-6 mt-2">
                <h3>TOTAL: $'.$j['total'].'</h3>
            </div>';
        echo '<div class="col-xs-12 col-lg-6 mt-2">
                <button class="btn btn-primary btn-sm">VOLVER A LA RESERVA</button>
                <button class="btn btn-primary btn-sm "data-toggle="modal" data-target="#exampleModalCentered" onclick="document.getElementById(\'sender\').value=JSON.stringify(json);">PROCEDER CON EL PAGO</button>
            </div>
            </div>
        </div>';
        echo '<!-- Modal -->
        <div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenteredLabel">PAGAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <P>Al continuar con esta transaccion, acepta los terminos y condiciones de uso de nuestro servicio</P>
                <p>A continuacion, se redigirá a la pagina de pago de Khipu</p>
              </div>
              <form class="modal-footer" action="'.FUNCIONES.'/reservar.php" method="POST">
                <input type="hidden" name="m" value="1">
                <input type="hidden" name="json" id="sender">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">PAGAR</button>
              </form>
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