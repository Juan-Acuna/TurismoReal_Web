var url = "http://turismoreal.xyz/api"; //ONLINE
//var url = "http://localhost/api"; //OFFLINE
var peticion = new XMLHttpRequest();
var peticion2 = new XMLHttpRequest();
var peticion3 = new XMLHttpRequest();
var comunas = "";
var regiones = [];
var cbRegiones;
var cbComunas;
var cbGenero;
var txtUsername;
var txtError;
var txtRut;
window.onload = function(){
    peticion.open("GET", url+"/publico/util/regiones.json", true);
    peticion.send();
    peticion2.open("GET", url+"/genero", true);
    peticion2.send();
    cbRegiones = document.getElementById("regiones");
    cbComunas = document.getElementById("comunas");
    cbGenero = document.getElementById("genero");
    txtUsername = document.getElementById("usuario");
    txtUsername.addEventListener("input",VerificarDisp);
    cbRegiones.addEventListener("change",CargarComunas);
    cbGenero.innerHTML="<option>Seleccione Genero</option>";
    cbRegiones.innerHTML="<option>Seleccione Región</option>";
    cbComunas.innerHTML="<option>Seleccione Comuna</option>";
    cbComunas.disabled = true;
    txtError = document.getElementById("usuarioerror");
    txtError.style.color="#ff0000";
    ocultarError();
    txtRut = document.getElementById("txtRut");
    txtRut.addEventListener("input", CargarRut);
    txtRut.maxLength = 10;
}
function CargarRegiones(json){
    var r = "<option>Seleccione Región</option>";
    for(var i=0;i<json.length;i++){
        r += "<option value=\""+json[i].region+"\">"+json[i].region+"</option>";
    }
    cbRegiones.innerHTML = r;
}
function CargarComunas(){
    var index = cbRegiones.selectedIndex;
    if(index>=0){
        var c = "<option>Seleccione Comuna</option>";
        for(var i=0;i<regiones[index].comunas.length;i++){
            c += "<option value=\""+regiones[index-1].comunas[i].nombre+"\">"+regiones[index-1].comunas[i].nombre+"</option>";
        }
        cbComunas.innerHTML=c;
        cbComunas.disabled = false;
    }
}
function CargarGenero(json){
    var g = "<option>Seleccione Genero</option>";
    for(var i=0;i<json.length;i++){
        g += "<option value=\""+json[i].id_genero+"\">"+json[i].nombre+"</option>";
    }
    cbGenero.innerHTML = g;
}
function VerificarDisp(){
    txtUsername.style.outlineColor = "#000000";
    if(txtUsername.value.length>=5){
        peticion3.open("GET", url+"/publico/util/disponible/username/"+txtUsername.value, true);
        peticion3.send();
    }else if(txtUsername.value.length>0){
        txtUsername.style.borderColor = "#ff0000";
        txtUsername.style.outlineColor = "#ff0000";
        mostrarError("El usuario no debe ser menor que 5 carácteres.");
    }else{
        txtUsername.style.borderColor = "#000000";
        txtUsername.style.outlineColor = "#000000";
        ocultarError();
    }
}
function txtUsernameError(disponible){
    if(disponible){
        txtUsername.style.borderColor = "#00dd00";
        txtUsername.style.outlineColor = "#00dd00";
        ocultarError();
    }else{
        txtUsername.style.borderColor = "#ff0000";
        txtUsername.style.outlineColor = "#ff0000";
        txtUsername.focus();
        mostrarError("Usuario no disponible.");
    }
}
function mostrarError(mensaje){
    txtError.innerText = mensaje;
    txtError.style.display = "inline-block";
}
function ocultarError(){
    txtError.innerText = "";
    txtError.style.display = "none";
}
peticion.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        regiones=JSON.parse(this.responseText);
        CargarRegiones(regiones);
    }
}
peticion2.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        CargarGenero(JSON.parse(this.responseText));
    }
}
peticion3.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var dis = JSON.parse(this.responseText);
        txtUsernameError(dis.disponible);
    }
}

function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}
function CargarRut() {
    checkRut(txtRut);
}