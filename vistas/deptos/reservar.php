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
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <script src="<?php echo BOOSTRAP;?>/js/boostrap.js"></script>
        <link href="<?php echo CSS;?>/styles.css" rel="stylesheet" />
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link href="<?php echo CSS;?>/styles.css" rel="stylesheet" />
        <link href="<?php echo CSS;?>/stylish-portfolio.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="<?php echo CSS;?>/compradepa.css">
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<script>

    var dtI;
    var dtF;
    var costo;
    var arriendo=0;
    var dias;
    function DiferenciaFechas(f1,f2)
     {
            var fecha1 = moment(f1);
            var fecha2 = moment(f2);
            return fecha2.diff(fecha1, 'days');
     }
     function CalcularEstadia(){
        if(dtI.value!=null && dtF.value!=null){
            var d = DiferenciaFechas(dtI.value,dtF.value);
            if(d>=0){
                costo.innerText="$"+arriendo*d;
                if(d>0){
                    dias.innerText="("+d+" Dias.)";
                }else{
                    dias.innerText="";
                }
            }
        }
    }
    window.onload = function(){
        dtI = document.getElementById("dtI");
        dtF = document.getElementById("dtF");
        costo = document.getElementById("costo");
        dias = document.getElementById("dias");
        dtI.min=moment(new Date()).add(1,'days').format("YYYY-MM-DD");
        dtF.min=moment(new Date()).add(1,'days').format("YYYY-MM-DD");
        dtI.addEventListener("change",function(){
            var f = moment(dtI.value);
            dtF.min=f.add(1,'days').format("YYYY-MM-DD");
            CalcularEstadia();
        });
        dtF.addEventListener("change",function(){
            var f = moment(dtF.value);
            dtI.max=f.format("YYYY-MM-DD");
            CalcularEstadia();
        });
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
                <div class="depa-item" category="dep1">  
               
                    <img class="fotoaa" src="'.$actual.'" alt="aaa" width="510x700" >
                
                    <div class="tituloaa">
                            <H3>'.$depto['nombre'].'</H3>
                            <a>Departamento ubicado en la localidad de '.$loc['nombre'].',  este cuenta con '.$depto['habitaciones'].' habitaciones, '.$depto['banos'].' baños </a>
                    </div>   
                </div>
                
            </section> ';
    echo '<script>arriendo='.$depto['arriendo'].'</script>
    <section class="depa-list">
    <div class="depa-item" category="dep1">  
        <form class="formcompra">
            
            <div class="contenedor">
                <H1>Estadia</h1>
                <div class="input-contenedor" >
                    
                <label>Inicio Estadia</label>
                    <input id="dtI" type="date" name="iestadia"/>
                    </br>
                    
                    <label>Fin Estadia</label>
                    <input id="dtF" type="date" name="festadia"/>
                </div>
                <h2 style="display:inline-block; margin-left:10%;">Costo Estadia: <span id="costo">$0</span> <span id="dias"></span></h2>

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
</body>