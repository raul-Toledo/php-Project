<?php
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
                $dato = (string)strtoupper(trim(htmlentities($v, ENT_QUOTES, "UTF-8")));
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