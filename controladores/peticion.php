<?php
include_once '../modelos/ProxyModelos.php';
function class_decode($obj,$clase){
    $temp = json_decode($obj,true);
    $r_lista=[];
    $r_obj=null;
    if(is_array($temp[0])){
        foreach($temp as $t){
            $ob= new $clase();
            foreach($t as $key=>$value){
                $ob->$key = $value;
            }
            array_push($r_lista,$ob);
        }
    }else{
        //se instancia directamente la clase
        $r_obj= new $clase();
        foreach($temp as $key => $value){
            $r_obj->$key = $value;
        }
        return $r_obj;
    }
    
}
function peticion_http($url, $metodo = 'GET', $body = '', $token = 'none', $clase = CLASE_LISTA){
    $headers = array('');
    $code = 0;
    $status = '';
    $contenido = '';
    try{
        if($token=='none'){
            $headers = array('User-agent: paginaweb', 'Connection: close', 'Content-type: application/json','Content-Length: '.strlen(json_encode($body)));
        }else{
            $headers = array('User-agent: paginaweb', 'Connection: close', 'Content-type: application/json','Content-Length: '.strlen(json_encode($body)), 'Authorization: Bearer '.$token);
        }
        $opciones = array('http' =>
            array(
                'protocol_version' => 1.1,
                'method' => $metodo,
                'header'  => $headers,
                'content' => json_encode($body),
                'ignore_errors' => True
            )
        );
    }catch(Exception $e){
        $status = 'Error: Uno de los parametros no corresponde.';
        $code = 1;
    }

    try{
        $contexto = stream_context_create($opciones);
    $flujo = fopen($url, 'r', false, $contexto);
    $status = stream_get_meta_data($flujo)['wrapper_data'][0];

    switch($status){
        case 'HTTP/1.1 200 OK':
            $code = 200;
        break;
        case 'HTTP/1.1 400 Bad Request':
            $code = 400;
        break;
        case 'HTTP/1.1 401 Unauthorized':
            $code = 401;
        break;
        case 'HTTP/1.1 404 Not Found':
            $code = 404;
        break;
        case 'HTTP/1.1 415 Unsupported Media Type':
            $code = 415;
        break;
        case 'HTTP/1.1 500 Internal Server Error':
            $code = 500;
        break;
        case 'HTTP/1.1 502 Bad Gateway':
            $code = 502;
        break;
        case 'HTTP/1.1 504 Gateway Timeout':
            $code = 504;
        break;

    }
    if($clase==CLASE_LISTA){
        $contenido = json_decode(stream_get_contents($flujo),True);
    }else{
        $contenido = class_decode(stream_get_contents($flujo),$clase);
    }
    }catch(Exception $e){
        $status = 'Error: La URL no es valida o hubo un problema en la conexion.';
        $code = 1;
    }
    $respuesta = array('statusCode'=>$code,'statusText'=>$status, 'contenido'=>$contenido);
    return $respuesta;
}
?>