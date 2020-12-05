<html>
<head>
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    include "../../controladores/peticion.php";
?>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Turismo Real</title>
        <link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
        
        <!-- Font Awesome icons (free version)-->
        
        <!-- Google fonts-->

        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
</head>



<body>
<?php

include "../../assets/includes/navbar.php";

?>

<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right " style="margin-top:80px" id="sidebar-wrapper">
<div class="sidebar-heading">Contenidos </div>
  <div class="list-group list-group-flush">
  <a href="<?php echo GESTION;?>/vermulta.php" class="list-group-item list-group-item-action bg-light">Ver Multas</a>
    <a href="<?php echo GESTION;?>/verreservas.php" class="list-group-item list-group-item-action bg-light">Ver Reservas</a>
    <a href="<?php echo GESTION;?>/verservicio.php" class="list-group-item list-group-item-action bg-light">Ver Servicio</a>
    <a href="<?php echo GESTION;?>/vertransporte.php" class="list-group-item list-group-item-action bg-light">Ver Transporte</a>
    <a href="<?php echo GESTION;?>/ver" class="list-group-item list-group-item-action bg-light">Profile</a>
    <a href="<?php echo GESTION;?>/ver" class="list-group-item list-group-item-action bg-light">Status</a>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper"class="mt-1 ">

  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mt-3">
    <button class="btn btn-primary" id="menu-toggle">Sidebar</button>



  </nav>
  <div class="col-xs-8">
        <h2>Administrador de Reservas</h2><br>
    <h3>Ver Multas</h3>
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="th-sm">Nombre Cliente</th>
                        <th class="th-sm">Fecha</th>
                        <th class="th-sm">Nombre Dpto</th>
                        <th class="th-sm">Valor</th>
                        <th class="th-sm">Tipo Multa</th>
                        <th class="th-sm">Estado Pago</th>
                    </tr>   
                </thead>
                <tbody>
                    <tr>
                        <td>Juana Macckena</td>
                        <td>23/11/2020
                        </td>
                        <td>Departamento Colombia</td>
                        <td>$35.000</td>
                        <td>Destruccion Inmueble</td>
                        <td>No Pagado
                        </td>
                    </tr>
                    <tr>
                        <td>Oscar Leandro</td>
                        <td>03/09/2050
                        </td>
                        <td>Departamento PentBerg</td>
                        <td>$50.000</td>
                        <td>Destruccion Inmueble</td>
                        <td>Pagado
                        </td>
                    </tr>
                    <tr>
                        <td>Nome Obliguesa Usarel Serebro</td>
                        <td>24/06/2019
                        </td>
                        <td>Departamento McMiller</td>
                        <td>$95.000</td>
                        <td>Uso Inadecuado</td>
                        <td>No Pagado
                        </td>
                    </tr>
                    <tr>
                        <td>Don dima don</td>
                        <td>23/11/2020
                        </td>
                        <td>Departamento Buena Vista</td>
                        <td>$120.000</td>
                        <td>Uso Inadecuado</td>
                        <td>Pagado
                        </td>
                    </tr>  
                </tbody>
            </table>
            <button class="btn btn-primary">Modificar</button>
        </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->


</div>
<!-- /#wrapper -->
<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>  

<!-- Bootstrap core JavaScript -->
<script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
<script src="<?php echo JS;?>/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>
        
        






    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>