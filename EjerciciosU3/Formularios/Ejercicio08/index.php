<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de monedas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body class="container">
    <h1>Conversor de monedas</h1>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" value="<?php htmlspecialchars($cantidad)?>">
        <label for="origen">Origen</label>
        <select name="origen">
            <option value="EUR">Euros</option>
            <option value="USD">Dolares</option>
            <option value="RUB">Rublos</option>
        </select>
        <label for="destino">Destino</label>
        <select name="destino">
            <option value="EUR">Euros</option>
            <option value="USD">Dolares</option>
            <option value="RUB">Rublos</option>
        </select>
        <button type="submit" id="btnEnviar">Convetir</button>
    </form>
    <?php

    $monedaDescripcion = [
        "EUR" => "Euro - Moneda oficial en Europa",
        "USD" => "Dolar - Moneda de los EEUU",  
        "RUB" => "Rublo - Moneda oficial de Rusia"
    ];

    $monedaTipoCambio = [
        "EUR" => 1.00, 
        "USD" => 1.09, // 1 EUR = 0.86 $ 
        "RUB" => 88.0 // 1 EUR = 90.91 RUB
    ];

    $resultados = [];
    $errores = [];

    if (isset($_POST["cantidad"], $_POST["origen"], $_POST['destino'])) {
        $cantidad = htmlspecialchars($_POST['cantidad']);
        $origen = htmlspecialchars($_POST['origen']);
        $destino = htmlspecialchars($_POST['destino']);

        if ($cantidad < 0) {
            $error = "La cantidad debe ser un numero entero mayor que cero";
            array_push($errores, $error);
        }

        if (count($errores) > 0) {
            foreach ($errores as $erorr) {
                echo "<p style='color: red;'>Error</p>";
            }
        } else {
            $conversion = ($cantidad / $monedaTipoCambio[$origen]) * $monedaTipoCambio[$destino];
            array_push($resultados, "Cantidad: $cantidad", "Origen: $monedaDescripcion[$origen]", "Destino: $monedaDescripcion[$destino]", "Resultado: " . number_format($conversion, 2));
            foreach ($resultados as $resultado) {
                echo "<pre>$resultado</pre>";
            }
            echo "<h3>" . number_format($cantidad, 2) . " $origen son " . number_format($conversion, 2) . " $destino</h3>";
        }
    }


    ?>

</body>

</html>