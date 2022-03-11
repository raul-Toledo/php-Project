<!doctype html>
<?php
require_once 'function/function.php';

if(!empty($_POST)) {
    $nombre_archivo = $_FILES['userfile']['name'];
    $tipo_archivo = $_FILES['userfile']['type'];
    $tamano_archivo = $_FILES['userfile']['size'];

    if (move_uploaded_file($_FILES['userfile']['tmp_name'], "./data/$nombre_archivo")) {
        $mensaje =  "El archivo $nombre_archivo ha sido cargado correctamente.";
        $carga = true;
    } else {
        $mensaje  =  "El archivo $nombre_archivo no se ha podido cargar.";
        $carga = false;
    }

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Práctica Archivos</title>
</head>
<body class="bg-green-200">

<form action="practicaArchivos.php" method="post" enctype="multipart/form-data">
    <div class="shadow-md m-5 rounded-md border border-lime-500 p-2 bg-lime-100 ...">
        <div>
            <p class="text-center text-black font-bold text-xl">Subir un archivo:</p>
        </div>
        <div>
            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
            <label for="userfile">Enviar un nuevo archivo: </label>
            <input name="userfile" type="file" class="bg-lime-400 rounded-md m-2 p-2 shadow-md ...">
        </div>
        <div>
            <input type="submit" value="Enviar" class="bg-lime-400 rounded-md m-2 p-2 shadow-md ...">
        </div>
    </div>
</form>
<?php if(isset($mensaje)) {?>
<div class="rounded-md m-5 shadow-md p-5 <?=($carga ? "bg-lime-100" : "bg-red-200")?> ..."><p class="text-center text-black font-bold text-xl"><?=$mensaje?></p></div>
<?php } ?>

<div class="grid grid-cols-3 gap-1 rounded-md m-5 shadow-md ...">
    <div class="bg-lime-400 rounded-md ..."><p class="text-center text-white font-bold text-xl" >Tipo</p></div>
    <div class="bg-lime-400 rounded-md ..."><p class="text-center text-white font-bold text-xl" >Archivo</p></div>
    <div class="bg-lime-400 rounded-md ..."><p class="text-center text-white font-bold text-xl" >Acciones</p></div>

    <?php
    $ruta = './data';
    $dir = opendir($ruta);
    if ($dir){
        $i=0;
    while(($file = readdir($dir)) !== false){
        ?>
    <div class="<?= ($i%2 == 0 ? "bg-lime-100" : "bg-lime-200")?> ...">
        <?php
            if($file =='.'){
                $typeFile = '.';
            }else{
                $typeFile = strchr($file,".");
            }
            switch ($typeFile) {
                case '.doc':
                case '.docx':
                    echo "<img src='img/doc.png' alt='documento de word'/>";
                    break;
                case '.gif':
                    echo "<img src='img/gif.png' alt='imagen gif'/>";
                    break;
                case '.jpg':
                case '.jpeg':
                    echo "<img src='img/jpg.png' alt='imagen jpg'/>";
                    break;
                case '.mp3':
                    echo "<img src='img/mp3.png' alt='archivo de música'/>";
                    break;
                case '.pdf':
                    echo "<img src='img/pdf.png' alt='archivo pdf'/>";
                    break;
                case '.png':
                    echo "<img src='img/png.png' alt='archivo png'/>";
                    break;
                case '.ppt':
                case '.pptx':
                    echo "<img src='img/ppt.png' alt='archivo de presentación'/>";
                    break;
                case '.txt':
                    echo "<img src='img/text.png' alt='archivo de texto'/>";
                    break;
                case '.xls':
                case '.xlsx':
                case '.csv':
                    echo "<img src='img/xls.png' alt='archivo de hoja de cálculo'/>";
                    break;
                case '.zip':
                case '.rar':
                case '.7z':
                    echo "<img src='img/zip.png' alt='archivo comprimido'/>";
                    break;
                case '..':
                case '.':
                    echo "<img src='img/folder.png' alt='directorio'/>";
                    break;
                default:
                    echo "<img src='img/file.png' alt='archivo'/>";
                    break;
            }
            ?></div>
    <div class="<?= ($i%2 == 0 ? "bg-lime-100" : "bg-lime-200")?> ..."><?=$file?></div>

    <?php
        if(strlen($file) > 2){
            echo "<div class='grid grid-cols-3 gap-1 " . ($i%2 == 0 ? "bg-lime-100" : "bg-lime-200") . " ...'><a href='data/$file' target='_blank' >";
                ?><img src='img/view.png' alt="ver archivo"/></a>

    <a href='broker.php?uriPage=borrarArchivo&file=<?=$file?>' target='_self' ><img src='img/delete.png' alt="eliminar archivo"/></a> </div>

        <?php
        }else{
            echo "<div class='" . ($i%2 == 0 ? "bg-lime-100" : "bg-lime-200") . " ...'></div>";
        }
        $i++;
    }

    }?>

</div>

</body>
</html>

