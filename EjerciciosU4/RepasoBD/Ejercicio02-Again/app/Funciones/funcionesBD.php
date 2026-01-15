<?php

namespace Ejercicio03\Funciones;

require_once __DIR__ . '/../../vendor/autoload.php'; // tu autoload de Composer

use Ejercicio03\Clases\ConexionBD;
use PDOException;
use PDO;

function guardarLibro($titulo, $anioEdicion, $precio, $fechaAdq)
{
    $pdo = ConexionBD::getConnection();
    try {
        $stmt = $pdo->prepare("INSERT INTO libros (titulo, anyo_edicion, precio, fecha_adquisicion)  VALUES (?, ?, ?, ?)");
        $stmt->execute([$titulo, $anioEdicion, $precio, $fechaAdq]);
        return true;
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

function mostarLibros()
{
    $pdo = ConexionBD::getConnection();

    $stmt = $pdo->query("SELECT * FROM libros");
    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $libros;
}

function actualizarPrecioLibros($precios)
{
    try {
        $pdo = ConexionBD::getConnection();

        foreach ($precios as $numero_ejemplar => $precio) {
            $stmt = $pdo->prepare("UPDATE libros SET precio = ? WHERE numero_ejemplar = ?");
            $stmt->execute([$precio, $numero_ejemplar]);
        }

    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }
}
