<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
    <?php
    $num = 110;
    echo "<h1>Comprobando si el numero metido por variable es par o impar:</h1>";
    if($num % 2 != 0){
        echo "<h2><b>$num</b> no es IMPAR</h2>";
    } else {
        echo "<h2><b>$num</b> es PAR</h2>";
    }
    ?>
</body>
</html>