<?php
include_once 'global.php';
include 'peticion.php';

$clave = !empty($_POST['clave']);
if(!empty($_POST['nombres']) && !empty($_POST['apellidos']))
?>