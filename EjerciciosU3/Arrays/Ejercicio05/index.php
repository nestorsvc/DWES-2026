<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 05</title>
</head>
<body>
    <?php
    $impares = range(0,20,1);
    $pares = range(0,20,2);
    
    shuffle($impares);
    shuffle($pares);
    foreach($pares as $par){
        echo " $par";
    }
    echo "<br>";
    foreach($impares as $impar){
        echo " $impar";
    }

    sort($pares);
    sort($impares);

    foreach($pares as $par){
        echo " $par";
    }
    echo "<br>";
    foreach($impares as $impar){
        echo " $impar";
    }
    echo "<br>";

    $resultado = array_merge($pares,$impares);
    print_r($resultado);
    echo "<br>";

    echo implode(",",$resultado);

    ?>
</body>
</html>