<?php
// Cargamos el autoload de Composer para que se carguen todas las clases y funciones
require_once '../app/Funciones/funcionesBD.php';
use function App\Funciones\confirmarLlegadaFunicular;

// Comprobamos si se ha pulsado el botón
if (isset($_POST['btnLlegada'])) {
    if (confirmarLlegadaFunicular()) {
        echo "Base de datos actualizada";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llegada</title>
    <link rel="stylesheet" href="./styles/llegada.css">
</head>
<body>
    <div class="container">
        <h1>Llegada al destino</h1>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <button type="submit" name="btnLlegada">Confirmar Llegada</button>
        </form>
    </div>
</body>
</html>
