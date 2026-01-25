<?php
require_once '../app/Functions/helper.php';

iniciar_sesion();

if (!estaLogueado()) {
    flash("error", "No tienes acceso a esta página");
    redireccionar("index.php?accion=paginaLogin");
    exit;
}

$user = $_SESSION['usuario'] ?? "";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Conectado</title>
</head>

<body>

    <p>Te has conectado</p>
    <p>Hola, tu id de usuario es <?= $user ?></p>

    <a href="index.php?accion=desconectarse">Desconectarse</a>

</body>

</html>