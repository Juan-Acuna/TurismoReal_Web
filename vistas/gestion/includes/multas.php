<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    ValidarRol(1,2);
    include F_PETICION;
    $res = peticion_http('http://turismoreal.xyz/api/multa','GET','',$_COOKIE['token'],LISTA_RESERVA);
    function Parchar(){
        echo '<html>
        <head>';
        include F_HEAD;
        echo '</head>
        <body class="col-lg-10 text-center text-lg-left">
            <h2>Multas</h2><br>';

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
                            <th class="th-sm">Valor</th>
                            <th class="th-sm">Tipo Multa</th>
                            <th class="th-sm">Estado Pago</th>
                        </tr>   
                    </thead>
                    <tbody>';
            foreach($res['contenido'] as $m){
                $r = peticion_http('http://turismoreal.xyz/api/reserva/'.$m->Id_reserva,'','',$_COOKIE['token'],CLASE_RESERVA)['contenido'];
                $d = peticion_http('http://turismoreal.xyz/api/departamento/'.$r->Id_depto,'','','',CLASE_DEPARTAMENTO)['contenido'];
                $t = peticion_http('http://turismoreal.xyz/api/tipomulta/'.$m->Id_tipo,'','',$_COOKIE['token'],CLASE_TIPOMULTA)['contenido'];
                $pu = peticion_http('http://turismoreal.xyz/api/usuario/'.$r->Username,'','',$_COOKIE['token'],CLASE_PERSONAUSUARIO)['contenido'];
                echo '<tr>
                        <td>'.$pu->Persona->Nombres.' '.$pu->Persona->Apellidos.'</td>
                        <td>'.date("d/m/Y",strtotime($r->Fin_estadia)).'</td>
                        <td>'.$d->Nombre.'</td>
                        <td>$'.$m->Valor.'</td>
                        <td>'.$t->Nombre.'</td>';
                    if($m->Pagado=='1'){
                        echo   '<td>Pagado</td>';
                    }else{
                        echo   '<td>No Pagado</td>';
                    }
                echo   '</tr>
                        <tr><button class="btn btn-primary">Modificar</button></tr>';
            }
            echo '</tbody>
                </table>';
        break;
        case 400:
            Parchar();
            echo '<h6 class="text-muted p-5">No hay multas.</h6>';
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