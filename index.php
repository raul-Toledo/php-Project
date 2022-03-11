<!DOCTYPE html>
<?php
if(isset($_REQUEST['txtUser'])){
    $txtUser =$_REQUEST['txtUser'];
    $intIntento = $_REQUEST['intentos'];
    $txtClave = $_REQUEST['txtPass'];
    if($intIntento > 3){
        header("Location: noAcceso.html", true, 301);
    }
} else {
    $txtUser = '';
    $intIntento=0;
    $txtClave='';
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Acceso</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form action="broker.php" method="post">
            <h2>
                <span class="entypo-login">
                    <i class="fa fa-sign-in"></i>
                </span>Login
                
            </h2>
            <button name="btnSubmit" class="submit" value="OK"></button>
            <span class="entypo-user inputUserIcon">
               <i class="fa fa-user"></i>
             </span>
            
            <input type="text" class="user" name="txtUser" 
                   autofocus="autofocus"
                   pattern="[a-Z0-9]+"
                   maxlength="18"
                   placeholder="Usuario"
                   required="required"
                   value="<?=$txtUser;?>"/>
            <span class="entypo-key inputPassIcon">
               <i class="fa fa-key"></i>
             </span>
            <input type="password" class="pass" name="txtPass"
                   required="required" 
                   placeholder="Contraseña"/>
            <input type="hidden" value="<?=$intIntento;?>"
                   name="intentos"/>  
            <input id="uriPage" name="uriPage" type="hidden" value="<?=$_SERVER["REQUEST_URI"]?>"/>
          </form>
        <h2> <span class="entypo-login">
                    <i class="fa fa-sign-in"></i>
            </span><a href="crearusuario.php">Crear Usuario</a></h2>
    </body>
</html>
