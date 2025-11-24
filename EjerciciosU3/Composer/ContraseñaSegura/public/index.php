<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear contraseña segura</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body class="container">
    <h1>Generador de contraseñas seguras</h1>
    <p><i>Marca las opciones que quieres para tu contraseña</i></p>
    <form action="procesa.php" method="post">
        <label>
            <input type="checkbox" name="mayusculas"> Incluir mayúsculas
        </label>
        <label>
            <input type="checkbox" name="minusculas"> Incluir minúsculas
    </label>
    <label>
        <input type="checkbox" name="numeros"> Incluir números
        </label>
        <label>
            <input type="checkbox" name="simbolos"> Incluir símbolos
        </label>
        <label for="longitud">Longitud de la contraseña</label>
        <input type="number" id="longitud" name="longitud">
        <button type="submit">Generar</button>
    </form>
    <form method="post" action="procesa.php">
        <input type="hidden" name="contrasenias">
        <button type="submit">Mostrar Contraseñas Creadas</button>
    </form>
</body>

</html>