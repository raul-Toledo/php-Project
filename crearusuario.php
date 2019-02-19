<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Creación de Usuario</title>
    </head>
    <body>
        <form action="broker.php"  method="post">
            <fieldset>
                <div>
                    <label for="txtPat">Apellido Paterno</label> 
                    <input id="txtPat" name="txtPat" type="text"
                       autofocus="autofocus"
                       pattern="[a-zA-ZñÑ ]+"
                       maxlength="18"
                       placeholder="Apellido Paterno"
                       required="required"/>
                </div>
                <div>
                    <label for="txtMat">Apellido Materno</label> 
                    <input id="txtMat" name="txtMat" type="text"
                       pattern="[a-zA-ZñÑ ]+"
                       maxlength="18"
                       placeholder="Apellido Materno"/>
                </div>
                <div>
                    <label for="txtNom">Nombre(s)</label> 
                    <input id="txtNom" name="txtNom" type="text"
                       pattern="[a-Z ]+"
                       maxlength="18"
                       placeholder="Nombre(s)"
                       required="required"/>
                </div>
                <div>
                    <label for="txtTel">Télefono</label> 
                    <input id="txtTel" name="txtTel" type="text"
                       pattern="[0-9]+"
                       maxlength="18"
                       placeholder="Número de Télefono"
                       required="required"/>
                </div>
                <div>
                    <label for="txtEmail">Correo</label> 
                    <input id="txtEmail" name="txtEmail" type="email"
                       placeholder="correo@correo.com"
                       required="required"/>
                </div>
                <div>
                    <label for="txtPass">Contraseña</label> 
                    <input id="txtPass" name="txtPass" type="password"
                           required="required"/>
                </div>
                <div>
                    <input id="btnGuardar" name="btnGuardar" type="submit"/>
                    <input id="uriPage" name="uriPage" type="hidden" value="<?=$_SERVER["REQUEST_URI"]?>"/>
                </div>
            </fieldset>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
