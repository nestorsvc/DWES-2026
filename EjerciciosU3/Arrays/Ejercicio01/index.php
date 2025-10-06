<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01</title>
</head>

<body>
    <?php
    $alumnos = [
        ["Comunidad" => "Andalucía", "Número de Alumnos" => 593.6],
        ["Comunidad" => "Aragón", "Número de Alumnos" => 600.3],
        ["Comunidad" => "Asturias", "Número de Alumnos" => 582.9],
        ["Comunidad" => "Baleares", "Número de Alumnos" => 489.7],
        ["Comunidad" => "Canarias", "Número de Alumnos" => 573.2],
        ["Comunidad" => "Cantabria", "Número de Alumnos" => 551.5],
        ["Comunidad" => "Castilla y León", "Número de Alumnos" => 645.3],
        ["Comunidad" => "Castilla la Mancha", "Número de Alumnos" => 555.8],
        ["Comunidad" => "Cataluña", "Número de Alumnos" => 568.3],
        ["Comunidad" => "Comunidad Valenciana", "Número de Alumnos" => 561.1],
        ["Comunidad" => "Extremadura", "Número de Alumnos" => 584.3],
        ["Comunidad" => "Galicia", "Número de Alumnos" => 600.1],
        ["Comunidad" => "Madrid", "Número de Alumnos" => 613.3],
        ["Comunidad" => "Murcia", "Número de Alumnos" => 564.7],
        ["Comunidad" => "Navarra", "Número de Alumnos" => 638.1],
        ["Comunidad" => "País Vasco", "Número de Alumnos" => 637.5],
        ["Comunidad" => "La Rioja", "Número de Alumnos" => 562.4],
        ["Comunidad" => "Ceuta", "Número de Alumnos" => 539.7],
        ["Comunidad" => "Melilla", "Número de Alumnos" => 569.8],
    ];
    $tabla = "<table border = 1 cellpadding = 5>
    <thead>
    <tr>
    <th>Comunidad</th>
    <th>Número de Alumnos</th>
    <th>Escolarización</th>
    </tr>
    </thead>
    <tbody>
    ";

    foreach ($alumnos as $alumno => $datos) {
        $tabla .= "<tr>
        <td>" . $datos['Comunidad'] . "</td>
        <td>" . $datos['Número de Alumnos'] . "</td>
        <td>" . ($datos['Número de Alumnos'] / 1000) * 100 . "</td>
        </tr>";
    }
    $tabla .= "</tbody>
            </table>";
    echo $tabla;
    ?>
</body>

</html>