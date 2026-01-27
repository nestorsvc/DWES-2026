<?php
require_once '../app/Funciones/helper.php';
iniciar_sesion();

if (estaLogueado()) {
    redireccionar("index.php?accion=paginaConectado");
    return;
}

$error = flash("error");
$email = $_SESSION['email'] ?? "";
unset($_SESSION['email']);

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php if ($error): ?>
        <p class="error">
            <?= $error ?>
        </p>
    <?php endif; ?>
    <form action="index.php?accion=autenticar" method="post">
        <label for="usuario">Email</label>
        <input type="text" name="usuario" value="<?= $email ?>">

        <label for="password">Password</label>
        <input type="password" name="password">

        <button type="submit">Iniciar sesión</button>
    </form>

</body>

</html>