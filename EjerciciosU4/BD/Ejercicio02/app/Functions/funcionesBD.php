<?php

namespace App\Functions;

require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;
use App\Classes\ConexionBD;

function mostrarLibros()
{
    $pdo = ConexionBD::getConnection();

    $stmt = $pdo->query("SELECT titulo, anyo_edicion, precio, fecha_adquisicion FROM libros");
    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $libros;
}

function guardarLibro($titulo, $anio, $precio, $fechaAdq) {
    $pdo = ConexionBD::getConnection();

    $stmt = $pdo->prepare("INSERT INTO libros (titulo, anyo_edicion, precio, fecha_adquisicion) VALUES (?, ?, ?, ?)");
    $stmt->execute([$titulo, $anio, $precio, $fechaAdq]);

    return true;
}

