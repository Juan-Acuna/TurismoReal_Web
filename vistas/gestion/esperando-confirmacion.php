<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    ValidarLogin();
    ValidarRol(1,4);
    ValidarGet('data');
    $data = explode(',',base64_decode(urldecode($_GET['data'])));
    if($data[0]!='data-valida'){
        MostrarError(ERROR_PETICION);
    }
    $rol=$_COOKIE['rol'];
    $idres = $data[1];
?>
<html>
  <head>
      <?php include F_HEAD;
    echo '<script>
    var idd='.$idres.';
    </script>';  
      ?>
    <script>
        var pconfirm = new XMLHttpRequest();
        window.onload=function(){
            pconfirm.open("GET", "http://www.turismoreal.xyz/api/reserva/status/"+idd,true);
            pconfirm.send();
            setTimeout(enviarpeticion,6000);
        }
        function enviarpeticion(){
            setTimeout(enviarpeticion,3000);
            try{
                pconfirm.send();
            }
            catch(e){
                console.log(e);
                pconfirm.open("GET", "http://www.turismoreal.xyz/api/reserva/status/"+idd,true);
            }
        }
        pconfirm.onreadystatechange = function() {
            if (pconfirm.readyState == 4 && pconfirm.status == 200) {
                console.log(pconfirm.responseText);
                obj=JSON.parse(pconfirm.responseText);
                console.log(obj.confirmado);
                if(obj.confirmado){
                    Obj("titulo").innerText="¡Check In confirmado!";
                    Obj("sub").innerText="El Check-In de la reserva ha sido confirmado. Para regresar a la pantalla de gestion, presione el botón a continuación.";
                    Obj("cargando").classList.add("d-none");
                    Obj("boton").classList.remove("d-none");
                }
            }
        }
    </script>
  </head>
  <body class="bg-white">
  <?php
echo '<div disabled>';
include F_FAKE_NAVBAR;
echo '</div>

<div class="container bg-white vh">
        <div class="row text-center">
            <div class="col-12 mt-5">
                <h3 id="titulo">Esperando confirmacion del cliente</h3>
                <p id="sub"></p>
            </div>
            <div class="col-12">
                <img id="cargando" src="'.IMG.'/cargando.gif" alt="Cargando...">
                <button id="boton" class="btn btn-primary d-none" onclick="window.location.href=\''.GESTION.'/index.php#'.GESTION_CHECKIN.'\'">Volver</button>
            </div>
        </div>
    </div>';
    include F_FOOTER;
?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
  </body>
</html>