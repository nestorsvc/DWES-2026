<?php

use function App\Functions\altaBajaJugador;

require_once '../app/Functions/funcionesBD.php';

// Jugador que vamos a dar de baja
$jugadorBaja = $_POST['jugadorBaja'] ?? "";

// Datos del nuevo jugador
$nombre = $_POST['nombre'] ?? null;
$procedencia = $_POST['procedencia'] ?? null;
$altura = $_POST['altura'] ?? null;
$peso = $_POST['peso'] ?? null;
$posicion = $_POST['posicion'] ?? null;
$equipoFiltro = $_POST['equipoFiltro'] ?? null;


function validarNombre($nombre)
{
    // preg_match() devuelve 1 si encuentra coiniciencia o 0 si no
    // con esta regex aseguramos que solo haya letras y acentos permitidos, espacios entre nombres y no permitimos numeros ni caracteres especiales
    if (preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$/', $nombre)) {
        return true;
    } else {
        return false;
    }
}

function validarProcedencia($procedencia)
{
    if (preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$/', $procedencia)) {
        return true;
    } else {
        return false;
    }
}

function validarPosicion($posicion)
{
    if (preg_match('/^(F|C|G)(-(?!\1)(F|C|G))?$/', $posicion)) {
        return true;
    } else {
        return false;
    }
}

if (validarNombre($nombre) && validarPosicion($posicion) && validarProcedencia($procedencia)) {
    if (altaBajaJugador($jugadorBaja, $nombre, $procedencia, $altura, $peso, $posicion,$equipoFiltro)) {
        echo "todo salio bien";
    } else {
        echo "algo fallo";
    }
} else {
    echo "al carajo";
}
?>
<a href="../public/index.php"><p>Volver</p></a>