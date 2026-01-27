<?php
require_once '../app/Funciones/helper.php';
iniciar_sesion();

if (!estaLogueado()) {
    flash("error", "No tienes permiso para ver esta página");
    redireccionar("index.php?accion=paginaLogin");
    return;
}

$usuario = $_SESSION['usuario'] ?? "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Conectado</title>
</head>
<body>
    <h1>Te has conectado</h1>
    <p>Hola, tu id de usuario es <?= $usuario['email'] ?></p>
</body>

</html>