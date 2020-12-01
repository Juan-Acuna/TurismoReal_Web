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
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Asignar</button></td>
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
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Asignar</button></td>
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
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Asignar</button></td>
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
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Asignar</button></td>
                   
                </tr>  
            </tbody>
        </table>
        
        

<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar Chofer/Vehiculo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class=" text-center  formularioregistro container" style="Background-color:transparent!important">
                        <div class="row text-center justify-content-center ">
                          <div class="contenedor text-center col-xs-12 col-lg-12" >
                          <p>Chofer</p>
                          
                            <select class="form-control mb-3" class="form-control" name="region" placeholder="Región" id="regiones"></select>
                            <p>Vechiculo</p>
                            <select class="form-control mb-3" name="comuna" placeholder="Comuna" id="comunas"> </select>
                          </div>    
                        </div>
                      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
<script src="<?php echo JS;?>/popper.min.js" ></script>
<script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>