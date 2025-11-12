<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Document</title>
</head>

<body class="container">
    <h1>Resultado</h1>
    <?php
    if (isset($_POST['num']) && !empty($_POST['num'])) {
        $num = htmlspecialchars($_POST['num']);
        echo $num % 2 === 0  ? $mensaje = "<p>El numero <b style='color: blue;'> $num </b><b style='color: green;'> es </b> par</p>" : $mensaje = "<p>El numero <b style='color: blue;'> $num </b><b style='color: red;'> no </b> es par</p>";
    } else {
        echo $mensaje = "<p style= 'color:red;'>Debe introducir un numero</p>";
    }
    ?>
    <a href="index.html">Volver</a>
</body>

</html>