<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 04</title>
</head>

<body>
    <?php
    $posicion = '';
    echo "<h1>Con SWITCH</h1>";
    switch ($posicion) {
        case ($posicion == 'fuera'):
            echo ('<h1>El valor de la variable posicion es "fuera"<br></h1>');
            break;
        case ($posicion == 'dentro'):
            echo ('<h1>El valor de la variable posicion es "dentro"<br></h1>');
            break;
        default:
            echo ('<h1>El valor de la variable no es ni fuera ni dentro<br></h1>');
            break;
    }
    
    ?>
</body>

</html>