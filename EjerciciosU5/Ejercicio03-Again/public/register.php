<?php
use function App\FuncionesEBD\registrarUsuario;
require_once __DIR__ . '/../app/FuncionesEBD/funcionesEBD.php';


$usuario = $_POST['usuario'] ?? "";
$password = $_POST['password'] ?? "";
$password2 = $_POST['password2'] ?? "";

if(isset($_POST['btnRegistrarse'])){
    echo registrarUsuario($usuario, $password, $password2);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer</title>
</head>

<body>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario">

        <label for="password">Password</label>
        <input type="password" name="password">

        <label for="password2">Repetir password</label>
        <input type="password" name="password2">

        <button type="submit" name="btnRegistrarse">Registrarse</button>
    </form>
</body>

</html>