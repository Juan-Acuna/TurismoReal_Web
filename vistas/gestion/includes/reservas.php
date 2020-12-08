<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    ValidarRol(1,2,3);
    include F_PETICION;
    $res = peticion_http('http://turismoreal.xyz/api/reserva','GET','',$_COOKIE['token'],LISTA_RESERVA);
    function Parchar(){
        echo '<html>
        <head>';
        include F_HEAD;
        echo '</head>
        <body class="col-lg-10 text-center text-lg-left">
            <h2>Reservas</h2><br>';

    }
    switch($res['statusCode']){
        case 200:
            Parchar();
            echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th class="th-sm">Id</th>
                    <th class="th-sm">Nombre Cliente</th>
                    <th class="th-sm">Inicio Estadía</th>
                    <th class="th-sm">Fin Estadía</th>
                    <th class="th-sm">Departamento</th>
                    <th class="th-sm">Estado Reserva</th>
                </tr>   
            </thead>
            <tbody>';
            foreach($res['contenido'] as $r){
                $d = peticion_http('http://turismoreal.xyz/api/departamento/'.$r->Id_depto,'','','',CLASE_DEPARTAMENTO)['contenido'];
                $e = peticion_http('http://turismoreal.xyz/api/estadoreserva/'.$r->Id_estado,'','',$_COOKIE['token'],CLASE_ESTADORESERVA)['contenido'];
                $pu = peticion_http('http://turismoreal.xyz/api/usuario/'.$r->Username,'','',$_COOKIE['token'],CLASE_PERSONAUSUARIO)['contenido'];
                echo '<tr>
                        <td>'.$r->Id_reserva.'</td>
                        <td>'.$pu->Persona->Nombres.' '.$pu->Persona->Apellidos.'</td>
                        <td>'.date("d/m/Y",strtotime($r->Inicio_estadia)).'</td>
                        <td>'.date("d/m/Y",strtotime($r->Fin_estadia)).'</td>
                        <td>'.$d->Nombre.'</td>
                        <td>'.$e->Nombre.'</td>
                        <td><button class="btn btn-primary">Modificar</button></td>
                    </tr>';
            }
            echo '</tbody>
                    </table>';
        break;
        case 400:
            Parchar();
            echo '<h6 class="text-muted p-5">No hay reservas.</h6>';
        break;
        case 417:
            MostrarError(ERROR_SESION);
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



