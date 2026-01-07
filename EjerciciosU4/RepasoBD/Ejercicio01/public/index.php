<?php

use function App\Funciones\mostrarDatosJugadores;
use function App\Funciones\mostrarTodosEquipos;
use function App\Funciones\mostrarNombresEquipos;
use function App\Funciones\mostrarNombresPorEquipo;

require_once '../app/Funciones/funcionesBD.php';

$btnMostrarEquipos = $_POST['btnMostrarEquipos'] ?? null;
$btnMostrarJugadores = $_POST['btnMostrarJugadores'] ?? null;

$equipoSeleccionado = $_POST['equipoSeleccionado'] ?? null;
$jugadorSeleccionado = $_POST['jugadorSeleccionado'] ?? null;

$equipos = mostrarTodosEquipos();
$nombresEquipos = mostrarNombresEquipos();
$datosJugadores = mostrarDatosJugadores($equipoSeleccionado);
$nombresJugadores = mostrarNombresPorEquipo($equipoSeleccionado);


$jugadorSeleccionado = $_POST['jugadorSeleccionado'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>NBA</title>
</head>

<body>
    <a href="index.php">
        <h1 id="titulo">Consulta la base de datos de la NBA</h1>
    </a>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <button type="submit" name="btnMostrarEquipos">Mostrar equipos</button>
        <select name="equipoSeleccionado">
            <option disabled selected> -- Selecciona un equipo -- </option>
            <?php foreach ($nombresEquipos as $nombresEquipo): ?>
                <option value="<?= htmlspecialchars($nombresEquipo['nombre']) ?>" <?= $nombresEquipo['nombre'] === $equipoSeleccionado ? 'selected' : ' ' ?>><?= htmlspecialchars($nombresEquipo['nombre']) ?></option>
            <?php endforeach ?>
        </select>
        <button type="submit" name="btnMostrarJugadores">Mostrar Jugadores</button>
    </form>

    <?php if ($btnMostrarEquipos !== null) : ?>
        <div class="equipos">
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
        </div>
    <?php endif ?>
    <?php if ($btnMostrarJugadores !== null): ?>
        <h1>Equipo: <?= $equipoSeleccionado ?></h1>
        <div class="jugadores">
            <div class="tabla">
                <div class="fila cabecera">
                    <div class="celda">Nombre</div>
                    <div class="celda">Peso (Kg)</div>
                </div>
                <?php foreach ($datosJugadores as $datos): ?>
                    <div class="fila">
                        <div class="celda"><?= $datos['nombre'] ?></div>
                        <div class="celda"><?= $datos['peso'] ?></div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>


        <p>Jugador a dar de baja</p>
        <h1>Equipo: <?= $equipoSeleccionado ?></h1>
        <p>Selecciona el jugador</p>
        <form action="../Funciones/procesa.php" method="post">
            <select name="jugadorSeleccionado">
                <option disabled selected> -- Selecciona jugador -- </option>
                <?php foreach ($nombresJugadores as $nombreJugador): ?>
                    <?= var_dump($nombreJugador) ?>
                    <option value="<?= htmlspecialchars($nombreJugador['nombre']) ?>" <?= $nombreJugador['nombre'] === $jugadorSeleccionado ? 'selected' : '' ?>><?= htmlspecialchars($nombreJugador['nombre']) ?></option>
                <?php endforeach ?>
            </select>

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

            <input type="hidden" name="equipoSeleccionado" value="<?= $equipoSeleccionado ?>">

            <button type="submit" name="btnAltaBaja">Confirmar Cambios</button>
        </form>


    <?php endif ?>
</body>

</html>