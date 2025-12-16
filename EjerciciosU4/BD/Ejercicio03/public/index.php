<?php
require_once '../app/Functions/funcionesBD.php';

use function App\Functions\confirmarLlegada;
use function App\Functions\reservarPlaza;
use function App\Functions\actualizarPrecios;
// public/index.php

$page = $_GET['page'] ?? 'principal';

switch ($page) {
    case 'reservar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnReservar'])) {

            $dni = $_POST['dni'] ?? "";
            $nombre = $_POST['nombre'] ?? "";
            $plaza = $_POST['plaza'] ?? null;

            $resultado = reservarPlaza($dni, $nombre, $plaza);

            if ($resultado !== false) {
                echo '<p style="color:green">' . $resultado . '</p>';
            }
        }
        require __DIR__ . '/../app/Views/reservar.php';
        break;

    case 'llegada':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnConfirmarLlegada'])) {
            $resultado = confirmarLlegada();
            if ($resultado !== false) {
                echo '<p style="color:green">' . $resultado . '</p>';
            }
        }
        require __DIR__ . '/../app/Views/llegada.php';
        break;

    case 'gestion':
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnActualizarPrecios'])){
            $precio = $_POST['precio'] ?? null;
            foreach ($precio as $numeroPlaza => $nuevoPrecio){
                actualizarPrecios($nuevoPrecio, $numeroPlaza);
            }
        }
        require __DIR__ . '/../app/Views/gestion.php';
        break;

    default:
        require __DIR__ . '/../app/Views/principal.php';
}
