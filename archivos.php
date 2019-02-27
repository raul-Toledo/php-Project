<!DOCTYPE html>
<?php
    require_once 'function/function.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //var_dump(crearDirectorio("demo","077",__DIR__));
        $ruta = __DIR__.'\function\demo';
        $file = "prueba.txt";
        $contenido = "spiderman 2";
        //echo $ruta;
        //var_dump(crearArchivo($file, "a+", $ruta ));

        //var_dump(leerArchivo($file, $ruta));

        //var_dump(borrarArchivo($file, $ruta));
        
        $flag = escribirArchivo($file, $contenido, $ruta);
        ?>
    </body>
</html>
