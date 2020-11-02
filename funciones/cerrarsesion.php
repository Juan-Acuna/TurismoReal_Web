<?php
include_once 'global.php';

setcookie('token', '', time()-3600,  '/');
header('Location: '.VISTAS.'/'); 
die();

?>