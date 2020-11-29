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
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
  </head>
  <body class="col-lg-10 text-center text-lg-left">
    <h2>Administrador de Servicios</h2><br>
<h3>Ver Transporte</h3>
       <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="th-sm">Nombre Cliente</th>
                    <th class="th-sm">Fecha</th>
                    <th class="th-sm">Nombre Dpto</th>
                    <th class="th-sm">Origen</th>
                    <th class="th-sm">Destino</th>
                    <th class="th-sm">Ida/Vuelta</th>
                    <th class="th-sm">Iniciado</th>
                    <th class="th-sm">Terminado</th>
                    <th class="th-sm">Vehiculo</th>
                    <th class="th-sm">Nombre Chofer</th>
                </tr>   
            </thead>
            <tbody>
                <tr>
                    <td>Juana Macckena</td>
                    <td>23/11/2020
                    </td>
                    <td>Departamento Colombia</td>
                    <td>Calle Bolivia</td>
                    <td>Calle Autralia</td>
                    <td>Ida</td>
                    <td>Si</td>
                    <td>No</td>
                    <td>Javier Melendez</td>
                    <td>Vehiculo A</td>
                </tr>
                <tr>
                    <td>Oscar Leandro</td>
                    <td>03/09/2050
                    </td>
                    <td>Departamento PentBerg</td>
                    <td>Calle Bolivia</td>
                    <td>Calle Autralia</td>
                    <td>Ida</td>
                    <td>Si</td>
                    <td>No</td>
                    <td>Javier Melendez</td>
                    <td>Vehiculo B</td>
                </tr>
                <tr>
                    <td>Nome Obliguesa Usarel Serebro</td>
                    <td>24/06/2019
                    </td>
                    <td>Departamento McMiller</td>
                    <td>Calle Bolivia</td>
                    <td>Calle Autralia</td>
                    <td>Ida</td>
                    <td>Si</td>
                    <td>No</td>
                    <td>Javier Melendez</td>
                    <td>Vehiculo D</td>
                </tr>
                <tr>
                    <td>Don dima don</td>
                    <td>23/11/2020
                    </td>
                    <td>Departamento Buena Vista</td>
                    <td>Calle Bolivia</td>
                    <td>Calle Autralia</td>
                    <td>Ida</td>
                    <td>Si</td>
                    <td>No</td>
                    <td>Javier Melendez</td>
                    <td>Vehiculo C</td>
                </tr>  
            </tbody>
        </table>
        <button class="btn btn-primary">Modificar</button>
<script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
<script src="<?php echo JS;?>/popper.min.js" ></script>
<script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>