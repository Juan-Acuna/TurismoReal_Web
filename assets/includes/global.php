<?php
/* RUTAS BASE */
define("OFFLINE_URL","http://localhost/Agencia");
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
/* CODIGOS ERROR */
define('ERROR_CONEXION',101);
define('ERROR_ROL',102);
define('ERROR_PETICION',103);
define('ERROR_404',104);
define('ERROR_DATOS',105);
define('ERROR_SESION',106);
/* FUNCIONES */
function MostrarError($error = ERROR_CONEXION){
    header('Location:'.ERROR.'?codigo-error='.$error);
}
function ValidarLogin(){
    if(!isset($_COOKIE['token']) || !isset($_COOKIE['username']) || !isset($_COOKIE['rol'])){
        header('Location: '.CUENTA.'/iniciar-sesion.php');
        die();
    }
}
function ValidarRol(...$roles){
    if(isset($_COOKIE['rol'])){
        $b = true;
        foreach($rolse as $rol){
            if($_COOKIE['rol']==$rol){
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