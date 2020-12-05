<?php
include_once 'global.php';
include F_PETICION;
if(isset($_GET['data'])){
    $data = explode(',',base64_decode(urldecode($_GET['data'])));
    $id = $data[0];
    $accion = $data[1];
    if($accion=='realizada'){
        $res = peticion_http('http://turismoreal.xyz/api/mantencion/'.$id,'PATCH','',$_COOKIE['token']);
        if($res['statusCode']==200){
            echo '<html>
                    <head>
                    </head>
                    <body>
                        <script>
                        window.top.location.href="'.GESTION.'/index.php#'.GESTION_MANTENCIONES.'";
                        </script>
                    </body>
                    </html>';
            die();
        }else{
            MostrarError(ERROR_CONEXION);
        }
    }else if($accion=='inhabitable'){
        $res = peticion_http('http://turismoreal.xyz/api/mantencion/inhabitable/'.$id,'PATCH','',$_COOKIE['token']);
        if($res['statusCode']==200){
            echo '<html>
                    <head>
                    </head>
                    <body>
                        <script>
                        window.top.location.href="'.GESTION.'/index.php#'.GESTION_MANTENCIONES.'";
                        </script>
                    </body>
                    </html>';
            die();
        }else{
            MostrarError(ERROR_CONEXION);
        }
    }else{
        MostrarError(ERROR_PETICION);
    }
    
}else{
    MostrarError(ERROR_PETICION);
}
?>