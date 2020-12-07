
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
function loadReservar(){
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
                contenedorS.classList.add("d-flex");
                contenedorS.classList.remove("d-none");
            }else{
                contenedorS.classList.remove("d-flex");
                contenedorS.classList.add("d-none");
            }
            var elegida = selects.options[selects.selectedIndex];
            var nombre=elegida.getAttribute("data-nombre");
            var centro=elegida.getAttribute("data-centro");
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
    if(cuentaS>0){
        contenedorS.classList.add("d-flex");
        contenedorS.classList.remove("d-none");
    }else{
        contenedorS.classList.remove("d-flex");
        contenedorS.classList.add("d-none");
    }
    actualizarJson();
}