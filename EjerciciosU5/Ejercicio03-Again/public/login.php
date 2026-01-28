<?php 
use function App\FuncionesEBD\loginUsuario;
require_once __DIR__ . "/../app/FuncionesEBD/funcionesEBD.php";

if(isset($_POST['btnLoguearse'])){
    $usuario = $_POST['usuario'] ?? "";
    $password = $_POST['password'] ?? "";

    loginUsuario($usuario, $password);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
     <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario">

        <label for="password">Password</label>
        <input type="password" name="password">

        <button type="submit" name="btnLoguearse">Login</button>
    </form>
</body>
</html>