<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01</title>
</head>

<body>
    <?php
    $num = 2;
    $resultado = '';
    $tabla = 0;
    echo "<h1>Tabla de multiplicar con for</h1>";
    for ($i = 0; $i <= 10; $i++) {
        $tabla = $num * $i;
        $resultado = "$num x $i = $tabla<br>";
        echo $resultado;
    }
    echo "<h1>Tabla de multiplicar con while</h1>";
    $variable = 0;
    while ($variable <= 10) {
        $tabla = $num * $variable;
        $resultado = "$num x $variable = $tabla<br>";
        $variable++;
        echo $resultado;
    }
    echo "<h1>Tabla de multiplicar con while</h1>";
    $variable = 0;
    do {
        $tabla = $num * $variable;
        $resultado = "$num x $variable = $tabla<br>";
        echo $resultado;
        $variable++;
    } while ($variable <= 10);
    ?>
</body>

</html>