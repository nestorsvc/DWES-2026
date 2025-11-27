<?php
namespace App\Functions;
require_once __DIR__ . '/../../vendor/autoload.php';


use PDO;
use App\Classes\ConexionBD;


function obtenerEquipos(){
    $pdo = ConexionBD::getConnection();
    $stmt = $pdo->query("SELECT nombre, ciudad, conferencia, division FROM equipos");
    $equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $equipos;
}

