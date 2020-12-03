<?php
require_once F_MODELOS;
function class_decode($obj,$clase){
    try{
        $temp = json_decode($obj,true);
        $r_lista=[];
        $n = str_replace('Lista_','',$clase);
        $r_obj= new $n();
        if(strpos($clase,'Lista_')===false){
            //OBJETO INDIVIDUAL
            foreach($temp as $key => $value){
                //$r_obj= new $n();
                if(is_array($value)){
                    $uk =ucfirst($key);
                    var_dump($uk);
                    $r_obj->{ucfirst($key)}=new $uk();
                    foreach($value as $k=> $v){
                        if(is_array($v)){
                            $uk=ucfirst($k);var_dump($uk);
                            $r_obj->{ucfirst($key)}->{ucfirst($k)}=new $uk();
                            foreach($v as $k2=> $v2){
                                $r_obj->{ucfirst($key)}->{ucfirst($k)}->{ucfirst($k2)}=$v2;
                            }
                        }else{
                            $r_obj->{ucfirst($key)}->{ucfirst($k)}=$v;
                        }
                    }
                }else{
                    $r_obj->{ucfirst($key)}=$value;
                }
            }
            return $r_obj;
        }else{
            //LISTA DE OBJETOS
            foreach($temp as $t){
                $ob= new $n();
                foreach($t as $key => $value){
                    if(is_array($value)){
                        $uk =ucfirst($key);
                        $ob->{ucfirst($key)}=new $uk();
                        foreach($value as $k=> $v){
                            if(is_array($v)){
                                $uk=ucfirst($k);
                                $ob->{ucfirst($key)}->{ucfirst($k)}=new $uk();
                                foreach($v as $k2=> $v2){
                                    $ob->{ucfirst($key)}->{ucfirst($k)}->{ucfirst($k2)}= $v2;
                                }
                            }else{
                                $ob->{ucfirst($key)}->{ucfirst($k)}=$v;
                            }
                        }
                    }else{
                        $ob->{ucfirst($key)}=$value;
                    }
                }
                array_push($r_lista,$ob);
            }
            return $r_lista;
        }
    }catch(Exception $e){
        var_dump($e);
    }
    
}
function peticion_http($url, $metodo = 'GET', $body = '', $token = 'none', $clase = CLASE_LISTA){
    $headers = array('');
    $code = 0;
    $status = '';
    $contenido = '';
    if($metodo==''){
        $metodo='GET';
    }
    try{
        if($token=='none' || $token==''){
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
    if($flujo===false){
        throw new Exception();
    }
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
    if($code==200){
        if($clase==CLASE_LISTA){
            $contenido = json_decode(stream_get_contents($flujo),True);
        }else{
            $contenido = class_decode(stream_get_contents($flujo),$clase);
        }
    }else{
        $contenido = json_decode(stream_get_contents($flujo),true);
    }
    
    }catch(Exception $e){
        $status = 'Error: La URL no es valida o hubo un problema en la conexion.';
        $code = 1;
    }
    $respuesta = array('statusCode'=>$code,'statusText'=>$status, 'contenido'=>$contenido);
    return $respuesta;
}
?>