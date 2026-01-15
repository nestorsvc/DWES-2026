<?php

use function Ejercicio03\Funciones\actualizarPrecioLibros;
use function Ejercicio03\Funciones\guardarLibro;

require_once '../app/Funciones/funcionesBD.php';

// Verificar que se llegó mediante POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: libros.php');
    exit;
}


$titulo = $_POST['titulo'] ?? "";
$anioEdicion = intval($_POST['anioEdicion'] ?? 0);  
$precio = floatval($_POST['precio'] ?? 0);          
$fechaAdq = $_POST['fechaAdq'] ?? "";;


$precios = $_POST['precios'] ?? [];


if (isset($_POST['btnEditar'])) {
    actualizarPrecioLibros($precios);
    header('Location: libros_guardar.php');
} else {

    // Inicializamos el array de errores
    $errores = [];


    // Funciones de validación
    function validarCampoRequerido($valor, $nombreCampo)
    {
        if ($valor === "") {
            return "El campo $nombreCampo es obligatorio";
        }
        return true;
    }

    function validarFechas($fecha)
    {
        $hoy = time();
        $timestamp = strtotime($fecha);

        if ($timestamp > $hoy) {
            return "La fecha de adquisición no puede ser superior a hoy";
        }
        return true;
    }

    function validarAnio($anio)
    {
        $hoy = getdate();
        if ($anio > $hoy['year']) {
            return "El año de edición no puede ser mayor que el actual";
        }
        return true;
    }

    // Validaciones
    $reqTitulo = validarCampoRequerido($titulo, "Título");
    $reqAnio = validarCampoRequerido($anioEdicion, "Año de edición");
    $reqPrecio = validarCampoRequerido($precio, "Precio");
    $reqFechaAdq = validarCampoRequerido($fechaAdq, "Fecha de adquisición");

    $valFecha = validarFechas($fechaAdq);
    $validarAnio = validarAnio($anioEdicion);

    // Guardamos errores
    if ($reqTitulo !== true) {
        $errores[] = $reqTitulo;
    }
    if ($reqAnio !== true) {
        $errores[] = $reqAnio;
    }
    if ($reqPrecio !== true) {
        $errores[] = $reqPrecio;
    }
    if ($reqFechaAdq !== true) {
        $errores[] = $reqFechaAdq;
    }
    if ($valFecha !== true) {
        $errores[] = $valFecha;
    }
    if ($validarAnio !== true) {
        $errores[] = $validarAnio;
    }

    // Si hay errores, los mostramos y paramos
    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo $error . "<br>";
        }
        exit;
    }

    // Si todo está bien, llamas a tu función que guarda en la BD
    guardarLibro($titulo, $anioEdicion, $precio, $fechaAdq);
    echo "Datos guardados correctamente";
}
