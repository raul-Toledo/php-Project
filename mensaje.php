<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="background-color:<?=$_COOKIE['colorSecundarioDark'];?> ">
        <h1><?php
            echo $_SESSION["nomCom"];
            echo "<br>";
            echo htmlentities($_REQUEST["msj"], ENT_QUOTES, "UTF-8")// put your code here
        ?>
        </h1>
        <image src="<?=$_COOKIE['logoEmpresa'];?>"/>
    </body>
</html>
