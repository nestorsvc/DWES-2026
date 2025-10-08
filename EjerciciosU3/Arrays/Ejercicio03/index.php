<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 03</title>
</head>

<body>
    <?php
    $tabla = "<table border=1>
    <thead>
    <tr>
    <th>Origen</th>
    <th>Destino</th>
    <th>Distancia en metros</th>
    </tr>
    <tbody>
    ";
    $distancias = [
        ["Madrid",   "Segovia",  90201],
        ["Madrid",   "A Coruña", 596887],
        ["Barcelona", "Cádiz",    1152669],
        ["Bilbao",   "Valencia", 622233],
        ["Sevilla",  "Santander", 832067],
        ["Oviedo",   "Badajoz",  682429]
    ];
    $resultado = [];
    foreach ($distancias as $distancia=> $comunidades){
        $tabla.= "<tr>
        <td>$comunidades[0]</td>
        <td>$comunidades[1]</td>
        <td>$comunidades[2]</td>
        </tr>";
        $resultado[] = $comunidades[2];
    }
    $maximo = "El trayecto más largo es: " . max($resultado);

    $tabla .= "</tbody>
    </table>";
    echo $tabla;
    echo $maximo;
    ?>
</body>

</html>