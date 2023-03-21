<?php
require_once "./vendor/autoload.php";
use iio\libmergepdf\Merger;
require_once "vendor/autoload.php";


# Ruta de los documentos
$documentos = ["C:\wamp64\www\fusion_pdf\uploads\acrespo_Febrero2023.pdf", "C:\wamp64\www\fusion_pdf\uploads\acrespo_Marzo2023.pdf"];

# Crear el "combinador"
$combinador = new Merger;

# Agregar archivo en cada iteración
foreach ($documentos as $documento) {
    $combinador->addFile($documento);
}

# Y combinar o unir
$salida = $combinador->merge();
/*
Ahora la salida la mostramos directamente en la petición,
y enviamos unos encabezados para que el navegador
lo interprete
*/
# Este nombre se pondrá como título o nombre del documento
$nombreArchivo = "combinado.pdf";

header("Content-type:application/pdf");
header("Content-disposition: inline; filename=$nombreArchivo");
header("content-Transfer-Encoding:binary");
header("Accept-Ranges:bytes");
# Escribir salida en el nombre del archivo

$bytesEscritos = file_put_contents($nombreArchivo, $salida);

# Imprimir salida luego de encabezados para ver en la propia página web
echo $salida;

/*
    Aquí puedes hacer más cosas pero asegúrate
    de no imprimir absolutamente nada; en este caso
    pongo exit para terminar el script inmediatamente
*/
exit;