<?php

require_once '../app/Funciones/funcionesBD.php';
use function App\Funciones\getDatosPlazas;
use function App\Funciones\reservarPlaza;

$plazas = getDatosPlazas();
$plazaReservada = $_POST['plazaReservada'] ?? "";

if(isset($_POST['btnReservar'])){
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    echo reservarPlaza($nombre, $dni, $plazaReservada);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/reservar.css">
    <title>Reservar</title>
</head>
<body>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label for="DNI">DNI</label>
        <input type="text" name="dni" placeholder="Introduce tu nombre" required>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Introduce tu nombre" required>

        <p>Selecciona una plaza</p>
        <select name="plazaReservada" required>
            <option value="defecto" disabled selected>--Seleccione una plaza--</option>
            <?php foreach($plazas as $plaza): ?>
                <option value="<?= $plaza['numero'] ?>" <?=  $plazaReservada === $plaza['numero'] ? 'selected' : '' ?> >Número <?= $plaza['numero'] ?> Precio <?= $plaza['precio'] ?></option>
                <?php endforeach;?>
        </select>
        <button type="submit" name="btnReservar">Reservar</button>
    </form>
</body>
</html>