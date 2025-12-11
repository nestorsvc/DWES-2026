<?php
require_once '../app/Functions/funcionesBD.php';

use function App\Functions\mostrarLibros;

$btnMostrarLibros = $_POST['btnMostrarLibros'] ?? null;
$libros = mostrarLibros();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="./styles/styles.css">
    <title>Listado de Libros</title>
</head>

<body class="container">
    <h1>Listado de libros</h1>
    <div class="tabla">
        <div class="fila cabecera">
            <div class="celda">Titulo</div>
            <div class="celda">Año de Edicion</div>
            <div class="celda">Precio</div>
            <div class="celda">Fecha de Adquisicion</div>
        </div>
        <?php if ($btnMostrarLibros !== null): ?>
            <?php foreach ($libros as $libro): ?>
                <div class="fila">
                    <div class="celda"><?= $libro['titulo'] ?></div>
                    <div class="celda"><?= $libro['anyo_edicion'] ?></div>
                    <div class="celda"><?= $libro['precio'] ?></div>
                    <div class="celda"><?= $libro['fecha_adquisicion'] ?></div>
                </div>
                <?php endforeach ?>
            <?php endif ?>
    </div>
    <p><a href="./libros.php">Volver</a></p>
</body>

</html>