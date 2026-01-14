<?php

namespace App\Funciones;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Clases\ConnectionPDODotenv;
use Error;
use PDO;
use PDOException;

function confirmarLlegadaFunicular()
{
    $pdo = ConnectionPDODotenv::getConnection();

    try {
        $pdo->beginTransaction();
        $pdo->exec("DELETE FROM pasajeros");
        $pdo->exec("UPDATE plazas SET reservada = 0");
        $pdo->commit();
        return true;
    } catch (Error $e) {
        $pdo->rollBack();
        echo "Error " . $e->getMessage();
        return false;
    }
}

function getDatosPlazas()
{
    $pdo = ConnectionPDODotenv::getConnection();

    $stmt = $pdo->query("SELECT numero, precio FROM plazas WHERE reservada = 0");
    $plazas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $plazas;
}
function getDatosPlazasFull()
{
    $pdo = ConnectionPDODotenv::getConnection();

    $stmt = $pdo->query("SELECT numero, precio, reservada FROM plazas");
    $plazas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $plazas;
}

function reservarPlaza($nombre, $dni, $numero_plaza)
{
    $pdo = ConnectionPDODotenv::getConnection();
    try {
        $stmt = $pdo->prepare("CALL sp_reservar (:dni, :nombre, :numero)");
        $stmt->execute([
            ':dni' => $dni,
            ':nombre' => $nombre,
            ':numero' => $numero_plaza
        ]);

        return "Plaza reservada: $numero_plaza para $nombre(DNI $dni)";
    } catch (PDOException $e) {
        if (strpos($e->getMessage(), 'DNI ya existe') !== false) {
            return "Error: ya existe un pasajero con ese DNI";
        } else {
            return "Error al reservar: " . $e->getMessage();
        }
    }
}

function actualizarPrecios($precios)
{
    $pdo = ConnectionPDODotenv::getConnection();
    foreach ($precios as $numero => $precio) {
        $stmt = $pdo->prepare("UPDATE plazas SET precio = ? WHERE numero = ?");
        $stmt->execute([$precio, $numero]);
    }
}
