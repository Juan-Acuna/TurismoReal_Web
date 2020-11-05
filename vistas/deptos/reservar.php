<!DOCTYPE html>
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
        <script src="<?php echo VENDOR;?>/js/boostrap.js"></script>
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
    /* DOMS */
    var txtTotal;
    var selects;
    var selecta;
    var contenedorS;
    var contenedorA;
    var contenedorI;
    var dtI;
    var dtF;
    var txtCostoServicios;
    var txtServicios;
    var txtCostoEstadia;
    var txtDias;
    /* CONTADORES */
    var cuentaS = 0;
    var cuentaA = 0;
    var cuentaI = 0;
    /* VARIABLES PARA TOTAL */
    var idDepto = 0;
    var json = "";
    var carga = {};
    var costoTotal = 0;
    var costoDias = 0;
    var costoServicios = 0;
    var costoInventario = 0;
    var costoAcompanante = 0;
    var cantDias = 0;
    /* VARIABLES PARA VALIDADORES DE FECHAS */
    var arriendo=0;
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
                txtCostoEstadia.innerText="$"+arriendo*d;
                if(d>0){
                    txtDias.innerText="("+d+" Dias.)";
                }else{
                    txtDias.innerText="";
                }
            }
            cantDias = d;
            costoDias = arriendo*d;
            actualizarJson();
        }
    }
    window.onload = function(){
        txtTotal = document.getElementById("txtTotal");
        contenedorS= document.getElementById("contservicios");
        //contenedorA= document.getElementById("contacom");
        //contenedorI= document.getElementById("continv");
        txtCostoServicios = document.getElementById("txtCostoServicios");
        txtServicios = document.getElementById("txtServicios");
        dtI = document.getElementById("dtI");
        dtF = document.getElementById("dtF");
        txtCostoEstadia = document.getElementById("txtCostoEstadia");
        txtDias = document.getElementById("txtDias");
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
        selects = document.getElementById("selects");
    }
    function agregarServicio(){
            if(selects.value!=""){
                if(cuentaS>=1){
                    contenedorS.style.display="inline-block";
                }else{
                    contenedorS.style.display="none";
                }
                var elegida = selects.options[selects.selectedIndex];
                var nombre=elegida.getAttribute("data-nombre");
                var centro="Centro";//elegida.getAttribute("data-centro");
                var cupos=1;
                var totalCupos=1;//POR CALCULO
                var costo=elegida.getAttribute("data-costo");
                var id=elegida.getAttribute("value");
                var desde=elegida.getAttribute("data-inicio");
                var hasta=elegida.getAttribute("data-fin");
                var r = crearContenedorServicio(id,nombre,centro,cupos,totalCupos,costo,desde,hasta,selects.selectedIndex);
                var t = contenedorS.innerHTML;
                elegida.disabled=true;
                contenedorS.innerHTML=t+r;
                cuentaS++;
                if(cuentaS>=1){
                    contenedorS.style.display="block";
                }else{
                    contenedorS.style.display="none";
                }
                costoServicios+=parseInt(costo);
                selects.selectedIndex=0;
                txtCostoServicios.innerText="$"+costoServicios;
                if(cuentaS>0){
                txtServicios.innerText="(Servicios contratados: "+cuentaS+")";
                }else{
                txtServicios.innerText="";
                }
                actualizarJson();
            }
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
            $resserv = peticion_http('http://turismoreal.xyz/api/servicio/localidad/'.$depto['id_localidad']);
            $serv=[];
            $s=true;
            if($resserv['statusCode']==200){
                $serv=$resserv['contenido'];
            }else{
                $s=false;
            }
            $actual = IMG.'/nodispon.png';
            $fotos = peticion_http('http://turismoreal.xyz/api/Foto/'.$depto['id_depto']);
            if($fotos['statusCode']==200){
                $actual = $fotos['contenido'][0]['ruta'];
            }
            $h= "un dormitorio";
                if($depto['habitaciones']>1){
                    $h= $depto['habitaciones']." dormitorios";
                }
                $b= "un baño";
                if($depto['banos']>1){
                    $b= $depto['banos']." baños";
                }
            echo '<header class="wrap">
    
            <section class="depa-list">
                <div class="depa-item" category="dep1">  
               
                    <img class="fotoaa" src="'.$actual.'" alt="aaa" width="510x700" >
                    
                    <div class="tituloaa" style="width:35%;">
                            <H3>'.$depto['nombre'].'</H3>
                            <a>Departamento de '.$depto['mts_cuadrados'].' metros cuadrados, ubicado en la
                             localidad de '.$loc['nombre'].', este cuenta con '.$h.', '.$b.', cocina
                              y una amplia sala de estar.</a>
                    </div>  
                    <div class="tituloaa" style="width:25%;margin-left:2%;">
                            <H3>Arriendo(diario): $'.$depto['arriendo'].'</H3>
                            
                    </div> 
                </div>
                
            </section> ';
    echo '<script>arriendo='.$depto['arriendo'].';
            idDepto='.$depto['id_depto'].';
          </script>
    <section class="depa-list">
    <div class="depa-item" category="dep1">  
        <div class="formcompra">
            
            <div class="contenedor">
                <H1>Estadia</h1>
                <div class="input-contenedor" style="text-align:right">
                    
                <label>Inicio Estadia</label>
                    <input id="dtI" type="date"/>
                    </br>
                    
                    <label>Fin Estadia</label>
                    <input id="dtF" type="date"/>
                </div>
                <h2 class="txt-costo">Costo Estadia: <span id="txtCostoEstadia">$0</span> <span id="txtDias"></span></h2>

            </div>
    </section>
    <section class="depa-list">        
        <div class="contenedor">
        <H1 style="position: relative;">Acompañantes</h1>
            <p class="txt-opciones">Una nueva aventura se disfruta más en compañía, por eso, puedes invitar a quienes 
            ya te han acompañado antes o agregar un nuevo compañero de aventuras.
             Si decides tomarte un tiempo a solas no hay problema, solo deja esta sección vacía.</p>';
    $acom=true;
    $max = 'un acompañante';
    if(($depto['habitaciones']-1)>1){
        $max =($depto['habitaciones']-1).' acompañantes';
    }else if(($depto['habitaciones']-1)<=0){
        $acom=false;
    }
    if($acom)
    {
        echo '<p><b>Máximo de acompañantes determinado por la cantidad de habitaciones (Máximo '.$max.').</b></p>';
        $resacom = peticion_http('http://turismoreal.xyz/api/acompanante/usuario/'.$_COOKIE['username']);
        switch($resacom['statusCode']){
            case 200:
                echo '<div class="input-contenedor">
                    <buttom class="btn btn-primary btn-xl text-uppercase aserv" style="width:90%;margin:0px;">Añadir Acompañante</buttom>
                    <p style="margin:0px;font-size:21px;">o</p>
                    <select id="selecta" style="width:90%;">
                        <option value="">Seleccione Acompañante</option>';
                foreach($resacom['contenido'] as $a){
                    echo '<option value="'.$a['acompanante']['id_acom'].'">'.$a['persona']['nombres'].' '.$a['persona']['apellidos'].'</option>';
                }
                    echo '</select>
                </div><buttom class="btn btn-primary btn-xl text-uppercase aserv">Añadir Selección</buttom>';
                break;
            default:
                echo '<div class="input-contenedor">
                    <buttom class="btn btn-primary btn-xl text-uppercase aserv" style="width:90%;margin:0px;">Añadir Acompañante</buttom>
                    </div>';
                break;
        }
    }else{
        echo '<p><b>Máximo de acompañantes determinado
         por la cantidad de habitaciones. Este departamento solo permite la estadía de una persona.</b></p>';
    }
    echo '</section><section class="depa-list">     
        <div class="contenedor">
            <H1 style="position: relative;">Servicios Extra</h1>
            <p class="txt-opciones">En Turismo Real nos preocupamos de nuestros consumidores y su experiencia 
            durante su estancia en cualquiera de nuestros departamentos. Debido a esto, es que contamos 
            con servicios turisticos proveidos por 6 de los centros turisticos mas destacados a lo largo del país.</p>
            <p><b>Puedes contratar todos los servicios diferentes que desees. Solo se permite 
            un cupo por persona en cada servicio, ya que estos constan de un máximo de cupos mensuales. Todos los acompañantes 
            pueden contratar un cupo.</b></p>';
                if($s){
                    echo '<div class="input-contenedor">
                         <select id="selects" style="width:90%;">
                             <option value="">Seleccione servicio</option>';
                             foreach($serv as $ser){
                                 echo '<option value="'.$ser['id_servicio'].'" 
                                 data-nombre="'.$ser['nombre'].'" data-costo="'.$ser['valor'].'"
                                 data-inicio="'.date('H:i',strtotime($ser['inicio'])).'" data-fin="'.date('H:i',strtotime($ser['fin'])).'" 
                                data-localidad="'.$ser['id_localidad'].'">'.$ser['nombre'].' - $'.$ser['valor'].'</option>';
                             }
                         echo '</select>
                     </div><buttom onclick="agregarServicio()" class="btn btn-primary btn-xl text-uppercase aserv" >Añadir selección</buttom>
                     <h2 class="txt-costo">Costo Servicios: <span id="txtCostoServicios">$0</span> <span id="txtServicios"></span></h2>';
                     //AQUI VAN LOS CONTENEDORES
                     echo '</div>
    <div class="depa-list mt-1 pb-0" id="contservicios" style="display:none;">
    </div>';
                }else{
                    echo '<h3>Esta localidad no cuenta con servicios aún.<h3>';
                }

        echo '</section>
    <section class="depa-list">        
        <div class="contenedor">
            <H1>Costo total de reserva: $<span id="txtTotal">0</span></h1>
        </div>
<form method="POST" action="'.DEPTOS.'/confirmar-reserva.php" style="text-align:right;">
    <input type="hidden" value="" name ="json" id="sender">
    <button type="submit" class="btn btn-primary btn-xl text-uppercase">Continuar</button>
</form>
    </section>
</div>
</div>
</section>
</header>';
}
}
?>
<script>
function actualizarJson(){
    CalcularTotal();
    json = toJson();
    document.getElementById("sender").value=json;
    console.log(json);
}
function toJson(){
    var inicio = dtI.value;
    var fin = dtF.value;
    var servicios = [];
    var acompanantes = [];
    var inventario = [];
    //SE LLENAN LOS ARREGLOS
    var sers = document.getElementsByClassName("CONT-SERV");
    for(var i=0; i< sers.length;i++){
        servicios.push({
        "id_servicio": parseInt(sers[i].getAttribute("data-id")),
        "nombre": sers[i].getAttribute("data-nombre"),
        "centro": sers[i].getAttribute("data-centro"),
        "cupos": parseInt(sers[i].getAttribute("data-cupos")),
        "costo": parseInt(sers[i].getAttribute("data-costo")),
        "inicio": sers[i].getAttribute("data-desde"),
        "fin": sers[i].getAttribute("data-hasta")
    });
    }
    var estadia = {
        "inicio":inicio,
        "fin":fin,
        "dias":cantDias,
        "costo":costoDias
    };
    carga = {
        "id_depto":idDepto,
        "estadia":estadia,
        "servicios":servicios,
        "acompanantes":acompanantes,
        "inventario":inventario,
        "total":costoTotal
    };
    return JSON.stringify(carga);
}
function CalcularTotal(){
costoTotal = costoDias + costoServicios + costoInventario + costoAcompanante;
txtTotal.innerText=costoTotal;
}
function crearContenedorServicio(id,nombre,centro,cupos,totalCupos,costo,desde,hasta,index){
    var plantilla ="<div id=\"serv-{ID}\"class=\"cont-seleccion CONT-SERV\" "
                +"data-id=\"{ID}\" data-nombre=\"{NOMBRE}\" data-centro=\"{CENTRO}\" "
                +"data-cupos=\"{CUPOS}\" data-costo=\"{COSTO}\" data-desde=\"{DESDE}\""
                +" data-hasta=\"{HASTA}\">"
                +"<h4 class=\"t-seleccion\">{NOMBRE}</h4>"
                +"<hr class=\"l-seleccion\">"
                +"<h6 class=\"subt-seleccion\">{CENTRO}</h6>"
                +"<p class=\"txt-seleccion\">Horario: {DESDE} - {HASTA}</p>"
                +"<p class=\"txt-seleccion\">Costo por cupo: ${COSTO}</p>"
                +"<p class=\"txt-seleccion\">Cupos solicitados: {CUPOS}/{TOTAL}</p>"
                +"<p class=\"btn btn-primary text-uppercase mb-0\">Solicitar cupo</p>"
                +"<p onclick=\"quitarContenedorServicio('serv-{ID}',{COSTO},{INDEX})\" class=\"btn btn-primary text-uppercase mb-0\" style=\"float:right\">Quitar</p>"
                +"</div>";
    return plantilla.replace("{ID}",id)
                    .replace("{ID}",id)
                    .replace("{ID}",id)
                    .replace("{NOMBRE}",nombre)
                    .replace("{NOMBRE}",nombre)
                    .replace("{CENTRO}",centro)
                    .replace("{CENTRO}",centro)
                    .replace("{DESDE}",desde)
                    .replace("{DESDE}",desde)
                    .replace("{HASTA}",hasta)
                    .replace("{HASTA}",hasta)
                    .replace("{COSTO}",costo)
                    .replace("{COSTO}",costo)
                    .replace("{COSTO}",costo)
                    .replace("{CUPOS}",cupos)
                    .replace("{CUPOS}",cupos)
                    .replace("{TOTAL}",totalCupos)
                    .replace("{TOTAL}",totalCupos)
                    .replace("{INDEX}",index);
    
    
}
function quitarContenedorServicio(id,costo,index){
    document.getElementById("contservicios").removeChild(document.getElementById(id));
    cuentaS -= 1;
    var elegida = selects.options[index];
    elegida.disabled=false;
    costoServicios-=parseInt(costo);
    selects.selectedIndex=0;
    txtCostoServicios.innerText="$"+costoServicios;
    if(cuentaS>0){
        txtServicios.innerText="(Servicios contratados: "+cuentaS+")";
    }else{
        txtServicios.innerText="";
    }
    if(cuentaS>=1){
        contenedorS.style.display="block";
    }else{
        contenedorS.style.display="none";
    }
    actualizarJson();
}
</script>
</body>
