<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    include_once F_PETICION;
    ValidarLogin();
    ValidarRol(1,4);
    ValidarGet('data');
    $rol=$_COOKIE['rol'];
    $data = explode(',',base64_decode(urldecode($_GET['data'])));
    if($data[0]!='supersecreto'){
        MostrarError(ERROR_PETICION);
    }
    $res = peticion_http('http://turismoreal.xyz/api/resrva/'.$data[1],'','',$_COOKIE['token'],CLASE_RESERVA);
    switch($res['statusCode']){
        case 200:
            echo '<html>
            <head>
              <?php include F_HEAD;?>
            </head>
            <body>';
            include F_NAVBAR;
            echo '<div class="container vh">
              <h2>CHECKLIST DE ESTADO</h2>
              <P>A continuacion, marque la casilla correspondiente del item, si este se encuentra disponible o en buen estado</P>
                  <div class="row">
                      <div class="col-12">
                      <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th class="th-sm">Item</th>
                              <th class="th-sm">Correcto</th>
          
                          </tr>   
                      </thead>
                      <tbody>
                          <tr>
                              <td>Departamento (Inmueble)</td>
                              <td><input id="chkD" type="checkbox"></td>
          
                          </tr>';
                    echo '<tr>
                              <td>Articulo 1</td>
                              <td><input id="chk" type="checkbox"> </td>
          
                          </tr>';  
                echo '</tbody>
                  </table>
                  <button class="btn btn-primary">Confirmar</button>
                  <button class="btn btn-secondary">Cancelar</button>
                      </div>
                  </div>
              </div>';
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
    <?php include F_FOOTER;?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
  </body>
</html>
