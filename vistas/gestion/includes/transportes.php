<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    ValidarRol(1,3);
    include F_PETICION;
    $res = peticion_http('http://turismoreal.xyz/api/viaje','','',$_COOKIE['token'],LISTA_VIAJE);
    function Parchar(){
      echo '<html>
      <head>';
      include F_HEAD;
      echo '</head>
      <body class="col-lg-10 text-center text-lg-left">
        <h2>Servicios de transporte</h2><br>';
    }
    switch($res['statusCode']){
      case 200:
        Parchar();
        echo '<table class="table table-bordered">
        <thead>
            <tr>
                <th class="th-sm">Cliente</th>
                <th class="th-sm">Fecha</th>
                <th class="th-sm">Departamento</th>
                <th class="th-sm">Origen</th>
                <th class="th-sm">Destino</th>
                <th class="th-sm">Ida/Vuelta</th>
                <th class="th-sm">Iniciado</th>
                <th class="th-sm">Terminado</th>
                <th class="th-sm">Chofer</th>
                <th class="th-sm">Vehiculo</th>
            </tr>   
        </thead>
        <tbody>';
        foreach($res['contenido'] as $t){
          $r = peticion_http('http://turismoreal.xyz/api/reserva/'.$t->Id_reserva,'','',$_COOKIE['token'],CLASE_RESERVA)['contenido'];
          $d = peticion_http('http://turismoreal.xyz/api/departamento/'.$r->Id_depto,'','','',CLASE_DEPARTAMENTO)['contenido'];
          $chofer ='';
          $vehiculo ='';
          if($t->Id_chofer==0 || $t->Id_chofer=='' || $t->Id_chofer==null){
            $chofer = 'No asignado';
          }else{
            echo '<td></td>';
            $c = peticion_http('http://turismoreal.xyz/api/chofer/'.$t->Id_chofer,'','',$_COOKIE['token'],CLASE_PERSONACHOFER)['contenido'];
            $chofer = $c->Persona->Nombres.' '.$c->Persona->Apellidos;
            if($t->Confirmado=='0'){
              $chofer = $chofer.'(No confirmado)';
            }
          }
          if($t->Patente=='' || $t->Patente==null){
            $vehiculo = 'No asignado';
          }else{
            $vehiculo = $t->Patente;
          }
          $u = peticion_http('http://turismoreal.xyz/api/usuario/'.$r->username,'','',$_COOKIE['token'],CLASE_PERSONAUSUARIO)['contenido'];
          echo '<tr>
                  <td>'.$u->Persona->Nombres .' '.$u->Persona->Apellidos.'</td>
                  <td>'.date("d/m/Y",strtotime($t->Fecha)).'</td>
                  <td>'.$d->Nombre.'</td>
                  <td>'.$t->Origen.'</td>
                  <td>'.$t->Destino.'</td>';
          if($t->Ida=='1'){
            echo '<td>Ida</td>';
          }else{
            echo '<td>Vuelta</td>';
          }
          if($t->Salida=='1'){
            echo '<td>Si</td>';
          }else{
            echo '<td>No</td>';
          }
          if($t->Llegada=='1'){
            echo '<td>Si</td>';
          }else{
            echo '<td>No</td>';
          }
            echo '<td>'.$chofer.'</td>';
            echo '<td>'.$vehiculo.'</td>
              <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Asignar</button></td>
            </tr>';
        }
        echo '</tbody>
        </table>';
      break;
      case 400:
        Parchar();
        echo '<h3 class="text-muted">No hay Viajes programados.</h3>';
      break;
      case 417:
        MostrarError(ERROR_SESION);
      break;
      default:
        MostrarError(ERROR_SERVIDOR);
      break;
  }
?>
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
<script>
        window.onload=function(){
            DestruirObjeto(window.top.document.getElementById("loading-img"));
            window.top.document.getElementById("iFRAME").classList.remove("d-none");
        }
    </script>
</body>
</html>