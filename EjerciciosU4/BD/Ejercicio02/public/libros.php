<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Libros</title>
</head>

<body class="container">
    <h1>Guardar libro</h1>
    <hr>
    <form action="../app/Functions/libros_guardar.php" method="post">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo">
        <label for="anio">Año de edición</label>
        <input type="number" name="anio">
        <label for="precio">Precio</label>
        <input type="number" name="precio" step="0.01">
        <label for="fechaAdq">Fecha de adquisición</label>
        <input type="text" name="fechaAdq" placeholder="AAAA-MM-DD">
        <button type="submit" name="btnGuardar">Guardar</button>
    </form>
    <hr>
    <form action="./libros_datos.php" method="post">
        <button type="submit" name="btnMostrarLibros">Mostrar Libros</button>
    </form>
</body>

</html>
<?php

?>