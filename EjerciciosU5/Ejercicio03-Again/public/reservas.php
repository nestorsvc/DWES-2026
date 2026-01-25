<?php

use function App\FuncionesEBD\obtenerNumeroPrecioPlaza;
use function App\FuncionesEBD\reservarEBD;
require_once '../app/FuncionesEBD/funcionesEBD.php';

$plazas = obtenerNumeroPrecioPlaza();
$plazaReservada = $_POST['plazaReservada'] ?? "";

if(isset($_POST['btnReservar'])){
    $nombre = $_POST['nombre'];
    $dni = $_POST['DNI'];
    reservarEBD($nombre, $dni, $plazaReservada);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
</head>
<body>
    <h1>Reservas</h1>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <label for="DNI">DNI</label>
        <input type="text" name="DNI">

        <select name="plazaReservada">
            <option value="defecto" disabled selected>--Seleccione una plaza--</option>
                <?php foreach($plazas as $plaza):?>
                    <option value="<?= $plaza['numero'] ?> <?= $plazaReservada === $plaza["numero"] ? 'selected' : '' ?>">Numero:<?= $plaza['numero'] ?> Precio:<?= $plaza['precio'] ?></option>
                    <?php endforeach?>
        </select>

        <button type="submit" name="btnReservar">Reservar</button>
    </form>
</body>
</html>