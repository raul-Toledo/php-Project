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
        //$ruta = __DIR__.'\data';
        //$file = "datos.txt";
        //$contenido = "spider-verse";
        //echo $ruta;
        //var_dump(crearDirectorio("data","0777",__DIR__));
        //var_dump(crearArchivo($file, "a+", $ruta ));
        //var_dump(leerArchivo($file, $ruta));
        //var_dump(borrarArchivo($file, $ruta)); 
        //$flag = escribirArchivo($file, $contenido, $ruta);
        ?>
        <?php 
            $ruta = './img';
            $dir = opendir($ruta);
            if ($dir){
                while(($file = readdir($dir)) !== false){
                    //if($file != '.' && $file != '..'){
                    if(strlen($file) > 2){
                      echo "<img src='img/$file' width='200px'/><br/>";
                      //var_dump($file);
                    }
                }
            }
        
        ?>
    </body>
</html>
