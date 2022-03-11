<?php
    require_once 'function/function.php';
    require_once 'function/functionDB.php';
    $uri = sanitizaInput($_REQUEST['uriPage']);
    switch ($uri){
        case 'borrarArchivo':
            $archivo= $_REQUEST['file'];
            borrarArchivo($archivo, './data');
            $strParam="msj=Validación Completa";
            $uriPagina="practicaArchivos.php";
            break;
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
                $uriPagina="inicio.php";
            } else {
                $intento++;
                $uriPagina="inicio.php?";
            }
            break;
        case 'insUser';
            $email = sanitizaInput($_REQUEST["email"]);
            $user = sanitizaInput($_REQUEST["user"]);
            $Apat = sanitizaInput($_REQUEST["Apat"]);
            $Amat = sanitizaInput($_REQUEST["Amat"]);
            $Nomb = sanitizaInput($_REQUEST["Nomb"]);
            $pass = sanitizaInput($_REQUEST["pass"]);
            $bolInsert = insUser( dbCon(), $Apat, $Amat, $Nomb,$email, $pass, $user );
            if($bolInsert){
                $uriPagina="inicio.php?";
            }else{
                $strParam="Error al insertar";
                $uriPagina="mensaje.php";
            }
            break;
        default:
            $strParam=$uri;
            $uriPagina="mensaje.php";
            break;
    }
    navegar($uriPagina, $strParam);
    exit();

