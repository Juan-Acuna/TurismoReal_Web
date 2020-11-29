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
define("CUENTA",VISTAS."/cuenta");
define("GESTION",VISTAS."/gestion");
define("MISRESERVAS",CUENTA."/misreservas");
//define("ERROR",VISTAS."/error");
/* ARCHIVOS */
define('F_PETICION',$_SERVER['DOCUMENT_ROOT'].'/Agencia/controladores/peticion.php');
define('F_MODELOS',$_SERVER['DOCUMENT_ROOT'].'/Agencia/modelos/ProxyModelos.php');
define('F_NAVBAR',$_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/navbar.php');
define('F_FOOTER',$_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/footer.php');
/* FUNCIONES */

/* OTROS */
const FOOTER = '<footer class="bg-dark text-center text-md-right text-white ">
<div class="container">
    <div class="row">
        <div class="col-12 ">
            <p class="m-0 p-3">Copyright @2020. Dame todos tus derechos</p>
        </div>
    </div>
</div>
</footer>';
?>