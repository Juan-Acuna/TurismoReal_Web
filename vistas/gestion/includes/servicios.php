<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    ValidarRol(1,3);
?>
<html>
  <head>
    <?php include F_HEAD;?>
  </head>
  <body class="col-lg-10 text-center text-lg-left">
    <h2>Administrador de Servicios</h2><br>
      <h3>Ver Servicios</h3>
       <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="th-sm">Nombre Servicio</th>
                    <th class="th-sm">Hora Inicio</th>
                    <th class="th-sm">Hora Fin</th>
                    <th class="th-sm">Valor Servicio</th>
                </tr>   
            </thead>
            <tbody>
                <tr>
                    <td>Servicio 1</td>
                    <td>11:20</td>
                    <td>23:20 </td>
                    <td>50.000</td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Modificar</button>
                    <button class="btn btn-primary">Eliminar</button></td>                
                <tr>
                    <td>Servicio 2</td>
                    <td>11:20</td>
                    <td>23:20 </td>
                    <td>60.000</td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Modificar</button>
                    <button class="btn btn-primary">Eliminar</button></td>                
                <tr>
                    <td> Servicio 3</td>
                    <td>11:20</td>
                    <td>23:20 </td>
                    <td>70.000</td>
                    <td><button class="btn btn-primary"data-toggle="modal" data-target="#exampleModal">Modificar</button>
                    <button class="btn btn-primary">Eliminar</button></td>               
                <tr>
                    <td>Servicio 4</td>
                    <td>11:20</td>
                    <td>23:20 </td>
                    <td>90.000</td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Modificar</button>
                    <button class="btn btn-primary">Eliminar</button></td>
                </tr>  
            </tbody>
        </table>
        <button class="btn btn-primary">Agregar</button>


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
                          <p>Nombre Servicio</p>
                          <input class="form-control mb-3" type="text" name="nombres" placeholder="Nombre Sevicio" value="'.$p['nombres'].'"/>
                          <p>Hora Inicio</p>
                          <input class="form-control text-center" type="time" id="appt" name="appt" min="09:00" max="23:00" required>
                          <p>Hora Fin</p>
                          <input class="form-control text-center" type="time" id="appt" name="appt" min="10:00" max="1:00" required>
                          <p>Valor</p>
                          <input class="form-control" type="text">
                          <p>Cupos</p>
                          <input class="form-control" type="text">
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
    <script>
        window.onload=function(){
            DestruirObjeto(window.top.document.getElementById("loading-img"));
            window.top.document.getElementById("iFRAME").classList.remove("d-none");
        }
    </script>
  </body>
</html>



