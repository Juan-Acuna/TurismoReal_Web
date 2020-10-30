<?php
define("OFFLINE_URL","http://localhost:81/Agencia");//QUITAR EL 81!!!!!!!!!
define("ONLINE_URL","https://turismoreal-2020.000webhostapp.com");
define("BASE_URL",OFFLINE_URL);
define("SRC_URL",ONLINE_URL);
define("FUNCIONES",BASE_URL.'/funciones');
define("VISTAS",BASE_URL.'/vistas');
define("IMG",SRC_URL.'/assets/img');
define("CSS",SRC_URL.'/css');
define("JS",SRC_URL.'/js');
define("ASSETS",SRC_URL.'/assets');
define("INCLUDES",BASE_URL.'/includes');
/* RUTAS */
define("DEPTOS",VISTAS."/deptos");
define("CUENTA",VISTAS."/cuenta");
define("GESTION",VISTAS."/gestion");
//define("ERROR",VISTAS."/error");
?>