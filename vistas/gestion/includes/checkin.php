<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    ValidarRol(1,4);
    include_once F_PETICION;
    $res =peticion_http('http://turismoreal.xyz/api/reserva','GET','',$_COOKIE['token'],LISTA_RESERVA);
    function Parchar(){
        echo '<html>
        <head>';
        include F_HEAD;
        echo '</head>
        <body class="col-lg-10 text-center text-lg-left">
        <h2>Check In</h2><br>';
    }
    switch($res['statusCode']){
        case 200:
            Parchar();
            $cuenta = 0;
            foreach($res['contenido'] as $r){
                if($r->Id_estado==2 && $r->Confirmado=='0'){
                    $cuenta++;
                }
            }if($cuenta>0){
                echo '<table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="th-sm">Id</th>
                        <th class="th-sm">Nombre Cliente</th>
                        <th class="th-sm">Nombre Depto</th>
                        <th class="th-sm">Fecha Inicio Estadia</th>
                        <th class="th-sm">Estado</th>
                    </tr>   
                </thead>
                <tbody>';
                foreach($res['contenido'] as $r){
                    if($r->Id_estado==2 && $r->Confirmado=='0'){
                        $d = (peticion_http('http://turismoreal.xyz/api/departamento/'.$r->Id_depto,'GET','','',CLASE_DEPARTAMENTO))['contenido'];
                        $u = (peticion_http('http://turismoreal.xyz/api/usuario/'.$r->Username,'GET','',$_COOKIE['token'],CLASE_PERSONAUSUARIO))['contenido'];
                        echo '<tr>
                        <td>'.$r->Id_reserva.'</td>
                        <td>'.$u->Persona->Nombres.' '.$u->Persona->Apellidos.'</td>
                        <td>'.$d->Nombre.'</td>
                        <td>'.date("d/m/Y",strtotime($r->Inicio_estadia)).'</td>';
                        if(date("d/m/Y",strtotime($r->Inicio_estadia))<=date("d/m/Y")){
                            echo '<td>Listo para Check</td>
                            <td><a onclick="window.top.location.href=\''.GESTION.'/ingresarcheckin.php?data='.urlencode(base64_encode('supersecreto,'.$r->Id_reserva)).'\'" class="btn btn-primary">Comenzar Check-In</a></td>';
                        }else{
                            echo '<td>Esperando fecha</td>
                            <td><a disabled class="btn btn-primary">Comenzar Check-In</a></td>';
                        }
                        echo '</tr>';
                    }
                }
                echo '</tbody>
                </table>';
            }else{
                echo '<h6 class="text-muted p-5">No hay reservas.</h6>';
            }
            
        break;
        case 400:
          Parchar();
          echo '<h6 class="text-muted p-5">No hay reservas.</h6>';
        break;
        case 401:
        case 403:
          MostrarError(ERROR_SESION);
        break;
        case 404:
          MostrarError(ERROR_DATOS);
        break;
        default:
          MostrarError(ERROR_SERVIDOR);
        break;
    }
?>
<script>
    window.onload=function(){
        DestruirObjeto(window.top.document.getElementById("loading-img"));
        window.top.document.getElementById("iFRAME").classList.remove("d-none");
    }
</script>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>