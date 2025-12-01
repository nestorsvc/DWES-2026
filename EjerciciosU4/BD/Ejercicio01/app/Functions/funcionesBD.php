<?php

namespace App\Functions;

require_once __DIR__ . '/../../vendor/autoload.php';


use PDO;
use App\Classes\ConexionBD;

// Para consultar simples, sin variables externas
function mostrarEquipos()
{
    $pdo = ConexionBD::getConnection();
    
    // Usamos query directamente
    $stmt = $pdo->query("SELECT nombre, ciudad, conferencia, division FROM equipos");
    $equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $equipos;
}

// Para consultas con variables externas
function mostrarJugadoresPorEquipo(string $equipo)
{
    $pdo = ConexionBD::getConnection();
    $equipo = strtolower($equipo);

    // Usamos prepare con ? (placeholder) + execute [parametros en orden]
    $stmt = $pdo->prepare("SELECT nombre FROM jugadores WHERE nombre_equipo = ?");
    $stmt->execute([$equipo]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
