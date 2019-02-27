<?php
define("PERMISO", "077");
function sanitizaInput($v){
    if (isset($v)){
        switch (gettype($v)){
            case "boolean":
                $dato = (bool)$v;
                break;
            case "integer":
                $dato = (int)$v;
                break;
            case "double":
                $dato = (double)$v;
                break;
            case "string":
                $dato = (string)trim(htmlentities($v, ENT_QUOTES, "UTF-8"));
                break;
            case "array":
                $dato = (array)$v;
                break;
            case "object":
                $dato = (object)$v;
                break;
            case "resource":
                $dato = false;
                break;
            case "NULL":
                $dato = (unset)$v;
                break;
            case "unknown type":
                $dato = false;
                break;
        }
    } else {
        $dato = false;
    }
    return $dato;
}

function crearSesion($user, $pass){
    session_start();
    $_SESSION['user']=$user;
    $_SESSION['password']=$pass;
    $_SESSION['nomCom']='Raúl Toledo';
}

function cerrarSesion(){
    $_SESSION = array();
    session_destroy();
}

function login($user, $pass, $try){
    $u = sanitizaInput($user);
    $p = sanitizaInput($pass);
    if(is_int($try)){
       $try = sanitizaInput($i); 
    } else {
        $try = 0;
    }
    $flag = false;
    if ($u == 'raul' && $p=='123' && $try <4){
        $flag = true;
    } 
    return $flag;
}

function navegar($url,$param){
    header("Location: $url?$param");
}

function preferenciasDefecto(){
    setcookie("colorPrimario", "#6002ee");
    setcookie("colorPrimarioLight", "#9c47ff");
    setcookie("colorPrimarioDark", "#0000ba");
    setcookie("colorSecundario", "#eeeeee");
    setcookie("colorSecundarioLight", "#ffffff");
    setcookie("colorSecundarioDark", "#bcbcbc");
    setcookie("colorPrimarioText", "#ffffff");
    setcookie("colorSecundarioText", "#000000");
    setcookie("logoEmpresa", "img/spidergwen.png");
}

function limpiarPreferencias(){
    setcookie("colorPrimario", "#6002ee", time() - 3600);
    setcookie("colorPrimarioLight", "#9c47ff", time() - 3600);
    setcookie("colorPrimarioDark", "#0000ba", time() - 3600);
    setcookie("colorSecundario", "#eeeeee", time() - 3600);
    setcookie("colorSecundarioLight", "#ffffff", time() - 3600);
    setcookie("colorSecundarioDark", "#bcbcbc", time() - 3600);
    setcookie("colorPrimarioText", "#ffffff", time() - 3600);
    setcookie("colorSecundarioText", "#000000", time() - 3600);
}

function crearDirectorio($dir, $permiso = false, $ruta = false){
    if ($ruta != false){
        $rutaCom = $ruta.'\\'.$dir;
    } else {
        $rutaCom = __DIR__.'\\'.$dir;
    }

    if ($permiso!= false){
        $permiso = PERMISO;
    }
    
    if(!file_exists($rutaCom)){
      mkdir($rutaCom,$permiso); 
    } else {
        $rutaCom = false;
    }
    return $rutaCom;
}

function crearArchivo($file, $permiso,  $ruta = false){
    if($ruta!=false){
        $rutaCom = $ruta.'\\'.$file;
    }else{
        $rutaCom = __DIR__.'\\temp'.$file;
        $ruta = $rutaCom;
    }

    if(!file_exists($ruta)){
         $ruta = crearDirectorio($ruta,PERMISO,__DIR__);
         $rutaCom = $ruta.'\\'.$file;
    }
    $archivo = fopen($rutaCom,  $permiso);
    //fwrite($archivo,$contenido."\\n","r");
    $flag = true;
    fclose($archivo);
    return $flag;
}

function leerArchivo($file, $ruta = false){
    if($ruta!=false){
        $rutaCom = $ruta.'\\'.$file;
    }else{
        $rutaCom = __DIR__.'\\temp'.$file;
        $ruta = $rutaCom;
    }
    if(file_exists($rutaCom)){
        $archivo = fopen($rutaCom,  "r");
        while(!feof($archivo)) {
          $contenido[]=fgets($archivo);  
        } 
        fclose($archivo);   
    }else{
        $contenido[]=null;
    }
    return $contenido;
}

function escribirArchivo($file, $contenido, $ruta = false){
    if($ruta){
        $rutaCom = $ruta.'\\'.$file;
    }else{
        $rutaCom = __DIR__.'\\temp'.$file;
        $ruta = $rutaCom;
    }

    if(file_exists($rutaCom)){
        $archivo = fopen($rutaCom,  "a+");
        fwrite($archivo,$contenido);
        fwrite($archivo,"\r\n");
        fclose($archivo); 
        $flag = true;
    }else{
        if(crearArchivo($file, "a+", $ruta)){
           $flag = escribirArchivo($file, $contenido, $ruta);
        } else{
           $flag = false;
        }
    }
    return $flag;
}

function borrarArchivo($file, $ruta = false){
    if($ruta!=false){
        $rutaCom = $ruta.'\\'.$file;
    }else{
        $rutaCom = __DIR__.'\\temp'.$file;
        $ruta = $rutaCom;
    }
    
    if(file_exists($rutaCom)){
        unlink($rutaCom);
        $flag = true;
    } else {
        $flag = false;
    }
    return $flag;
}