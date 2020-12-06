<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    ValidarLogin();
    ValidarRol(1,2,3,4);
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<html>
<head>
  <?php include F_HEAD;?>
</head>
<body style="overflow:hidden;">
<?php
include F_NAVBAR;
echo '<div class="container-fluid"style="margin-top:80px;">
        <div class="row h-100">
          <div  class="col-lg-2 bg-light border-right">  
            <h3>Contenidos</h3>
            
            <script>
            var cont;
            window.onload=function()
            {
              cont=document.getElementById("contVista");
              VerificarVista();
            }
            function cargarVista(id)
            {
              cont.innerHTML="";
              var s="";
              switch(id)
              {
                case 1: s="'.GESTION_INCLUDES.'/multas.php"; 
                break;
                case 2: s="'.GESTION_INCLUDES.'/reservas.php"; 
                break;
                case 3: s="'.GESTION_INCLUDES.'/servicios.php"; 
                break;
                case 4: s="'.GESTION_INCLUDES.'/transportes.php"; 
                break;
                case 5: s="'.GESTION_INCLUDES.'/checkin.php"; 
                break;
                case 6: s="'.GESTION_INCLUDES.'/checkout.php"; 
                break;
                case 7: s="'.GESTION_INCLUDES.'/mantenciones.php"; 
                break;
              }
              cont.innerHTML="<div id=\"loading-img\" class=\"w-100 h-100 text-center bt-xs-2 bt-md-5 pt-xs-2 pt-md-5\"><img src=\"'.IMG.'/cargando.gif\" class=\"bt-xs-2 bt-md-5 pt-xs-2 pt-md-5\"></div><iframe id=\"iFRAME\" src=\""+s+"\" frameborder=\"0\" class=\"h-100 w-100 p-0 m-0 d-none\"></iframe>";
            }
            function VerificarVista(){
              var vst = window.location.href.split("#");
              switch(vst[vst.length-1]){
                case "'.GESTION_MULTAS.'": cargarVista(1); 
                break;
                case "'.GESTION_RESERVAS.'": cargarVista(2); 
                break;
                case "'.GESTION_SERVICIOS.'": cargarVista(3); 
                break;
                case "'.GESTION_TRANSPORTE.'": cargarVista(4);
                break;
                case "'.GESTION_CHECKIN.'": cargarVista(5); 
                break;
                case "'.GESTION_CHECKOUT.'": cargarVista(6); 
                break;
                case "'.GESTION_MANTENCIONES.'": cargarVista(7); 
                break;
              }
            }
          </script>';
    if($rol==2 || $rol==3 || $rol==1)
    {
      echo '<a href="#'.GESTION_RESERVAS.'" onclick="cargarVista(2)" class="list-group-item list-group-item-action bg-light">Reservas</a>';
    }
    if($rol==3 || $rol==1)
    {
      echo '<a href="#'.GESTION_SERVICIOS.'" onclick="cargarVista(3)" class="list-group-item list-group-item-action bg-light">Servicios</a>';
      echo '<a href="#'.GESTION_TRANSPORTE.'" onclick="cargarVista(4)" class="list-group-item list-group-item-action bg-light">Transportes</a>';                
    }
    if($rol==4 || $rol==1)
    {
      echo '<a href="#'.GESTION_CHECKIN.'" onclick="cargarVista(5)" class="list-group-item list-group-item-action bg-light">Check-In</a>';
      echo '<a href="#'.GESTION_CHECKOUT.'" onclick="cargarVista(6)" class="list-group-item list-group-item-action bg-light">Check-Out</a>'; 
      echo '<a href="#'.GESTION_MANTENCIONES.'" onclick="cargarVista(7)" class="list-group-item list-group-item-action bg-light">Mantenciones</a>'; 
    }
    if($rol==2 || $rol==1)
    {
      echo '<a href="#'.GESTION_MULTAS.'" onclick="cargarVista(1)" class="list-group-item list-group-item-action bg-light">Multas</a>';
    }
    echo '</div><div id="contVista" class="col-lg-10 text-center text-lg-left">
    </div>
  </div>';
?>
    <?php include F_FOOTER;?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>