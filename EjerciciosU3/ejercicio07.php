<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 08</title>
</head>

<body>
    <?php
    $productos = [
        "Manzana" => 5,
        "Plátano" => 3,
        "Naranja" => 4,
        "Kiwi" => 6
    ];

    $txt = '';
    for ($i = 0; $i < count($productos); $i++){
        $txt = "<h1>Lista de la compra<br>".$productos[$i]."</h1>";
    }
    echo $txt;
    ?>
</body>

</html>