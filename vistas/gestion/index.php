<?php
    include_once 'global.php';
    ValidarLogin();
    ValidarRol(2,3,4);
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<html>
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Turismo Real</title>
        <link rel="icon" type="image/x-icon" href="<?php echo ASSETS;?>/img/cropped-favicon-tr.ico"  />
        <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
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
            }
            function cargarVista(id)
            {
              cont.innerHTML="";
              var s="";
              switch(id)
              {
                case 1: s="'.GESTION.'/vermulta.php"; 
                break;
                case 2: s="'.GESTION.'/verreservas.php"; 
                break;
                case 3: s="'.GESTION.'/verservicio.php"; 
                break;
                case 4: s="'.GESTION.'/vertransporte.php"; 
                break;
                case 5: s="'.GESTION.'/checkin.php"; 
                break;
                case 6: s="'.GESTION.'/checkout.php"; 
                break;
              }
              cont.innerHTML="<iframe src=\""+s+"\" frameborder=\"0\" class=\"h-100 w-100 p-0 m-0\"></iframe>";
            }
          </script>';
              if($rol==2 || $rol==1)
              {
                echo '<a onclick="cargarVista(1)" class="list-group-item list-group-item-action bg-light">Ver Multas</a>';
              }
              if($rol==2 || $rol==3 || $rol==4 || $rol==1)
              {
                echo '<a onclick="cargarVista(2)" class="list-group-item list-group-item-action bg-light">Ver Reservas</a>';
              }
              if($rol==3 || $rol==1)
              {
                echo '<a onclick="cargarVista(3)" class="list-group-item list-group-item-action bg-light">Ver Servicio</a>';
                echo '<a onclick="cargarVista(4)" class="list-group-item list-group-item-action bg-light">Ver Transporte</a>';                
              }
              if($rol==4 || $rol==1)
              {
                echo '<a onclick="cargarVista(5)" class="list-group-item list-group-item-action bg-light">Check-In</a>';
                echo '<a onclick="cargarVista(6)" class="list-group-item list-group-item-action bg-light">Check-Out</a>'; 
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