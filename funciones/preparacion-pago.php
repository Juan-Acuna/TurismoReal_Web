<?php
include_once 'global.php';
include 'peticion.php';

if($_SERVER['REQUEST_METHOD']=='GET'){
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <script>
    var pet = new XMLHttpRequest();
    var rs = '.$_GET['rs'].';
    var listo = false;
    window.onload=function(){ 
        pet.open("GET", "http://turismoreal.xyz/api/transaccion/status/'.$_GET['tr'].'", true);
        Llamar();
        //setTimeout(function(){window.location.href="'.CUENTA.'/misreservas.php";},3000);
    }
    function Llamar(){
        pet.send();
        setTimeout(Llamar,1000);
    }
    function Revisar(est){
        if(est){
            document.forms["ff"].submit();
        }
    }
    pet.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        listo=JSON.parse(this.responseText);
        Revisar(listo);
    }
}
</script>
        <h1>Esperando respuesta de los servidores de Khipu</h1>
        <p>Por favor espere...</p>
        <form action="pagar.php" method="GET" name="ff">
        <input type="hidden" name="act" value="repay">
        <input type="hidden" name="rs" id="rs">
        </form>
    </body>
    </html>';
}
?>