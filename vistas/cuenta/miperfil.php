<?php
    include "global.php";
    include F_PETICION;
    ValidarLogin();
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
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
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <link href="<?php echo CSS;?>/bootstrap.min.css"  rel="stylesheet">
    <link href="<?php echo CSS;?>/estilos.css" rel="stylesheet">
  </head>
  <body>
<?php
include F_NAVBAR;
      if(isset($_COOKIE['token'])){
        $resultado = peticion_http('http://turismoreal.xyz/api/usuario/'.$_COOKIE['username'],'GET','',$_COOKIE['token'],CLASE_PERSONAUSUARIO);
        if($resultado['statusCode']==200){
        $p=$resultado['contenido']->Persona;
        $u=$resultado['contenido']->Usuario;
        $g = peticion_http('http://turismoreal.xyz/api/genero','GET','','',LISTA_GENERO)['contenido'];
        echo  '<header class="perfil">
              <div class="container vh" style="margin-top:80px">
              <h2>Mi Perfil</h2><br>
              <form class="form-horizontal border rounded">
              <h2 class="m-0 pb-0 pt-2 pl-2 pr-2">Datos Personales</h2>
              <hr class="m-2 border-dark">
              <div class="form-group">
              <h4 class="col-sm-5 control-label">Nombre Completo</h4>
              <div class="col-sm-10">
              <h6 class="form-control-static ">'.$p->Nombres.' '.$p->Apellidos.'</h6>
              </div>
              </div>
              <div class="form-group">
              <h4 class="col-sm-5 control-label">Rut</h4>
              <div class="col-sm-10">
              <h6 class="form-control-static">'.$p->Rut.'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Fecha Nacimiento</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.date("d/m/Y",strtotime($p->Nacimiento)).'</h6>
              </div>
            </div>';
            foreach($g as $gen){
              if($gen->Id_genero==$p->Id_genero){
                echo '<div class="form-group">
                      <h4 class="col-sm-5 control-label">Genero</h4>
                      <div class="col-sm-10">
                        <h6 class="form-control-static">'.$gen->Nombre.'</h6>
                      </div>
                    </div>';
              }
            }
        echo '<h2 class="m-0 pb-0 pt-2 pl-2 pr-2">Datos de Contacto</h2>
              <hr class="m-2 border-dark">
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Email</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p->Email.'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Telefono</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">+56 '.$p->Telefono.'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Direccion</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p->Direccion.'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Region</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p->Region.'</h6>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-5 control-label">Comuna</h4>
              <div class="col-sm-10">
                <h6 class="form-control-static">'.$p->Comuna.'</h6>
              </div>
            </div>
              <div style="text-align:justify!important  ;display:inline;margin-right:5px;">
                <button type="button" class="m-2 btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="setRegiones();setGenero();">
                Editar Perfil
              </button>
                <a class="m-2 btn btn-primary btn-xxl text-uppercase" style="display:inline-block" href="'.VISTAS.'/">Volver</a>
              </div>
            </form>
              </div>
            </div>
                  </div><br><br><br><br><br>
              </header>';
              echo '<!-- Modal -->
              <form class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" action="'.FUNCIONES.'/editarperfil.php" method="POST">
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
                            <input class="form-control mb-1" type="password" name="clave" placeholder="Contraseña"/>
                            <label class="mb-3 text-muted">Deje en blanco si no desea modificar.</label>
                            <input class="form-control mb-3" type="text" name="nombres" placeholder="Nombres" value="'.$p->Nombres.'"/>
                            <input class="form-control mb-3" type="text" name="apellidos" placeholder="Apellidos" value="'.$p->Apellidos.'"/>
                            <input class="form-control mb-3" type="date" name="nacimiento" placeholder="Fecha Nacimiento" value="'.date("Y-m-d",strtotime($p->Nacimiento)).'" />
                            <select class="form-control mb-3"  name="genero" placeholder="Genero" id="genero"> </select>
                            <input class="form-control mb-3" type="text" name="email" placeholder="Email" value="'.$p->Email.'" />
                            <input class="form-control mb-3" type="text" name="telefono" placeholder="Telefono" value="'.$p->Telefono.'" />
                            <input class="form-control mb-3" type="text" name="direccion" placeholder="Direccion" value="'.$p->Direccion.'"/>
                            <select class="form-control mb-3" class="form-control" name="region" placeholder="Región" id="regiones"> </select>
                            <select class="form-control mb-3" name="comuna" placeholder="Comuna" id="comunas"> </select>
                            <input type="hidden" value="'.$u->Username.'" name="username">
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
                  if(reg.options[i].value=="'.$p->Region.'"){
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
                  if(com.options[i].value=="'.$p->Comuna.'"){
                    com.selectedIndex=i;
                    console.log("Encontro comuna");
                  }
                }
              }
              function setGenero(){
                var gen = document.getElementById("genero");
                for(var i=0;i<gen.options.length;i++){
                  if(gen.options[i].value=="'.$p->Id_genero.'"){
                    gen.selectedIndex=i;
                    console.log("Encontro genero");
                  }
                }
              }
              </script>';
        }
      } 
    ?>
    <?php include F_FOOTER;?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
    </body>
</html>
