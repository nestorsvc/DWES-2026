<?php
require_once '../app/Functions/helper.php';

use App\Classes\Autenticarse;

iniciar_sesion();

if (estaLogueado()) {
    redireccionar("index.php?accion=paginaConectado");
    exit;
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
    <title>Formulario</title>
</head>

<body>
    <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form action="index.php?accion=autenticar" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $email ?>">

        <label for="password">Password</label>
        <input type="password" name="password">

        <button type="submit" name="btnLogin">Login</button>
    </form>
</body>

</html>