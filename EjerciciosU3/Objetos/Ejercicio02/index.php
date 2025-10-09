<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
</head>
<body>
    <?php 
    require_once 'Coche.php';
    $coche = new Coche("1245 ABX", 90);
    echo $coche;
    $coche->acelera(20);
    echo $coche;
    $coche->acelera(10);
    echo $coche;
    $coche->frena(90);
    echo $coche;
    $coche->frena(40);
    echo $coche;
    
    ?>
</body>
</html>