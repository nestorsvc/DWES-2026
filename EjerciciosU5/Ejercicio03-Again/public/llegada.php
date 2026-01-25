<?php

use function App\FuncionesEBD\llegadaEBD;
require_once '../app/FuncionesEBD/funcionesEBD.php';

if(isset($_POST['btnLlegada'])){
    echo llegadaEBD();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llegada</title>
</head>
<body>
    <h1>Llegada, pulsa para actualizar</h1>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <button type="submit" name="btnLlegada">Llegada</button>
        <a href="index.php">Volver</a>
    </form>
</body>
</html>