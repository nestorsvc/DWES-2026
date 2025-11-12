<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body class="container">
    <?php
    if (isset($_POST['num']) && !empty($_POST['num'])) {
        $num = htmlspecialchars($_POST['num']);
        $num = intval($num); 
        $mensaje = "<h1>Tabla de multiplicar del $num</h1>";
        for ($i = 0; $i <= 10; $i++) {
            $mensaje .= "$num x $i = " . ($num * $i) . "<br>";
        }
    } else {
        $mensaje = "<p style='color : red;'>Por favor, introduce un numero</p>";
    }
    echo $mensaje;
    ?>
    <a href="index.html">Volver</a>
</body>

</html>