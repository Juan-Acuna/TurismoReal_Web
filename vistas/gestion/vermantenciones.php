<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    include_once F_PETICION;
    ValidarRol(4);
    $ms = peticion_http('http://turismoreal.xyz/api/mantencion/funcionario/'.$_COOKIE['username'],'GET','',$_COOKIE['token'],LISTA_MANTENCION);
    function Parchar(){
        echo '<html>
                <head>';
                include F_HEAD;
        echo   '</head>
                <body class="col-lg-10 text-center text-lg-left">
                    <h2>Mantenciones</h2><br>
                        <h3>Lista de Mantenciones</h3>';
    }
    if($ms['statusCode']==200){
        Parchar();
        echo '<table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="th-sm">Id Mantencion</th>
                        <th class="th-sm">Nombre Departamento</th>
                        <th class="th-sm">Tipo Mantencion</th>
                        <th class="th-sm">Fecha Mantencion</th>
                    </tr>   
                </thead>
                <tbody>';
        foreach($ms['contenido'] as $item){
            if($item->Hecho=='0'){
                $d = peticion_http('http://turismoreal.xyz/api/departamento/'.$item->Id_depto,'GET','','',CLASE_DEPARTAMENTO);
                if($d['statusCode']!=200){
                    MostrarError(ERROR_DATOS);
                }
                $t = peticion_http('http://turismoreal.xyz/api/tipomantencion/'.$item->Id_tipo,'GET','',$_COOKIE['token'],CLASE_TIPOMANTENCION);
                if($t['statusCode']!=200){
                    MostrarError(ERROR_DATOS);
                }
                echo '<tr> 
                        <td>'.$item->Id_mantencion.'</td>
                        <td>'.$d['contenido']->Nombre.'</td>
                        <td>'.$t['contenido']->Nombre.'</td>
                        <td>'.date("d/m/Y",strtotime($item->Fecha)).'</td>
                        <td><a href="'.FUNCIONES.'/mantenciones.php?data='.urlencode(base64_encode($item->Id_mantencion.',realizada')).'" class="btn btn-primary">Mantención Realizada</a></td>
                        <td><a target="_top" href="'.FUNCIONES.'/mantenciones.php?data='.urlencode(base64_encode($item->Id_mantencion.',inhabitable')).'" class="btn btn-primary">Departamento Inhabitable</a></td>
                    </tr>';
            }
        }
        echo   '</tbody>
            </table>';
    }else if($ms['statusCode']==400){
        Parchar();
        echo '<h6 class="text-muted p-5">No hay mantenciones pendientes.</h6>';
    }else{
        MostrarError(ERROR_SERVIDOR);
    }
?>

       
                
            
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
  </body>
</html>
