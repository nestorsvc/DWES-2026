<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 04</title>
</head>
<body>
    <?php 
    require_once 'Empleado.php';
    require_once 'Encargado.php';

    $empleado = new Empleado('Paco',34,1500);
    $encargado = new Encargado('Juan',56,1500,'Informatica');

    echo $empleado;
    echo "<br>";
    echo $encargado;

    ?>
</body>
</html>