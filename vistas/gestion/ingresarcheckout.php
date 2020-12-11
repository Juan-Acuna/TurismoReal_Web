<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    ValidarLogin();
    ValidarRol(1,4);
    ValidarGet('data');
    $data = explode(',',base64_decode(urldecode($_GET['data'])));
    if($data[0]!='data-valido'){
        MostrarError(ERROR_PETICION);
    }
    include_once F_PETICION;
    $rol=$_COOKIE['rol'];
    $res = peticion_http('http://turismoreal.xyz/api/reserva/'.$data[1],'','',$_COOKIE['token'],CLASE_RESERVA);
    switch($res['statusCode']){
        case 200:
            $chk = explode("-",$res['contenido']->Desc_checkin);
            $arts = peticion_http('http://turismoreal.xyz/api/articulo/proxy','','',$_COOKIE['token'],LISTA_PROXYARTICULO);
            echo '<html>
            <head>';
            include F_HEAD;
            echo '</head>
            <body>';
            include F_NAVBAR;
            echo '<div class="container vh">
            <h2>CHECKLITS DE ESTADO</h2>
            <P>A continuacion, marque la casilla correspondiente del item, si este se encuentra disponible o en buen estado</P>
                <div class="row">
                    <div class="col-12">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="th-sm">Item</th>
                            <th class="th-sm">Estado Anterior</th>
                            <th class="th-sm">Estado Actual</th>
                        </tr>   
                    </thead>
                    <tbody>
                    <tr>
                        <td>Departamento (Inmueble)</td>
                        <td><input type="checkbox" disabled ';
                        if($chk[0]=='1'){
                            echo 'checked';
                        }
                        echo '></td>
                        <td><input id="chkD" type="checkbox"></td>
                    </tr>';
                    $cont =1;
                    foreach($arts['contenido'] as $a){
                        if($a->Asignado && $a->Depto==$res['contenido']->Id_depto){
                            echo '<tr>
                                    <td>'.$a->Articulo->Nombre.'</td>
                                    <td><input type="checkbox" ';
                                    if($chk[$cont]=='1'){
                                        echo 'checked';
                                    }
                                    echo ' disabled></td>
                                    <td><input id="chk'.$a->Articulo->Id_articulo.'" type="checkbox"></td>
                                </tr>';
                                $cont++;
                        }
                    }
                echo '</tbody>
                </table>
                        <button onclick="CargarCheckOut()" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </div>
            <script>
                var sender;
                window.onload=function(){
                    sender = Obj("sender");
                }
                function CargarCheckOut(){
                    sender.value = (ObjVal("chkD")?"1":"0")';
                    foreach($arts['contenido'] as $a){
                        if($a->Asignado && $a->Depto==$res['contenido']->Id_depto){
                            echo '+(ObjVal("chk'.$a->Articulo->Id_articulo.'")?"-1":"-0")';
                        }
                    }
                    echo ';
                    document.forms["ff"].submit();
                }
            </script>
            <form name="ff" action="'.FUNCIONES.'/checkout.php" method="POST" class="d-none">
                <input id="sender" type="hidden" name="data">
                <input name="idres" type="hidden" value="'.$res['contenido']->Id_reserva.'">
            </form>';
            include F_FOOTER;
        break;
        case 400:
            MostrarError(ERROR_DATOS);
        break;
        case 500:
            MostrarError(ERROR_SERVIDOR);
        break;
        default:
            MostrarError(ERROR_CONEXION);
        break;
    }
?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
  </body>
</html>
