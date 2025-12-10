<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
<h1>Gestion de altas y bajas</h1>
<a href="../public/index.php">
    <p>Volver</p>
</a>
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

// Lo recogo con el input hidden
$equipoFiltro = $_POST['equipoFiltro'] ?? null;

// Variable global para mostrar los errores
$error = [];

/**
 * FUNCIONES PARA VALIDAR LOS DATOS DEL FORMULARIO
 */

/**
 * Función para validar nombre
 * @param mixed $nombre => campo nombre
 * @return true o false según cumpla con la validación o no
 */
function validarNombre($nombre)
{
    // preg_match() devuelve 1 si encuentra coiniciencia o 0 si no
    // con esta regex aseguramos que solo haya letras y acentos permitidos, espacios entre nombres y no permitimos numeros ni caracteres especiales
    if (preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$/', $nombre)) {
        return true;
    } else {
        $GLOBALS['error'][] =  'Nombre introducido no válido';
        return false;
    }
}

/**
 * Función para validar procedencia
 * @param mixed $procedencia => campo procedencia
 * @return true o false según cumpla con la validación o no 
 */
function validarProcedencia($procedencia)
{
    if (preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$/', $procedencia)) {
        return true;
    } else {
        $GLOBALS['error'][] =  'Procedencia introducida no válida';
        return false;
    }
}

/**
 * Función para validar posición
 * @param mixed $posicion => campo posicion
 * @return true o false según se cumpla la validación
 */
function validarPosicion($posicion)
{
    if (preg_match('/^(F|C|G)(-(?!\1)(F|C|G))?$/', $posicion)) {
        return true;
    } else {
        $GLOBALS['error'][] =  'Posición introducida no válida';
        return false;
    }
}

/**
 * Try - Catch para manejar los posibles errores en la transacción de la función altaBajaJugador()
 */
try {
    if (validarNombre($nombre) && validarPosicion($posicion) && validarProcedencia($procedencia)) {
        if (altaBajaJugador($jugadorBaja, $nombre, $procedencia, $altura, $peso, $posicion, $equipoFiltro)) {
            echo "<p style='color : green'><i>Operación relaizada con exito</i></p>";
        }
    }
    foreach ($GLOBALS['error'] as $e) {
        echo "<p style='color : red'><i>$e</i></p>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>