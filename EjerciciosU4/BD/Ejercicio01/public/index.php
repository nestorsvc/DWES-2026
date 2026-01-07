<?php

use function App\Functions\mostrarEquipos;
use function App\Functions\mostrarJugadoresPorEquipo;
use function App\Functions\mostrarJugadores;

require_once '../app/Functions/funcionesBD.php';

$equipoFiltro = $_POST['mostrarJugadores'] ?? "";

$jugadorBaja = $_POST['jugadorBaja'] ?? "";

$jugadoresFiltrados = mostrarJugadoresPorEquipo($equipoFiltro);
$equipos = mostrarEquipos();
$jugadores = mostrarJugadores();




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA</title>
    <link rel="icon" type="image/png" href="./img/baloncesto.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="./styles/styles.css">
</head>

<body class="container">
   <header class="cabecera-titulo">
        <a href="./index.php" class="logo">
            <img src="./img/baloncesto.png" alt="Baloncesto">
        </a>
        <h1 class="titulo">Gestor NBA</h1>
    </header>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="menu">
            <button type="submit" name="btnMostrarEquipos">Mostrar Equipos</button>
            <select name="mostrarJugadores">
                <option disabled selected>Escoge un equipo</option>
                <?php foreach ($equipos as $equipo): ?>
                    <option value="<?= htmlspecialchars($equipo['nombre']) ?>" <?= $equipo['nombre'] === $equipoFiltro ? 'selected' : '' ?>> <?= htmlspecialchars($equipo['nombre']) ?> </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="btnMostrarJugadoresPorEquipo">Mostrar Jugadores</button>
            <button type="submit" name="btnMostrarFormularioAltaBaja">Gestionar Jugadores</button>
        </div>
    </form>
    <?php if (isset($_POST['btnMostrarEquipos'])): ?>
        <hr>
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

    <?php if (isset($_POST['btnMostrarJugadoresPorEquipo'])): ?>
        <?php if ($equipoFiltro === ""): ?>
            <p style="color: red"><i>Debes seleccionar un equipo primero</i></p>
        <?php else : ?>
            <hr>
            <h3><?= ucfirst($equipoFiltro) ?></h3>
            <div class="tabla">
                <div class="fila cabecera">
                    <div class="celda">Nombre</div>
                    <div class="celda">Peso (Kg)</div>
                </div>
                <?php foreach ($jugadoresFiltrados as $jugador): ?>
                    <div class="fila">
                        <div class="celda"><?= $jugador['nombre'] ?></div>
                        <div class="celda"><?= $jugador['peso'] ?></div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    <?php endif ?>

    <?php if (isset($_POST['btnMostrarFormularioAltaBaja'])): ?>
        <?php if ($equipoFiltro === ""): ?>
            <p style="color: red"><i>Debes seleccionar un equipo primero</i></p>
        <?php else : ?>
            <hr>
            <h3><?= ucfirst($equipoFiltro) ?></h3>
            <h2>Gestion de jugadores</h1>
                <form action="../app/procesa.php" method="post">
                    <h4>Jugador a dar de baja</h4>
                    <select name="jugadorBaja">
                        <option disabled selected>Selecciona el jugador</option>
                        <?php foreach ($jugadoresFiltrados as $jugador): ?>
                            <option value="<?= htmlspecialchars($jugador['nombre']) ?>" <?= htmlspecialchars($jugador['nombre'] === $jugadorBaja ? 'selected' : '') ?>> <?= htmlspecialchars($jugador['nombre']) ?> </option>
                        <?php endforeach ?>
                    </select>

                    <h4>Alta de nuevo jugador</h4>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre">

                    <label for="procedencia">Procedencia</label>
                    <input type="text" name="procedencia">

                    <label for="altura">Altura (m)</label>
                    <input type="number" name="altura" step="0.01" min="0">

                    <label for="peso">Peso</label>
                    <input type="number" name="peso" step="0.01" min="0">

                    <label for="posicion">Posicion</label>
                    <input type="text" name="posicion">

                    <input type="hidden" name="equipoFiltro" value="<?= $equipoFiltro ?>">

                    <button type="submit" name="btnAltaBaja">Confirmar baja y dar de alta</button>

                </form>
            <?php endif ?>
        <?php endif ?>
</body>

</html>