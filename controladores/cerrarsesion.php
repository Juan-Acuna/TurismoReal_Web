<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
setcookie('token', '', time()-3600,  '/');
setcookie('rol', '', time()-3600,  '/');
setcookie('username', '', time()-3600,  '/');
header('Location: '.VISTAS.'/'); 
die();
?>