<?php
    require_once 'function/function.php';
   
    $uri = sanitizaInput($cosa);
    var_dump($uri);
    $uri = sanitizaInput($_REQUEST['uriPage']);
    var_dump($uri);
    switch ($uri){
        case '/test/project/crearusuario.php': 
            $txtPass = sanitizaInput($_REQUEST["txtPass"]);
            $txtEmail = sanitizaInput($_REQUEST["txtEmail"]);
            $intTel = sanitizaInput($_REQUEST["txtTel"]);
            $txtNom = sanitizaInput($_REQUEST["txtNom"]);
            $txtMat = sanitizaInput($_REQUEST["txtMat"]);
            $txtPat = sanitizaInput($_REQUEST["txtPat"]);
            $strParam="msj=Validación Completa";
            $uriPagina="mensaje.php";
            break;
        case '/test/project/':
            $user = sanitizaInput($_REQUEST["txtUser"]);
            $pass = sanitizaInput($_REQUEST["txtPass"]);
            $intento = sanitizaInput($_REQUEST["intentos"]);
            if(login($user, $pass, $intento)){
                crearSesion($user, $pass);
                preferenciasDefecto();
                $strParam="msj=Login Exitoso";
                $uriPagina="mensaje.php";
            } else {
                $intento++;
                $uriPagina="index.php?";
                $strParam = "intentos=$intento;&msj=Usuario/contraseña incorrecto";
            }
            break;
        default:
            $strParam="No entro";
            $uriPagina="mensaje.php";
            break;
    }
    //navegar($uriPagina, $strParam);
    //exit();

