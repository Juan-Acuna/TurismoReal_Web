<?php
    include_once 'global.php';
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<html>
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
  <body>
  <?php

include F_NAVBAR;

?>
    <div class="container"style="margin-top:100px">
    <h2>CHECKLITS DE ESTADO</h2>
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
                    <td><input type="checkbox" aria-label="Checkbox for following text input"></td>

                </tr>
                <tr>
                    <td>Articulo 1</td>
                    <td><input type="checkbox" aria-label="Checkbox for following text input"> </td>

                </tr>
                <tr>
                    <td> Articulo 2</td>
                    <td><input type="checkbox" aria-label="Checkbox for following text input"></td>

                </tr>
                <tr>
                    <td>Articulo 3</td>
                    <td><input type="checkbox" aria-label="Checkbox for following text input"></td>

                </tr>  
            </tbody>
        </table>
        <button class="btn btn-primary">Confirmar</button>
        <button class="btn btn-secondary">Cancelar</button>
            </div>
        </div>
    </div>

    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
    <?php include F_FOOTER;?>
  </body>
</html>
