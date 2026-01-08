<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/EjerciciosU4/BD/Ejercicio03/public/styles/login.css">
</head>
<body>
    
<section>
    <h3>Iniciar sesión</h3>
    <p>Introduce tu usuario y contraseña para acceder.</p>

    <form action="/EjerciciosU4/BD/Ejercicio03/public/index.php?page=login" method="post">
        <table>
            <tbody>
                <tr>
                    <td><label for="usuario">Usuario</label></td>
                    <td>
                        <input type="text" name="usuario" id="usuario" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Contraseña</label></td>
                    <td>
                        <input type="password" name="password" id="password" required>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="submit" name="btnLoguear">Entrar</button>
        <a href="/EjerciciosU4/BD/Ejercicio03/public/index.php?page=register">Registrarse</a>
    </form>
</section>

</body>
</html>
