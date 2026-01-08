<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="/EjerciciosU4/BD/Ejercicio03/public/styles/register.css">
</head>
<body>

<section>
    <h3>Registro de usuario</h3>
    <p>Introduce tus datos para crear una cuenta nueva.</p>

    <form action="/EjerciciosU4/BD/Ejercicio03/public/index.php?page=register" method="post">
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
                <tr>
                    <td><label for="password2">Repetir contraseña</label></td>
                    <td>
                        <input type="password" name="password2" id="password2" required>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="submit" name="btnRegister">Registrar</button>
        <button type="reset" class="cancelar">Cancelar</button>
    </form>
</section>

</body>
</html>