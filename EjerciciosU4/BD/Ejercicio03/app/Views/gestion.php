<?php
use function App\Functions\mostrarPlazas;
$plazas = mostrarPlazas();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Plazas</title>
    <link rel="stylesheet" href="styles/gestion.css">
</head>

<body>
    <section>
        <h3>Gestión de Plazas</h3>
        <p>Modifica el precio de las plazas existentes y consulta su estado de reserva:</p>

        <form action="index.php?page=gestion" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Plaza</th>
                        <th>Reservada</th>
                        <th>Precio (€)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($plazas as $plaza) :?>
                    <tr>
                        <td><?= $plaza['numero'] ?></td>
                        <td><?= $plaza['reservada'] === 0 ? 'No' : 'Si' ?></td> 
                        <td><input type="text" name="precio[<?=$plaza['numero']?>]" value="<?= htmlspecialchars($plaza['precio']) ?>"></td>
                    </tr>
                     <?php endforeach ?>
                </tbody>
            </table>

            <button type="submit" name="btnActualizarPrecios">Actualizar Precios</button>
        </form>

        <a href="index.php">Volver al menú</a>
        <a href="logout.php">Cerrar sesión</a>
    </section>
</body>

</html>
