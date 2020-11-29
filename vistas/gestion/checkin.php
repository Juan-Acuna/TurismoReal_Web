<?php
    include_once 'global.php';
    include F_PETICION;
echo '<html>
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
            $res =peticion_http('http://turismoreal.xyz/api/reserva',$token=$_COOKIE['token']);
            if($res['statusCode']==200){
                foreach($res['contenido'] as $r){
                    if($r['id_estado']==2){
                        $d = (peticion_http('http://turismoreal.xyz/api/departamento/'.$r['id_depto']))['contenido'];
                        $u = (peticion_http('http://turismoreal.xyz/api/usuario/'.$r['username'],$token=$_COOKIE['token']))['contenido'];
                        echo '<tr>
                        <td>'.$r['id_reserva'].'</td>
                        <td>'.$u['persona']['nombres'].' '.$u['persona'][''].'</td>
                        <td>'.$d['nombre'].'</td>
                        <td>'.date("d/m/Y",strtotime($r['inicio_estadia'])).'</td>';
                        if(date("d/m/Y",strtotime($r['inicio_estadia']))==date("d/m/Y")){
                            echo '<td>Listo para Check</td>
                            <td><a href="'.GESTION.'/ingresarcheckin.php" class="btn btn-primary">Comenzar Check-In</a></td>';
                        }else{
                            echo '<td>Esperando fecha</td>
                            <td><a disabled class="btn btn-primary">Comenzar Check-In</a></td>';
                        }
                    echo '</tr>
                    </tbody>
                    </table>
                <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
                <script src="<?php echo JS;?>/popper.min.js" ></script>
                <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
              </body>
            </html>';
                    }
                }
            }
            ?>