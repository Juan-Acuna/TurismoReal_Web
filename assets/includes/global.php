<?php
/* RUTAS BASE */
define("HOST_URL","http://localhost");
define("OFFLINE_URL",HOST_URL."/Agencia");
define("ONLINE_URL","https://turismoreal-2020.000webhostapp.com");
define("API_URL","http://turismoreal.xyz");
define("BASE_URL",OFFLINE_URL);
define("SRC_URL",OFFLINE_URL);
define("FUNCIONES",BASE_URL.'/controladores');
define("MODELOS",$_SERVER['DOCUMENT_ROOT'].'/Agencia/modelos');
define("VISTAS",BASE_URL.'/vistas');
define("IMG",SRC_URL.'/assets/img');
define("CSS",SRC_URL.'/assets/css');
define("JS",SRC_URL.'/assets/js');
define("ASSETS",SRC_URL.'/assets');
define("INCLUDES",BASE_URL.'/assets/includes');
define("VENDOR",SRC_URL."/vendor");
define("BOOSTRAP",VENDOR);
/* RUTAS */
define("DEPTOS",VISTAS."/deptos");
define("GESTION",VISTAS."/gestion");
define("GESTION_INCLUDES",GESTION."/includes");
define("CUENTA",VISTAS."/cuenta");
define("NOTIFICACIONES",CUENTA."/notificaciones");
define("RESERVAS",CUENTA."/reservas");
define("ERROR",VISTAS."/error.php");
/* ARCHIVOS */
define('F_PETICION',$_SERVER['DOCUMENT_ROOT'].'/Agencia/controladores/peticion.php');
define('F_MODELOS',$_SERVER['DOCUMENT_ROOT'].'/Agencia/modelos/ProxyModelos.php');
define('F_NAVBAR',$_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/navbar.php');
define('F_FAKE_NAVBAR',$_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/fake_navbar.php');
define('F_FOOTER',$_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/footer.php');
define('F_HEAD',$_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/head_basico.php');
/* CODIGOS ERROR */
define('ERROR_CONEXION',550101);
define('ERROR_ROL',400102);
define('ERROR_PETICION',212103);
define('ERROR_404',550104);
define('ERROR_DATOS',550105);
define('ERROR_SESION',400106);
define('ERROR_SERVIDOR',550107);
/* OTRAS VARIABLES */
define('GESTION_MULTAS','Multas');
define('GESTION_RESERVAS','Reservas');
define('GESTION_SERVICIOS','Servicios');
define('GESTION_TRANSPORTE','Transporte');
define('GESTION_CHECKIN','CheckIn');
define('GESTION_CHECKOUT','CheckOut');
define('GESTION_MANTENCIONES','Mantenciones');
/* FUNCIONES */
function MostrarError($error = ERROR_CONEXION){
    header('Location:'.ERROR.'?codigo-error='.$error.'&source='.urlencode(base64_encode($_SERVER['SCRIPT_FILENAME'])).'&to='.urlencode(base64_encode(HOST_URL.$_SERVER['REQUEST_URI'])));
    die();
}
function ValidarCookie(...$variables){
    foreach($variables as $v){
        if(!isset($_COOKIE[$v])){
            MostrarError(ERROR_PETICION);
        }
    }
}
function ValidarPost(...$variables){
    foreach($variables as $v){
        if(!isset($_POST[$v])){
            MostrarError(ERROR_PETICION);
        }
    }
}
function ValidarGet(...$variables){
    foreach($variables as $v){
        if(!isset($_GET[$v])){
            MostrarError(ERROR_PETICION);
        }
    }
}
function ValidarLogin(){
    if(!isset($_COOKIE['token']) || !isset($_COOKIE['username']) || !isset($_COOKIE['rol'])){
        header('Location: '.CUENTA.'/iniciar-sesion.php');
        die();
    }
}
function Logeado(){
    return isset($_COOKIE['token']) && isset($_COOKIE['username']) && isset($_COOKIE['rol']);
}
function ValidarRol(...$roles){
    if(isset($_COOKIE['rol'])){
        $b = true;
        foreach($roles as $r){
            if($_COOKIE['rol']==$r){
                $b=false;
            break;
            }
        }
        if($b){
            MostrarError(ERROR_ROL);
        }
    }else{
        MostrarError(ERROR_SESION);
    }
}
?>