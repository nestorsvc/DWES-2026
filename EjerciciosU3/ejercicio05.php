<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 05</title>
</head>
<body>
    <?php
    echo "<h1>Con MATCH</h1>";
    $txt = '';
    $resultado = match ($posicion) {
        'fuera' => $txt =  'El valor de la variable posicion es "fuera"',
        'dentro' =>  $txt =  'El valor de la variable posicion es "dentro"',
        default => $txt = 'El valor de la variable no es ni fuera ni dentro',
    };
    echo "<h1>$txt</h1>";
     ?>
</body>
</html>