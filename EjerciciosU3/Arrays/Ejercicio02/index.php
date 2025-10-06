<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
</head>

<body>
    <?php
    $resultado = [];
    $tabla = "<table border=1 >
    <thead>
    <tr>
    <th>Pais</th>
    <th>Mondeda</th>
    <th>Cambio</th>
    </tr>
    </thead>
    <tbody>
    ";

    $datos = [
        ["EEUU", "Dollar", 1.1741],
        ["UK", "Libra esterlina", 0.8734],
        ["Japón", "Yenes", 173.76],
        ["China", "Yuanes", 8.3591],
        ["Argentina", "Pesos Argentinos", 1621.36],
        ["Australia", "Dollar AUS", 1.776]
    ];

    foreach ($datos as $indice => $fila) {
        $tabla .= "<tr>
        <td>$fila[0]</td>
        <td>$fila[1]</td>
        <td>$fila[2]</td>
        </tr>
        ";
    }
    $tabla .= "
            </tbody> 
            </table>";
    echo $tabla;

    $total = 0;    
    $media = 0;
    foreach ($datos as $indice => $fila){
        $resultado[] = $fila[2];
        $total+= $fila[2];
    }
    $maximo = max($resultado);
    $minimo = min($resultado);
    $media =  $total / count($resultado) ;
    echo "La media es: $media<br>";
    echo "El valor maximo es: $maximo<br>";
    echo "El valor minimo es: $minimo";
    ?>
</body>

</html>