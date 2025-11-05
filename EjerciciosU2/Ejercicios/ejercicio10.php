<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
</head>

<body>
    <?php
    echo "<h1>Comprobando todos los tipos de variables con is_int, is_string, etc</h1>";
    $boleano = true;
    $entero = 1;
    $flotante = 1.1;
    $cadena = 'hola';
    echo "<h2>Variable 1: " . (is_int($entero) ?  'Es entero' : 'No es entero'). "<br>" . "Variable 2: " . (is_bool($boleano) ? 'Es booleano' : 'No es booleano') . "<br>" . "Variable 3: " . (is_float($flotante) ? 'Es flotante' : 'No es flotante') ."<br>" . "Variable 4: " . (is_string($cadena) ? 'Es una cadena' : 'No es una cadena' ."</h2>");
    ?>
</body>

</html>