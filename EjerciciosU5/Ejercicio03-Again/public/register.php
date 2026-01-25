<?php
include '../app/FuncionesEBD/funcionesEBD.php';

use function App\FuncionesEBD\registrarUsuarios;

if (isset($_POST['btnRegistrarse'])){
    $password = $_POST['contrasenia'] ?? "";
    $password2 = $_POST['contrasenia'] ?? "";
    $usuario = $_POST['usuario'] ?? "";

    if(registrarUsuarios($usuario, $password, $password2)){
        echo "Usuario $usuario registrado correctamente";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h1>Resgistrate</h1>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario">

        <label for="contrasenia">Contrasenia</label>
        <input type="password" name="contrasenia">

        <label for="contrasenia2">Repetir cotraseña</label>
        <input type="password" name="contrasenia2">

        <button type="submit" name="btnRegistrarse">Registrarse</button>
    </form>
</body>

</html>