<?php

use Biblioteca\Enums\TipoDocumento;
use Biblioteca\Logica\Documento;
require_once "Almacenamiento\BaseDatos.php";
require_once "Biblioteca\Enums\TipoDocumento.php";
require_once "Biblioteca\Logica\Documento.php";

$documento01 = new Documento("Guia de Enums", TipoDocumento::Libro);
echo $documento01->obtenerInfoDetallada();
$documento02 = new Documento("Tesis sobre enums",TipoDocumento::Tesis);
echo $documento02->obtenerInfoDetallada();

$cadena = "magazine";
$tipo = TipoDocumento::from($cadena);

$documento03 = new Documento("Revista de Enums",$tipo);
echo $documento03->obtenerInfoDetallada();

