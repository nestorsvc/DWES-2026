<?php
use function Ejercicio03\Funciones\mostarLibros;
require_once '../app/Funciones/funcionesBD.php';

$libros = mostarLibros();
if (isset($_POST['precios'])){
    var_dump($_POST['precios']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de libros</title>
</head>
<body>
    <form action="./libros_datos.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Año de edicion</th>
                    <th>Precio</th>
                    <th>Fecha de adquisicon</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($libros as $libro):?>
                    <tr>
                        <td><?= $libro["titulo"] ?></td>
                        <td><?= $libro["anyo_edicion"] ?></td>
                        <td><input type="number" name="precios[<?= $libro['numero_ejemplar'] ?>]" value="<?= $libro['precio'] ?>" step="0.01"></td>
                        <td><?= $libro["fecha_adquisicion"] ?></td>
                    </tr>
                    <?php endforeach?>
            </tbody>
        </table>
        <button type="submit" name="btnEditar">Editar Precios</button>
    </form>
    <a href="./libros.php">Volver a formulario</a>
</body>
</html>