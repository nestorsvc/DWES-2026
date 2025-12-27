<?php

namespace App\Functions;

require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;
use App\Classes\ConexionBD;
use Dba\Connection;
use Exception;

function validarNombre($nombre)
{
    // Quitar espacios al inicio y al final
    $nombre = trim($nombre);

    // Comprobar que no esté vacío
    if ($nombre === '') {
        return false;
    }

    // Comprobar longitud (entre 2 y 30 caracteres)
    if (mb_strlen($nombre) < 2 || mb_strlen($nombre) > 30) {
        return false;
    }

    // Comprobar que solo tenga letras y espacios (incluye tildes)
    if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $nombre)) {
        return false;
    }

    return true;
}
function validarDNI($dni)
{
    // Pasar a mayúsculas y quitar espacios
    $dni = strtoupper(trim($dni));

    // Comprobar formato: 8 números y una letra
    if (!preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
        return false;
    }

    // Separar número y letra
    $numero = substr($dni, 0, 8);
    $letra = substr($dni, 8, 1);

    // Letras válidas del DNI
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";

    // Calcular letra correcta
    $letraCorrecta = $letras[$numero % 23];

    // Comparar letras
    if ($letra !== $letraCorrecta) {
        return false;
    }

    return true;
}

function validarPrecioFunicular($precio) {
    // Quitar espacios
    $precio = trim($precio);

    // Comprobar que no esté vacío
    if ($precio === '') {
        return false;
    }

    // Comprobar que sea un número
    if (!is_numeric($precio)) {
        return false;
    }

    // Convertir a float
    $precio = floatval($precio);

    // Comprobar que sea mayor que 0
    if ($precio <= 0) {
        return false;
    }

    // Comprobar máximo dos decimales
    if (!preg_match('/^\d+(\.\d{1,2})?$/', $precio)) {
        return false;
    }

    return true;
}
