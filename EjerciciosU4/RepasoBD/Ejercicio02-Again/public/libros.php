<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar libro</title>
</head>

<body>
    <h1>Inserte los datos del libro</h1>
    <form action="./libros_datos.php" method="post">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo">
        <label for="anioEdicion">Año de Edicion</label>
        <input type="number" name="anioEdicion">
        <label for="precio">Precio</label>
        <input type="number" name="precio" step="0.01">
        <label for="fechaAdq">Fecha de adquisicion</label>
        <input type="date" name="fechaAdq">
        <button type="submit" name="btnGuardar">Guardar datos del libro</button>
        <a href="./libros_guardar.php">Ver lista de libros</a>
    </form>
</body>

</html>