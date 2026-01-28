<?php

use function App\FuncionesEBD\llegadaEBD;
require_once '../app/FuncionesEBD/funcionesEBD.php';

$ahora = date("d/m/Y H:i:s");

if(isset($_COOKIE["ultimaVisita"])){
    echo $mensaje = "Bienvenido de nuevo. Tu última visita fue el " . $_COOKIE["ultimaVisita"];
} else{
    echo $mensaja = "!Bienvenido! Esta es tu primera visita";
}

setcookie("ultimaVisita", $ahora, time() + 30*24*60*60);

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