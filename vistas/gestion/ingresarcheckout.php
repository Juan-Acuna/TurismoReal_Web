<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    include_once F_PETICION;
    ValidarLogin();
    ValidarRol(1,4);
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<html>
  <head>
    <?php include F_HEAD;?>
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
                    <th class="th-sm">Estado Anterior</th>
                    <th class="th-sm">Estado Actual</th>

                </tr>   
            </thead>
            <tbody>
                <tr>
                    <td>Departamento (Inmueble)</td>
                    <td><input type="checkbox" aria-label="Checkbox for following text input" disabled></td>
                    <td><input type="checkbox" aria-label="Checkbox for following text input" ></td>

                </tr>
                <tr>
                    <td>Articulo 1</td>
                    <td><input type="checkbox" aria-label="Checkbox for following text input"> </td>
                    <td><input type="checkbox" aria-label="Checkbox for following text input" ></td>

                </tr>
                <tr>
                    <td> Articulo 2</td>
                    <td><input type="checkbox" aria-label="Checkbox for following text input"></td>
                    <td><input type="checkbox" aria-label="Checkbox for following text input" ></td>

                </tr>
                <tr>
                    <td>Articulo 3</td>
                    <td><input type="checkbox" aria-label="Checkbox for following text input"></td>
                    <td><input type="checkbox" aria-label="Checkbox for following text input" ></td>

                </tr>  

            </tbody>
        </table>
                <button class="btn btn-primary">Confirmar</button>
                <button class="btn btn-secondary">Cancelar</button>
            </div>
        </div>
    </div>
    <?php include F_FOOTER;?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src="<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
  </body>
</html>
