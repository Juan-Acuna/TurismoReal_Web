<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    include_once F_PETICION;
echo '<html>
<head>';
include F_HEAD;
echo '</head>
<body class="col-lg-10 text-center text-lg-left">
<h2>Check</h2><br>
    <h3>Check-In</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="th-sm">Id Reserva</th>
                <th class="th-sm">Nombre Cliente</th>
                <th class="th-sm">Nombre Depto</th>
                <th class="th-sm">Fecha Inicio Estadia</th>
                <th class="th-sm">Estado</th>
            </tr>   
        </thead>
        <tbody>';
            $res =peticion_http('http://turismoreal.xyz/api/reserva','GET','',$_COOKIE['token'],LISTA_RESERVA);
            if($res['statusCode']==200){
                foreach($res['contenido'] as $r){
                    if($r->Id_estado==2){
                        $d = (peticion_http('http://turismoreal.xyz/api/departamento/'.$r->Id_depto,'GET','','',CLASE_DEPARTAMENTO))['contenido'];
                        $u = (peticion_http('http://turismoreal.xyz/api/usuario/'.$r->Username,'GET','',$_COOKIE['token'],CLASE_PERSONAUSUARIO))['contenido'];
                        echo '<tr>
                        <td>'.$r->Id_reserva.'</td>
                        <td>'.$u->Persona->Nombres.' '.$u->Persona->Apellidos.'</td>
                        <td>'.$d->Nombre.'</td>
                        <td>'.date("d/m/Y",strtotime($r->Inicio_estadia)).'</td>';
                        if(date("d/m/Y",strtotime($r->Inicio_estadia))==date("d/m/Y")){
                            echo '<td>Listo para Check</td>
                            <td><a href="'.GESTION.'/ingresarcheckin.php" class="btn btn-primary">Comenzar Check-In</a></td>';
                        }else{
                            echo '<td>Esperando fecha</td>
                            <td><a disabled class="btn btn-primary">Comenzar Check-In</a></td>';
                        }
                        echo '</tr>';
                    }
                }
                    echo '</tbody>
                        </table>';
            }
echo '</tbody>
            </table>
        <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
        <script src="<?php echo JS;?>/popper.min.js" ></script>
        <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
    </body>
    </html>';
            ?>