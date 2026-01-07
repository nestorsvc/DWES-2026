<?php

namespace App\Funciones;

require_once __DIR__ . '/../../vendor/autoload.php';

use Exception;
use PDO;
use App\Clases\ConexionBD;

function mostrarTodosEquipos(){
    $pdo = ConexionBD::getConnection();

    $stmt = $pdo->query("SELECT nombre, ciudad, conferencia, division FROM equipos");
    $equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $equipos;
}
function mostrarNombresEquipos(){
    $pdo = ConexionBD::getConnection();

    $stmt = $pdo->query("SELECT nombre FROM equipos");
    $nombreEquipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $nombreEquipos;
}

function mostrarDatosJugadores($equipo){
    $pdo = ConexionBD::getConnection();

    $stmt = $pdo->prepare("SELECT nombre, peso FROM jugadores WHERE nombre_equipo = ?");
    $stmt->execute([$equipo]);
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $datos;
}
function mostrarNombresPorEquipo($equipo){
    $pdo = ConexionBD::getConnection();
    $stmt = $pdo->prepare("SELECT nombre FROM JUGADORES WHERE nombre_equipo = ?");
    $stmt->execute([$equipo]);
    $nombres = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $nombres;
}
