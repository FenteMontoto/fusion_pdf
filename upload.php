<?php
    
   foreach($_FILES['ficheros']['tmp_name'] as $key=>$tmp_name){

    $filename=$_FILES['ficheros']['name'][$key];
    $temporal=$_FILES['ficheros']['tmp_name'][$key];
    $directorio="uploads/";
    if(!file_exists($directorio)){
        mkdir($directorio,0777);
    }
    $dir=opendir($directorio);
    $ruta=$directorio.'/'.$filename;

    if(move_uploaded_file($temporal,$ruta)){
        echo "Se ha movido a la ruta el fichero $filename<br>";
    };

   }