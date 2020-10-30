<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Turismo Real</title>
        <link rel="icon" type="image/x-icon" href="<?php echo ASSETS;?>/img/cropped-favicon-tr.ico"  />
        
        <!-- Font Awesome icons (free version)-->
        
        <!-- Google fonts-->

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../src"<?php echo CSS;?>/styles.css" rel="stylesheet" />
        <link href="../src"<?php echo CSS;?>/stylish-portfolio.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./fonts/icomoon/style.css">
    <link rel="stylesheet" href="../src"<?php echo CSS;?>/bootstrap.min.css">
    <link rel="stylesheet" href="../src"<?php echo CSS;?>/jquery-ui.css">
   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
	<link rel="stylesheet" href="style.css">


        <link rel="stylesheet" href="../src"<?php echo CSS;?>/gestion.css"> 
    </head>
<body>
    <?php
        include "../../includes/navbar.php";
    ?>
<div class="wrapper">
	
    <nav id="sidebar">
        
         <div class="sidebar-header">
             <h3>Bienvenido</h3>
         </div>
         <ul class="lisst-unstyled components">
   
             <p>El pepe</p>
             <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Adm. de Reservas</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Ver Reservas</a>
                    </li>
                    <li>
                        <a href="#">Ver Multas</a>
                    </li>

                </ul>
            </li>

             <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Adm. de Servicios</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Ver Reservas</a>
                    </li>
                    <li>
                        <a href="#">Ver Servicios</a>
                    </li>
                    <li>
                        <a href="#">Ver Transporte</a>
                    </li>
                </ul>
            </li>
                <li>
                    <a href="#">Por si acaso</a>
                </li>
                <li>
                    <a href="#">Cerrar Sesion</a>
                </li>
   
         </ul>
    </nav>
   
   
   <div id="content">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  	<div class="container-fluid ">
  		<button type="button" style="position: absolute; left: -20px;" id="sidebarCollapse" class="btn  btn-info">
  			<i class="fas fa-align-left"></i>
  			<span>Abre/Cierra</span>
  			
  		</button>
  	</div>
  	  </nav>

   
   <br><br>
<?php
include "../../includes/verreservas.php";
include "../../includes/vermulta.php";
include "../../includes/vertransporte.php";
include "../../includes/verservicio.php";
?>

   </div> 
 </div>
   
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
   <script>
   
   $(document).ready(function () {
               $('#sidebarCollapse').on('click', function () {
                   $('#sidebar').toggleClass('active');
               });
           });
   
   </script>
   

    </body>
</html>