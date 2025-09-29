<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 08</title>
</head>

<body>
    <?php
    $numeros = [1, 9, 3, 8, 5, 7];
    $resultado = '';
    echo "<h1>Con for</h1>";
    for ($i = 0; $i < count($numeros); $i++) {
        echo $numeros[$i] * 2 . "<br>";
    }
    foreach ($numeros as $numero) {
        echo $numero * 2 . "<br>";
    }
    ?>
</body>

</html>