<?php
    include "global.php";
    include "../../controladores/peticion.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Turismo Real</title>
        <link rel="icon" type="image/x-icon" href="<?php echo IMG;?>/cropped-favicon-tr.ico"  />
        <script src="<?php echo JS;?>/api_turismoreal.js"></script>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        
        <link href="<?php echo CSS;?>/bootstrap.min.css"  rel="stylesheet">
        <!-- Nuestro css-->
    <link href="<?php echo CSS;?>/estilos.css" rel="stylesheet"  >
    </head>
    <body>
    <?php

include "../../assets/includes/navbar.php";
      if(isset($_COOKIE['token'])){
        $resultado = peticion_http('http://turismoreal.xyz/api/usuario/'.$_COOKIE['username'],'GET','',$_COOKIE['token']);
        if($resultado['statusCode']==200){
        $p=$resultado['contenido']['persona'];
        $u=$resultado['contenido']['usuario'];
        echo  '<header class="perfil">
              <div class="container " style="margin-top:80px">
              <h2>Mis Datos</h2><br>
              <form class="form-horizontal border rounded">
                      
              <div class="form-group">
              <h4 class="col-sm-5 control-label">Nombre Completo</h4>
              <div class="col-sm-10">
              <h6 class="form-control-static ">'.$p['nombres'].' '.$p['apellidos'].'</h6>
              </div>
              </div>
              <div class="form-group">
              <h4 class="col-sm-5 control-label">Rut</h4>
              <div class="col-sm-10">
              <h6 class="form-control-static">'.$p['rut'].'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Email</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p['email'].'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Fecha Nacimiento</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.date("d/m/Y",strtotime($p['nacimiento'])).'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Direccion</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p['direccion'].'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Region</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p['region'].'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Telefono</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p['telefono'].'</h6>
              </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Comuna</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p['comuna'].'</h6>
              </div>
            </div>
            
              <div style="text-align:justify!important  ;display:inline;margin-right:5px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="setRegiones()">
                Editar Perfil
              </button>
                <a class="btn btn-primary btn-xxl text-uppercase" style="display:inline-block" href="'.VISTAS.'/">Volver</a>
            
              </div>
            </form>
              </div>
            </div>
            
                  </div><br><br><br><br><br>
              </header>';
              echo '<!-- Modal -->
              <form class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" action="'.FUNCIONES.'/registro.php" method="POST">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class=" text-center  formularioregistro container" style="Background-color:transparent!important">
                        <div class="row text-center justify-content-center ">
                          <div class="contenedor text-center col-xs-12" >
                            <input type="hidden" name="rut" value="'.$p['rut'].'"/>
                            <input class="form-control mb-1" type="password" name="clave" placeholder="Contraseña"/>
                            <label class="mb-3 text-muted">Deje en blanco si no desea modificar.</label>
                            <input class="form-control mb-3" type="text" name="nombres" placeholder="Nombres" value="'.$p['nombres'].'"/>
                            <input class="form-control mb-3" type="text" name="apellidos" placeholder="Apellidos" value="'.$p['apellidos'].'"/>
                            <input class="form-control mb-3" type="date" name="nacimiento" placeholder="Fecha Nacimiento" value="'.date("Y-m-d",strtotime($p['nacimiento'])).'" />
                            <input class="form-control mb-3" type="text" name="email" placeholder="Email" value="'.$p['email'].'" />
                            <input class="form-control mb-3" type="text" name="telefono" placeholder="Telefono" value="'.$p['telefono'].'" />
                            <input class="form-control mb-3" type="text" name="direccion" placeholder="Direccion" value="'.$p['direccion'].'"/>
                            <select class="form-control mb-3" class="form-control" name="region" placeholder="Región" id="regiones"> </select>
                            <select class="form-control mb-3" name="comuna" placeholder="Comuna" id="comunas"> </select>
                          </div>    
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Aplicar Cambios</button>
                    </div>
                  </div>
                </div>
              </form>';
              echo '<script>
              function setRegiones(){
                var reg = document.getElementById("regiones");
                var b = false;
                for(var i=0;i<reg.options.length;i++){
                  if(reg.options[i].value=="'.$p['region'].'"){
                    reg.selectedIndex=i;
                    b = true;
                    CargarComunas();
                  }
                }
                if(b){
                  setComunas();
                }
              }
              function setComunas(){
                var com = document.getElementById("comunas");
                for(var i=0;i<com.options.length;i++){
                  if(com.options[i].value=="'.$p['comuna'].'"){
                    com.selectedIndex=i;
                    console.log("Encontro comuna");
                  }
                }
              }
              </script>';
        }
      } 
    ?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
    </body>
</html>
