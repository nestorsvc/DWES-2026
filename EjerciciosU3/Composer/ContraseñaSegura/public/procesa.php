<?php
require __DIR__ . '/../vendor/autoload.php';


use App\Classes\AdaptadorGeneradorPassword;
use App\Classes\PasswordGenerator;

// Instanciamos la clase adaptador para poder usar el método generar
$adapatador = new AdaptadorGeneradorPassword();

// Recogemos los valores del formulario
$mayusculas = $_POST['mayusculas'] ?? "";
$minusculas = $_POST['minusculas'] ?? "";
$simbolos = $_POST['simbolos'] ?? "";
$numeros = $_POST['numeros'] ?? "";
$longitud = $_POST['longitud'] ?? 0;

$historialContrasenias = $_POST['contrasenias'] ?? null;


// Si se han marcado llegarán de $_POST como 'on', así que hacemos un ternario para asignarle 'true' o 'false' 
// por que el metodo generar del apatador, necesita saber esos valores.
// al la longitud la convertimos en int por que llega como string

$mayusculas = $mayusculas === 'on' ? true : false;
$minusculas = $minusculas === 'on' ? true : false;
$simbolos = $simbolos === 'on' ? true : false;
$numeros = $numeros === 'on' ? true : false;
$longitud = intval($longitud);

// Creamos una instacia de la clase PasswordGenerator, y le pasamos los datos recogidos del formulario 
// que dependiendo si se han marcado o no simplemente son, true, false y el entero de la longitud.
$objPassword = new PasswordGenerator($mayusculas,$minusculas, $numeros, $simbolos, $longitud);
$contrasenia = $adapatador->generar($objPassword);
$historial = [];
$historial[] = $contrasenia
?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" >
    <title>Contraseña segura</title>
</head>

<body class="container">
    <h1>Contraseña generada</h1>
    <!-- Usamos el la instacia para llamar al método y le pasamos la instancia con los valores recogidos -->
    <p><b><i><?= $contrasenia ?></i></b></p>
    <?php if($contrasenia !== null): ?>
        <h2>Historial de contraseñas creadas</h2>
        <?php var_dump($historial)?>
        <?php foreach ($historial as $con) :?>
            <p><?= $con ?></p>
            <?php endforeach ?>
        <?php endif ?>
    <a href="index.php">
        <p>Volver</p>
    </a>
</body>

</html>