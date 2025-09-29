<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 03</title>
</head>

<body>
    <?php
    $numRand = rand(1, 5);
    echo "<h1>Con IF<br></h1>";
    if ($numRand == 1) {
        echo "<h1>'uno'</h1>";
    } else if ($numRand == 2) {
        echo "<h1>'dos'</h1>";
    } else if ($numRand == 3) {
        echo "<h1>'tres'</h1>";
    } else if ($numRand == 4) {
        echo "<h1>'cuatro'</h1>";
    } else if ($numRand == 5) {
        echo "<h1>'cinco'</h1>";
    }
    echo "<h1>Con SWITCH<br></h1>";
    switch ($numRand) {
        case 1:
            echo "<h1>'uno'</h1>";
            break;
        case 2:
            echo "<h1>'dos'</h1>";
            break;
        case 3:
            echo "<h1>'tres'</h1>";
            break;
        case 4:
            echo "<h1>'cuatro'</h1>";
            break;
        case 5:
            echo "<h1>'cinco'</h1>";
            break;

    }
    echo "<h1>Con MATCH<br></h1>";
    $resultado = match($numRand){
        1 => 'uno',
        2 => 'dos',
        3 => 'tres',
        4 => 'cuatro',
        5 => 'cinco'
    };
    echo "<h1>'$resultado'</h1>"; 
    ?>
</body>

</html>