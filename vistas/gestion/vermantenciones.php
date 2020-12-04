<?php
    include_once 'global.php';
    include_once F_PETICION;
    ValidarLogin();
    ValidarRol(4);
    $ms = peticion_http('http://turismoreal.xyz/api/mantencion/funcionario/'.$_COOKIE['username'],'GET','',$_COOKIE['token'],LISTA_MANTENCION);
    if($ms['statusCode']==200){

    }else if($ms['statusCode']==400){

    }else{
        MostrarError(ERROR_SERVIDOR);
    }
?>
<html>
  <head>
    <?php include F_HEAD;?>
  </head>
  <body class="col-lg-10 text-center text-lg-left">
    <h2>Mantenciones</h2><br>
      <h3>Lista de Mantenciones</h3>
       <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="th-sm">Id Mantencion</th>
                    <th class="th-sm">Nombre Departamento</th>
                    <th class="th-sm">Tipo Mantencion</th>
                    <th class="th-sm">Fecha Mantencion</th>
                </tr>   
            </thead>
            <tbody>
                <tr>
                    <td >1</td>
                    <td>Colombia</td>
                    <td>Habilitacion</td>
                    <td>23/11/2020 </td>
                    <td><a href="<?php echo GESTION;?>/ingresarcheckout.php" class="btn btn-primary">Mantención Realizada</a></td>
                    <td><a href="<?php echo GESTION;?>/ingresarcheckout.php" class="btn btn-primary">Departamento Inhabitable</a></td>
                    
                </tr>
                <tr>
                    <td>2</td>
                    <td>Colombia 2</td>
                    <td>Habilitacion</td>
                    <td>03/10/2050 </td>
                    <td><a href="<?php echo GESTION;?>/ingresarcheckout.php" class="btn btn-primary">Mantención Realizada</a></td>
                    <td><a href="<?php echo GESTION;?>/ingresarcheckout.php" class="btn btn-primary">Departamento Inhabitable</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Colombia 3</td>
                    <td>Habilitacion</td>
                    <td>24/07/2019</td>
                    <td><a href="<?php echo GESTION;?>/ingresarcheckout.php" class="btn btn-primary">Mantención Realizada</a></td>
                    <td><a href="<?php echo GESTION;?>/ingresarcheckout.php" class="btn btn-primary">Departamento Inhabitable</a></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Colombia 4</td>
                    <td>Habilitacion</td>
                    <td>23/12/2020</td>
                    <td><a href="<?php echo GESTION;?>/ingresarcheckout.php" class="btn btn-primary">Mantención Realizada</a></td>
                    <td><a href="<?php echo GESTION;?>/ingresarcheckout.php" class="btn btn-primary">Departamento Inhabitable</a></td>
                </tr>  
            </tbody>
        </table>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
  </body>
</html>
