<?php 
use function App\Functions\mostrarPlazasLibres;
$plazas = mostrarPlazasLibres() ?? null;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Plaza</title>
    <link rel="stylesheet" href="styles/reservar.css">
</head>

<body>
    <section>
        <h3>Reservar Plaza</h3>
        <p>Introduce tus datos y selecciona una plaza libre:</p>

        <form action="index.php?page=reservar" method="POST">
            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="plaza">Plazas disponibles:</label>
            <select id="plaza" name="plaza" required>
                <option value="" disabled selected>-- Selecciona una plaza --</option>
                <?php foreach($plazas as $plaza):?>
                    <option value="<?= htmlspecialchars($plaza['numero'])?>" >
                        <p>Numero <?= htmlspecialchars($plaza['numero']) ?></p>
                        <p>Precio <?= htmlspecialchars($plaza['precio']) ?> €</p>
                    </option>
                    <?php endforeach ?>
            </select>

            <button type="submit" name="btnReservar">Reservar</button>
        </form>

        <a href="index.php">Volver al menú</a>
    </section>
</body>

</html>
