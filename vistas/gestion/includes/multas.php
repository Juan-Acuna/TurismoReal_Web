<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
    ValidarRol(1,2);
?>
<html>
<head>
    <?php include F_HEAD;?>
</head>



<body class="col-lg-10 text-center text-lg-left">
    <h2>Administrador de Reservas</h2><br>
    <h3>Ver Multas</h3>
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="th-sm">Nombre Cliente</th>
                        <th class="th-sm">Fecha</th>
                        <th class="th-sm">Nombre Dpto</th>
                        <th class="th-sm">Valor</th>
                        <th class="th-sm">Tipo Multa</th>
                        <th class="th-sm">Estado Pago</th>
                    </tr>   
                </thead>
                <tbody>
                    <tr>
                        <td>Juana Macckena</td>
                        <td>23/11/2020
                        </td>
                        <td>Departamento Colombia</td>
                        <td>$35.000</td>
                        <td>Destruccion Inmueble</td>
                        <td>No Pagado
                        </td>
                    </tr>
                    <tr>
                        <td>Oscar Leandro</td>
                        <td>03/09/2050
                        </td>
                        <td>Departamento PentBerg</td>
                        <td>$50.000</td>
                        <td>Destruccion Inmueble</td>
                        <td>Pagado
                        </td>
                    </tr>
                    <tr>
                        <td>Nome Obliguesa Usarel Serebro</td>
                        <td>24/06/2019
                        </td>
                        <td>Departamento McMiller</td>
                        <td>$95.000</td>
                        <td>Uso Inadecuado</td>
                        <td>No Pagado
                        </td>
                    </tr>
                    <tr>
                        <td>Don dima don</td>
                        <td>23/11/2020
                        </td>
                        <td>Departamento Buena Vista</td>
                        <td>$120.000</td>
                        <td>Uso Inadecuado</td>
                        <td>Pagado
                        </td>
                    </tr>  
                </tbody>
            </table>
            <button class="btn btn-primary">Modificar</button>
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