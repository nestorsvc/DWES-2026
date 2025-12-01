<?php

use function App\Functions\mostrarEquipos;
use function App\Functions\mostrarJugadoresPorEquipo;

require_once '../app/Functions/funcionesBD.php';

// Jugador que vamos a dar de baja
$jugadorBaja = $_POST['jugadorBaja'] ?? "";

// Datos del nuevo jugador
$nombre = $_POST['nombre'] ?? null;
$procedencia = $_POST['procedencia'] ?? null;
$altura = $_POST['altura'] ?? null;
$peso = $_POST['peso'] ?? null;
$posicion = $_POST['posicion'] ?? null;



$mensajes = [];


