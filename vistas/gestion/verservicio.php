<?php
    include_once 'global.php';
?>
<html>
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
        <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
  </head>
  <body class="col-lg-10 text-center text-lg-left">
    <h2>Administrador de Servicios</h2><br>
      <h3>Ver Servicios</h3>
       <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="th-sm">Nombre Servicio</th>
                    <th class="th-sm">Fecha Inicio</th>
                    <th class="th-sm">Fecha Fin</th>
                    <th class="th-sm">Valor Servicio</th>
                </tr>   
            </thead>
            <tbody>
                <tr>
                    <td>Servicio 1</td>
                    <td>23/11/2020</td>
                    <td>23/11/2020 </td>
                    <td>50.000</td>
                </tr>
                <tr>
                    <td>Servicio 2</td>
                    <td>03/09/2050 </td>
                    <td>03/10/2050 </td>
                    <td>60.000</td>
                </tr>
                <tr>
                    <td> Servicio 3</td>
                    <td>24/06/2019</td>
                    <td>24/07/2019</td>
                    <td>70.000</td>
                </tr>
                <tr>
                    <td>Servicio 4</td>
                    <td>23/11/2020</td>
                    <td>23/12/2020</td>
                    <td>90.000</td>
                </tr>  
            </tbody>
        </table>
        <button class="btn btn-primary">Modificar</button>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
  </body>
</html>



