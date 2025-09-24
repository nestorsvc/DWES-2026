<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
</head>
<body>
    <?php 
    //* Sacamos el timestamp con strtotime del año de nacimiento, (segundos desde 1970 hasta la fecha)
    //* sacamos la fecha actual con time(), se podría hacer con strtotime(now) pero para usar time también
    //* calculamos los segundos que pasan en un año entero y lo dividimos entre la diferencia de $aniosASegundos y $aniosEnSegundos
    //* se puede hacer más sencillo con DateTime
    $fechaNacTimestamps = strtotime("2005-07-02");
    $fechaActTimestamps = time();
    $aniosEnSegundos = $fechaActTimestamps - $fechaNacTimestamps;
    $anioASegundos  = 60 * 60 * 24 * 365;
    $fecha = $aniosEnSegundos / $anioASegundos;
    echo floor($fecha)
    ?>
</body>
</html>