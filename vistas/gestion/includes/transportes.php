<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    include F_PETICION;
    ValidarRol(3);
?>
<html>
  <head>
  <?php include F_HEAD;?>
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
        <div class="text-center formularioregistro container" style="Background-color:transparent!important">
          <div class="row text-center justify-content-center ">
            <div class="contenedor text-center col-xs-12 col-lg-12" >
              <p>Chofer</p>
              <select class="form-control mb-3" class="form-control" name="chofer"id="choferes"></select>
              <p>Vechiculo</p>
              <select class="form-control mb-3" name="vehiculo" id="vehiculos"> </select>
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