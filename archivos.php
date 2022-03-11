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
        $ruta = __DIR__.'\data';
        if(!is_dir($ruta)){
            mkdir($ruta, 0777);
        } else {
            echo "Si existe.... adios";
        }        
        $file = "datos.txt"; 
        $contenido = "No esta muerto aquello que yace eternamente, y en los eones por venir incluso la muerte puede morir";
        if(file_exists($ruta.'\\'.$file)){
            $archivo = fopen($ruta.'\\'.$file,  "a+");
            fwrite($archivo,$contenido);
            fwrite($archivo,"\n");
        } else {
            $archivo = fopen($ruta.'\\'.$file,  "w");
            fwrite($archivo, $contenido."\\n");
        }       
        fclose($archivo);
        $ruta = __DIR__.'\data';
        $file = "datos.txt"; 
        $archivo = fopen($ruta.'\\'.$file,  "r");
        while(!feof($archivo)) {
            echo fgetss($archivo, 4096);
            echo "<br>";
          } 
          fclose($archivo); 
        
        /* 
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
        
        */?>
    </body>
</html>
