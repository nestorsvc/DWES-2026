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

function altaBajaJugador(string $jugadorBaja, string $nombre, string $procedencia, float $altura, $peso, string $posicion, string $nombre_equipo)
{
    function sacarCodigoJugador(string $jugadorBaja)
    {
        $pdo = ConexionBD::getConnection();

        $stmt = $pdo->prepare("SELECT codigo FROM jugadores WHERE nombre= ?");
        $stmt->execute([$jugadorBaja]);

        $id = $stmt->fetchColumn();
        $id = (int)$id;
        return $id;
    }

    $pdo = ConexionBD::getConnection();

    try {
        $pdo->beginTransaction(); // iniciar transacción

        $codigo = sacarCodigoJugador($jugadorBaja);

        // Dar de baja al jugador
        $stmt = $pdo->prepare("DELETE FROM estadisticas WHERE jugador=?");
        $stmt->execute(params: [$codigo]);

        $stmt = $pdo->prepare("DELETE FROM jugadores WHERE codigo = ?");
        $stmt->execute([$codigo]);


        // Dar de alta a un nuevo jugador
        $stmt = $pdo->prepare("INSERT INTO jugadores (nombre, procedencia, altura, peso, posicion, nombre_equipo) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $procedencia, $altura, $peso, $posicion, $nombre_equipo]);

        $pdo->commit(); // confirmar cambios
        return true;
    } catch (Exception $e) { 
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
        return false;
    }
}
