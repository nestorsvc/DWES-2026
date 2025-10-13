<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monedero</title>
</head>
<body>
    <?php 
    require_once 'Monedero.php';
    $monedero = new Monedero(10);
    $monedero->meterDinero(10);
    $monedero->sacarDinero(30);
    echo $monedero;
    ?>
</body>
</html>