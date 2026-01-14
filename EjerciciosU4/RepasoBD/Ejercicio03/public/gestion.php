<?php
require_once '../app/Funciones/funcionesBD.php';
use function App\Funciones\getDatosPlazasFull;
use function App\Funciones\actualizarPrecios;


if (isset($_POST['btnGuardar'])) {
    actualizarPrecios($_POST['precios']);
    echo "<p>Precios actualizados correctamente.</p>";
    }
    
    $plazas = getDatosPlazasFull();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/gestion.css">
    <title>Getion</title>
</head>
<body>
    <h1>Gestion de plazas</h1>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <table>
        <thead>
            <tr>
                <th>Plaza</th>
                <th>Reservada</th>
                <th>Precio ($€)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($plazas as $plaza):?>
                <tr>
                    <td><?= $plaza['numero']?></td>
                    <td><?= $plaza['reservada'] ? 'Si' : 'No'?></td>
                    
                    <td><input type="number" name="precios[<?= $plaza['numero'] ?>]" value="<?= $plaza['precio'] ?>" step="any"></td>
                </tr>
                <?php endforeach;?>
                    <button type="submit" name="btnGuardar">Guardar</button>
                </form>
        </tbody>
    </table>
</body>
</html>