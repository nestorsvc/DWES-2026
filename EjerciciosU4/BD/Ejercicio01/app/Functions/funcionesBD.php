<?php

namespace App\Functions;

require_once __DIR__ . '/../../vendor/autoload.php';

use Exception;
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
function mostrarJugadores()
{
    $pdo = ConexionBD::getConnection();
    
    // Usamos query directamente
    $stmt = $pdo->query("SELECT nombre FROM jugadores");
    $jugadores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $jugadores;
}

// Para consultas con variables externas
function mostrarJugadoresPorEquipo(string $equipo)
{
    $pdo = ConexionBD::getConnection();

    // Usamos prepare con ? (placeholder) + execute [parametros en orden]
    $stmt = $pdo->prepare("SELECT nombre,peso FROM jugadores WHERE nombre_equipo = ?");
    $stmt->execute([$equipo]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function altaBajaJugador(string $nombre, string $procedencia, float $altura, $peso, string $posicion){
    function sacarCodigoJugador(string $nombre){
        $pdo = ConexionBD::getConnection();

        $stmt = $pdo->prepare("SELECT codigo FROM jugadores WHERE nombre= ?");
        $stmt->execute([$nombre]);

        $id = $stmt->fetchColumn();
        $id = (int)$id;
        return $id;
    }

    $pdo = ConexionBD::getConnection();
    
    try {
        $pdo->beginTransaction(); // iniciar transacción

        $codigo = sacarCodigoJugador($nombre);

        // Dar de baja al jugador
        $stmt = $pdo->prepare("DELETE FROM estadisticas WHERE jugador=?");
        $stmt->execute(params: [$codigo]);

        $stmt = $pdo->prepare("DELETE FROM jugadores WHERE codigo = ?");
        $stmt->execute([$codigo]);


        // Dar de alta a un nuevo jugador
        $stmt = $pdo->prepare("INSERT INTO jugadores (nombre, procedencia, altura, peso, posicion) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $procedencia, $altura, $peso, $posicion]);

        $pdo->commit(); // confirmar cambios
        return true;

    } catch (Exception $e) {
        $pdo->rollBack(); // deshacer todo si hay error
        return false;
    }

}

