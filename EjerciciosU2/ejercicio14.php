<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14</title>
</head>

<body>
    <?php
    //* date (d-m-y, timestamp) suele ser el uso más común, se pone un strtotime y este se pasa a una fecha legible con date y el formato
    //? Ejemplo: 
    $proxSabado = strtotime('next Saturday');
    echo date('d-m-y', $proxSabado);
    //*Me da los segundos exactos desde 1970 hasta esta fecha, con esto podemos comparar fechas facilmente
    echo strtotime("2025-11-24");
    
    $mañana = strtotime('tomorrow');
    $proxLunes = strtotime('next Monday');
    echo "<h1>¿Qué está más cerca, mañana o el próximo lunes?</h1><br><h2>Respuesta: " . ($mañana < $proxLunes ? 'Para mañana queda menos que para el proximo lunes' : 'Para el proximo lunes queda menos que para mañana</h2>');
    ?>
</body>

</html>