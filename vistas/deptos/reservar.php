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
        
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="./fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/aos.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/style.css">   
    <link href="<?php echo CSS;?>/styles.css" rel="stylesheet" />
        <link href="<?php echo CSS;?>/stylish-portfolio.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo CSS;?>/style.css">  
    <link rel="stylesheet" href="<?php echo CSS;?>/compradepa.css">
</head>
<body>
<script>
function restaFechas(f1,f2)
 {
 var aFecha1 = f1.split('/');
 var aFecha2 = f2.split('/');
 var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]);
 var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
 return dias;
 }
</script>
<?php
        include "../../includes/navbar.php";
        include "../../funciones/peticion.php";
        if($_GET['depaid']!=null){
            $respuesta=peticion_http('http://turismoreal.xyz/api/departamento/'.$_GET['depaid']);
        if($respuesta['statusCode']==200){
            $depto=$respuesta['contenido'];
            $loc = (peticion_http('http://turismoreal.xyz/api/localidad/'.$depto['id_localidad']))['contenido'];
            $actual = IMG.'/nodispon.png';
            $fotos = peticion_http('http://turismoreal.xyz/api/Foto/'.$depto['id_depto']);
            if($fotos['statusCode']==200){
                $actual = $fotos['contenido'][0]['ruta'];
            }
            echo '<header class="wrap">
    
            <section class="depa-list">
        <script>
        function CalcularEstadia(){
            costo.innerText="$"+('.$depto['arriendo'].'*restaFechas(dtI.value,tdF.value));
        }
        function desbloquear(){
            dtF.enabled=true;
        }
        </script>
                <div class="depa-item" category="dep1">  
               
                    <img class="fotoaa" src="'.$actual.'" alt="aaa" width="510x700" >
                
                    <div class="tituloaa">
                            <H3>'.$depto['nombre'].'</H3>
                            <a>Departamento ubicado en la localidad de '.$loc['nombre'].',  este cuenta con '.$depto['habitaciones'].' habitaciones, '.$depto['banos'].' baños </a>
                    </div>   
                </div>
                
            </section> ';
        
    echo '<section class="depa-list">

    <div class="depa-item" category="dep1">  
        <form class="formcompra">
            
            <div class="contenedor">
                <H1>Estadia</h1>
                <div class="input-contenedor" >
                    
                    <label>Fin Estadia</label>
                    <input id="dtI" type="date" name="iestadia" onvaluechange="desbloquear()"/>
                    </br>
                    <label>Inicio Estadia</label>

                    <input id="dtF" type="date" name="festadia" />
                </div>
                <h2 style="display:inline-block; margin-left:10%;">Costo Estadia: <span id="costo">$0</span></h2>

            </div>
</section>
            <section class="depa-list">        
            <div class="contenedor">
                <H1>Añadir Servicios</h1>
                <buttom class="aserv" >Añadir Servicios</buttom>
                <br>
                <div class="input-contenedor" >
                    <label>Servicio 1</label>
                    <select  name="serv1" placeholder="Servicio 1" id="servicio1"> </select>
                    </br>
                    <label>Servicio 2 </label>
                    <select  name="serv2" placeholder="Servicio 2" id="servicio2"> </select>
                    </br>
                    <label>Servicio 3 </label>
                    <select  name="serv3" placeholder="Servicio 3" id="servicio3"> </select>
                    </br>
                    <label>Servicio 4 </label>
                    <select  name="serv4" placeholder="Servicio 4" id="servicio4"> </select>
                    </br>
                    <label>Servicio 5 </label>
                    <select  name="serv5" placeholder="Servicio 5" id="servicio5"> </select>
                    </br>
                </div>

            </div>
            </section>
            <section class="depa-list"> 
            <div class="contenedor">
                <H1>Agregar Acompañante</h1>
                <buttom class="aserv" >Agregar Acompañante</buttom>
                <br>
                <div class="input-contenedor" >
                    <label>Servicio 1</label>
                    <select  name="serv1" placeholder="Servicio 1" id="servicio1"> </select>
                    </br>
                    <label>Servicio 2 </label>
                    <select  name="serv2" placeholder="Servicio 2" id="servicio2"> </select>
                    </br>
                    <label>Servicio 3 </label>
                    <select  name="serv3" placeholder="Servicio 3" id="servicio3"> </select>
                    </br>
                    <label>Servicio 4 </label>
                    <select  name="serv4" placeholder="Servicio 4" id="servicio4"> </select>
                    </br>
                    <label>Servicio 5 </label>
                    <select  name="serv5" placeholder="Servicio 5" id="servicio5"> </select>
                    </br>
                </div>

            </div>
            </section>


        </form>
        
    

  
    </div>
    

</section>
    
</header>';
}
}
?>
<script>
var dtI = document.getElementById("dtI");
var dtF = document.getElementById("dtF");
var costo = document.getElementById("costo");
$('#dtI').datepicker().on('changeDate', function (ev) {
       CalcularEstadia();
});
$('#dtF').datepicker().on('changeDate', function (ev) {
       CalcularEstadia();
});
</script>
</body>