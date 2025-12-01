<?php

use function App\Functions\mostrarEquipos;
use function App\Functions\mostrarJugadoresPorEquipo;

require_once '../app/Functions/funcionesBD.php';

$equipoFiltro = $_POST['mostrarJugadoresPorEquipo'] ?? "";
$jugadoresFiltrados = mostrarJugadoresPorEquipo($equipoFiltro);
$equipos = mostrarEquipos();

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
        <button type="submit" name="btnMostrarEquipos">Mostrar Equipos</button>
        <input type="text" name="mostrarJugadoresPorEquipo" placeholder="Busca jugadores por equipo. Ej: Bucks, Bulls, etc.." value="<?= $equipoFiltro ?? " " ?>">
        <button type="submit" name="btnMostrarJugadoresPorEquipo">Mostrar Jugadores</button>
    </form>
    <?php if (isset($_POST['btnMostrarEquipos'])): ?>
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

    <?php if ($equipoFiltro !== ""): ?>
        <?php if (count($jugadoresFiltrados) < 1): ?>
            <p style="color : red"><i><?= $equipoFiltro ?> no se encuentra como equipo</i></p>
        <?php else: ?>
            <h3><?= ucfirst($equipoFiltro) ?></h3>
            <div class="tabla">
                <div class="fila cabecera">
                    <div class="celda">Nombre</div>
                </div>
                <?php foreach ($jugadoresFiltrados as $jugador): ?>
                    <div class="fila">
                        <div class="celda"><?= $jugador['nombre'] ?></div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    <?php endif ?>
</body>

</html>