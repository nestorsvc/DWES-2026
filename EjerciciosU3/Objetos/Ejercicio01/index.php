<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01</title>
</head>
<body>
    <?php
    require_once 'Circulo.php';
    $circulo = new Circulo(10);
    echo $circulo->getRadio();
    echo "<br>";
    echo $circulo->setRadio(20);
    echo "<br>";
    echo $circulo->getRadio();
    echo "<br>";
    echo $circulo->__set('radio',30);
    echo $circulo->__get('radio');
    ?>
</body>
</html>