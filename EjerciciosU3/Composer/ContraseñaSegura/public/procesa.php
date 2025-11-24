<?php
require '../vendor/autoload.php';

use App\Classes\PasswordGenerator;
use App\Classes\AdaptadorGeneradorPassword;

// Recogemos valores del formulario
$opciones = $_POST['opciones'] ?? [];
$longitud = $_POST['longitud'] ?? 8;

// Convertir opciones a booleanos
$mayus = in_array('mayusculas', $opciones);
$minus = in_array('minusculas', $opciones);
$num = in_array('numeros', $opciones);
$simbol = in_array('simbolos', $opciones);
// Crear objeto que guarda las opciones
$config = new PasswordGenerator($mayus, $minus, $num, $simbol, $longitud);

// Crear adaptador
$adaptador = new AdaptadorGeneradorPassword();

// Generar contraseña
$password = $adaptador->generar($config);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contraseña generada</title>
</head>
<body>
    <h1>Tu nueva contraseña:</h1>
    <p><b><?= htmlspecialchars($password) ?></b></p>

    <a href="index.php">Volver</a>
</body>
</html>
