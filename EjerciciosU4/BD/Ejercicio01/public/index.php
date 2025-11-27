<?php

use function App\Functions\obtenerEquipos;

require_once '../app/Functions/funcionesBD.php';

$equipos = obtenerEquipos();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="./styles/styles.css">

</head>

<body class="container">
    <a href="./index.php">
        <h1>Gestor NBA</h1>
    </a>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <button type="submit" name="mostrar">Mostrar Equipos</button>
    </form>
    <?php if (isset($_POST['mostrar'])): ?>
        <div class="tabla">
            <div class="fila cabecera">
                <div class="celda">Nombre</div>
                <div class="celda">Ciudad</div>
                <div class="celda">Conferencia</div>
                <div class="celda">Division</div>
            </div>
            <?php foreach ($equipos as $equipo): ?>
                <div class="fila">
                    <div class="celda"><?= $equipo['nombre'] ?></div>
                    <div class="celda"><?= $equipo['ciudad'] ?></div>
                    <div class="celda"><?= $equipo['conferencia'] ?></div>
                    <div class="celda"><?= $equipo['division'] ?></div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</body>

</html>