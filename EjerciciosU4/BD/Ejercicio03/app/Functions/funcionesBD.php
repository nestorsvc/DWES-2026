<?php

namespace App\Functions;

require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;
use App\Classes\ConexionBD;
use Dba\Connection;
use Exception;

function confirmarLlegada()
{
    $pdo = ConexionBD::getConnection();
    try {
        // Iniciamos la transacción
        $pdo->beginTransaction();

        // Borramos todos los datos de la tabla pasajeros
        // exec -> devuelve el numero de filas afectadas | query-> devuelve un resultado (SELECT)
        $stmt = $pdo->exec("DELETE FROM pasajeros");

        // Actualizamos todas las filas de la tabla reservadas a NO
        // exec -> devuelve el numero de filas afectadas | query-> devuelve un resultado (SELECT)
        $stmt = $pdo->exec("UPDATE plazas SET reservada = 0");

        $pdo->commit();
        return "Base de datos actualizada correctamente";
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function mostrarPlazasLibres()
{
    $pdo = ConexionBD::getConnection();
    $stmt = $pdo->query("SELECT numero, precio FROM plazas WHERE reservada = 0");
    $plazas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $plazas;
}

function mostrarPlazas()
{
    $pdo = ConexionBD::getConnection();
    $stmt = $pdo->query("SELECT numero, precio, reservada FROM plazas");
    $plazas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $plazas;
}

function reservarPlaza(string $dni, string $nombre, int $numero_plaza)
{
    $pdo = ConexionBD::getConnection();

    try {
        $pdo->beginTransaction();

        $stmt = $pdo->prepare(
            "INSERT INTO pasajeros (dni, nombre, sexo, numero_plaza)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([$dni, $nombre, "-", $numero_plaza]);

        $stmt = $pdo->prepare(
            "UPDATE plazas SET reservada = 1 WHERE numero = ?"
        );
        $stmt->execute([$numero_plaza]);

        $pdo->commit();
        return true;
    } catch (Exception $e) {
        $pdo->rollBack();

        if ($e->getCode() === '23000') {
            return "dni_duplicado"; // código de error
        }

        return false;
    }
}


function actualizarPrecios($nuevoPrecio, $numeroPlaza)
{
    $pdo = ConexionBD::getConnection();

    $stmt = $pdo->prepare("UPDATE plazas SET precio = ? WHERE numero = ?");

    $stmt->execute([$nuevoPrecio, $numeroPlaza]);
}
