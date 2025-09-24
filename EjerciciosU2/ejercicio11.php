<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejecicio 11</title>
</head>
<body>
    <?php 
     echo "<h1>Comprobando todos los tipos de variables con is_int, is_string, etc</h1>";
    $boleano = true;
    $entero;
    $flotante = 1.1;
    $cadena = 'hola';
    echo "<h2>Variable 1: " . (isset($entero) ?  'Ha sido definida' : 'No ha sido definida'). "<br>" . "Variable 2: " . (isset($boleano) ? 'Ha sido definida' : 'No ha sido definida') . "<br>" . "Variable 3: " . (isset($flotante) ? 'Ha sido definida' : 'No ha sido definida') ."<br>" . "Variable 4: " . (isset($cadena) ? 'Ha sido definida' : 'No ha sido definida' ."</h2>");
    ?>
</body>
</html>