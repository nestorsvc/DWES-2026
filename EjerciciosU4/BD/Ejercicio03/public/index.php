<?php
session_start();
require_once '../app/Functions/funcionesBD.php';

use function App\Functions\confirmarLlegada;
use function App\Functions\reservarPlaza;
use function App\Functions\actualizarPrecios;
use function App\Functions\registrarUsuario;
use function App\Functions\loguearUsuario;
// public/index.php

$page = $_GET['page'] ?? 'principal';

// los require __DIR__ muestran cada página, es necesario el dir por que hace referencia a la ruta absoluta 
// y así no hay problemas de rutas dependiendo de donde esté cada fichero

switch ($page) {
    case 'reservar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnReservar'])) {

            $dni = $_POST['dni'] ?? "";
            $nombre = $_POST['nombre'] ?? "";
            $plaza = $_POST['plaza'] ?? null;

            $resultado = reservarPlaza($dni, $nombre, $plaza);

            if ($resultado === true) {
                echo '<p style="color:green">Plaza reservada correctamente</p>';
            } elseif ($resultado === "dni_duplicado") {
                echo '<p style="color:red">Ya se ha hecho una reserva con este DNI</p>';
            } else {
                echo '<p style="color:red">Error al reservar la plaza</p>';
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnActualizarPrecios'])) {
            $precio = $_POST['precio'] ?? null;
            foreach ($precio as $numeroPlaza => $nuevoPrecio) {
                actualizarPrecios($nuevoPrecio, $numeroPlaza);
            }
        }
        require __DIR__ . '/../app/Views/gestion.php';
        break;
    case "register":
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['btnRegister'])) {

            $usuario = $_POST['usuario'] ?? null;
            $password = $_POST['password'] ?? null;
            $password2 = $_POST['password2'] ?? null;

            if (registrarUsuario($usuario, $password, $password2)) {
                header("Location: index.php?page=login");
                exit;
            } else {
                echo '<p style="color:red">Las contraseñas deben ser iguales</p>';
            }
        }
        require __DIR__ . '/../app/Views/register.php';
        break;

    case "login":
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnLoguear'])) {

            $usuario = $_POST['usuario'] ?? null;
            $password = $_POST['password'] ?? null;

            if (loguearUsuario($usuario, $password) === true) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['logueado'] = true;
                header("Location: index.php?page=principal");
                exit;
            } else {
                echo '<p style="color:red">Campos incorrectos</p>';
            }
        }
        require __DIR__ . '/../app/Views/login.php';
        break;
    default:
        require __DIR__ . '/../app/Views/principal.php';
}
