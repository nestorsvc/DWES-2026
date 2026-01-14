<?php

namespace App\FuncionesEBD;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\ClasesEBD\ConexionEBD;
use Dba\Connection;
use PDOException;
use PDO;

function llegadaEBD()
{

    $pdo = ConexionEBD::getConnection();

    try {
        $pdo->beginTransaction();
        $pdo->exec("DELETE FROM pasajeros");
        $pdo->exec("UPDATE plazas SET reservada = 0");
        $pdo->commit();
        return "BD Actualizada correctamente";
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}

function obtenerNumeroPrecioPlaza()
{
    $pdo = ConexionEBD::getConnection();

    $stmt = $pdo->query("SELECT precio, numero FROM plazas WHERE reservada = 0");
    $plazas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $plazas;
}

function reservarEBD($nombre, $dni, $numero)
{
    try {
        $pdo = ConexionEBD::getConnection();

        $stmt = $pdo->prepare("CALL sp_reservar (:dni, :nombre, :numero)");
        $stmt->execute([":dni" => $dni, ":nombre" => $nombre, ":numero" => $numero]);
    } catch (PDOException $e) {
        if (strpos($e->getMessage(), "DNI ya existe")) {
            return "Error: El dni YA existe";
        } else {
            return "Error: " . $e->getMessage();
        }
    }
}

function obtenerNumeroReservasPrecio()
{
    $pdo = ConexionEBD::getConnection();

    $stmt = $pdo->query("SELECT numero, reservada, precio FROM plazas");
    $plazas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $plazas;
}

function actualizarPreciosEBD($precios)
{
    try {
        $pdo = ConexionEBD::getConnection();

        foreach ($precios as $numero => $precio) {

            $stmt = $pdo->prepare("UPDATE plazas SET precio = ? WHERE numero = ?");
            $stmt->execute([$precio, $numero]);
        }
    } catch (PDOException $e) {
       $e->getMessage(); 
    }
}
