<?php include_once $_SERVER['DOCUMENT_ROOT'].'/Agencia/assets/includes/global.php';
if(isset($_SERVER['REDIRECT_STATUS'])){
    if($_SERVER['REDIRECT_STATUS']==404){
        MostrarError(ERROR_404);
    }
}
ValidarGet('codigo-error','source');
$fuente = base64_decode(urldecode($_GET['source']));
$codigo = $_GET['codigo-error'];
$destino = base64_decode(urldecode($_GET['to']));
$t = '';
$d = '';
$s = '';
$f = '';
switch($codigo){
    case ERROR_PETICION:
        $t = 'Error procesando la petición';
        $d = 'Ha ocurrido un error durante el intento de carga de la página, a la cual no era posible acceder en ese momento';
        $s = 'Evite manipular la URL del sitio web o verifique que las cookies se encuentran activadas para este sitio.';
    break;
    case ERROR_404:
        $t = 'No se ha podido encontrar la página';
        $d = 'La página que busca no se encuentra disponible o no existe en el sitio web.';
        $s = 'Evite ingresar manualmente la ruta en su navegador, en cambio, utilice la navegación ofrecida por la página web.';
        $f = 'Destino: '.$destino;
    break;
    case ERROR_CONEXION:
        $t = 'Error de conexión';
        $d = 'Ha ocurrido un error al tratar de obtener un recurso desde el servicio web de Turismo Real.';
        $s = 'Compruebe su conexión a internet e intentelo mas tarde.';
    break;
    case ERROR_DATOS:
        $t = 'No se encontraron los datos solicitados';
        $d = 'Ha ocurrido un error al solicitar datos al servidor y este no ha respondido a tiempo o la respuesta no corresponde.';
        $s = 'Intentelo mas tarde.';
    break;
    case ERROR_ROL:
        $t = 'Acceso denegado';
        $d = 'La página o recurso solicitado requiere un acceso especial.';
        $s = 'Navegue solo en las páginas correspondientes a su usuario.';
    break;
    case ERROR_SERVIDOR:
        $t = 'Error en el servicio web de Turismo Real';
        $d = 'Ha ocurrido un error en el servicio web de Turismo Real. Lamentamos el inconveniente.';
        $s = 'Intentelo mas tarde.';
    break;
    case ERROR_SESION:
        $t = 'Error en la sesión';
        $d = 'Hubo un error en la sesión actual, esto debido a un error en los cookies o su sesión expiró.';
        $s = 'Asegurese de tener los cookies activados para este sitio e inicie sesión nuevamente.';
        setcookie('token', '', time()-3600,  '/');
        setcookie('rol', '', time()-3600,  '/');
        setcookie('username', '', time()-3600,  '/');
    break;
}
echo '<!DOCTYPE html>
<html lang="es">
<head>';
include F_HEAD;
echo '</head>
<body>
<div id="cont-nav">';
include F_NAVBAR;
echo '</div><div class="container vh">
        <div class="row">
        <div class="h1 col-sm-12 mb-4">'.$t.'</div> 
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="col-sm-12 h3 mb-3">'.$d.'</div>
                <div class="col-sm-12"><b>Solución: '.$s.'</b></div>
                <div class="col-sm-12">'.$f.'</div>
                </div>
            <img class="col-sm-12 col-md-6" src="'.IMG.'/error.png" height="400px" width="auto" alt=""/>
        </div>
    </div>';
    include F_FOOTER;?>
    <script>
    window.onload=function(){
        var spl = window.top.location.href.split("/");
        if(spl[spl.length-1]=="gestion" || spl[spl.length-2]=="gestion" || spl[spl.length-3]=="gestion"){
            DestruirObjeto(document.getElementById("cont-nav"));
            DestruirObjeto(window.top.document.getElementById("loading-img"));
            window.top.document.getElementById("iFRAME").classList.remove("d-none");
        }
    }
    </script>
        <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
        <script src="<?php echo JS;?>/popper.min.js"></script>
        <script src="<?php echo JS;?>/bootstrap.min.js"></script>
    </body>
</html>