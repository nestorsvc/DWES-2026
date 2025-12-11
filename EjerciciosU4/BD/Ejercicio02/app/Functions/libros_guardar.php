<?php

namespace App\Functions;

require_once __DIR__ . '/../../vendor/autoload.php';

use Exception;
use PDO;

require_once 'funcionesBD.php';

use function App\Functions\guardarLibro;
// Recogo los datos del formulario enviados
$titulo = $_POST['titulo'] ?? "";
$anio = $_POST['anio'] ?? 0;
$anio = intval($anio);
$precio = $_POST['precio'] ?? 0;
$precio = intval($precio);
$fechaAdq = $_POST['fechaAdq'] ?? "";

// Variable para almacenar los mensajes de error
$msgErrores = [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Lirbos Guardar</title>
</head>
<body>
    
</body>
</html>
<?php
/**
 * Funciones para validar los datos
 */

// Funcion para validar el titulo
function validarTitulo($titulo)
{
    if (strlen($titulo) > 20) {
        $GLOBALS['msgErrores'] = 'El titulo no puede tener más de 20 caracteres';
        return false;
    }
    return true;
}
function validarAnio($anio)
{
    $anioActualTimeStamp = strtotime("now");
    $anioActual = date("Y", $anioActualTimeStamp);
    if ($anio > $anioActual) {
        $GLOBALS['msgErrores'][] = 'El año de edición no puede ser mayor que el actual';
        return false;
    }
    if ($anio < 1450) {
        $GLOBALS['msgErrores'][] = 'Antes de este año no existía la imprenta';
        return false;
    }
    return true;
}

function validarPrecio($precio)
{
    if ($precio < 0) {
        $GLOBALS['msgErrores'][] = 'El precio debe ser superior a 0€';
        return false;
    }
    if ($precio > 10000) {
        $GLOBALS['msgErrores'][] = 'El precio debe ser inferior a 10.0000€';
        return false;
    }
    return true;
}

function validarFechaAdq($fechaAdq)
{
    // Con esto, estoy trabajando con la cadena y estoy cogiendo unicamente el día mes y año
    $dias = substr($fechaAdq, 0, 2);
    $mes = substr($fechaAdq, 3, 2);
    $anio = substr($fechaAdq, 6, 4);

    $dias = intval($dias);
    $mes = intval($mes);
    $anio = intval($anio);

    $anioActualTimeStamp = strtotime("now");
    $anioActual = date("Y", $anioActualTimeStamp);
    $anioActual = intval($anioActual);

    if ($dias < 0 || $dias > 31 || $mes < 0 || $mes > 12 || $anio > $anioActual || $anio < 1900) {
        $GLOBALS['msgErrores'][] = 'Fecha inválida';
        return false;
    }
    return true;
}

try {
    if (validarTitulo($titulo) && validarAnio($anio) && validarPrecio($precio) && validarFechaAdq($fechaAdq)) {
        guardarLibro($titulo, $anio, $precio, $fechaAdq);
        echo '<p style="color:green">Libro Guardado Correctamente</p>';
    }

    foreach ($GLOBALS['msgErrores'] as $e) {
        echo "<p style='color:red'>$e</p>";
    }
    echo "<br>";
    echo '<p><a href="../../public/libros.php">Volver</a></p>';
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
