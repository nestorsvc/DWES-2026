<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body class="container">
    <?php
    if (isset($_POST['numeroMayor'], $_POST['numeroMenor'])) {
        $numeroMayor = htmlspecialchars($_POST['numeroMayor']);
        $numeroMenor = htmlspecialchars($_POST['numeroMenor']);
        $mensaje = "";
        echo $titulo = "<h1>Lista de pares de numeros entre $numeroMenor y $numeroMayor</h1>";
        for ($i = $numeroMenor, $j = $numeroMayor; $i <= $numeroMayor, $j >= $numeroMenor; $i++, $j--) {
            $mensaje .= "<p>(" . $i . "," . $j . ")</p>";
        }
    } else {
        $mensaje = "<p>Introduce un numero</p>";
    }
    echo $mensaje;
    ?>
    <a href="index.html">Volver</a>
</body>

</html>