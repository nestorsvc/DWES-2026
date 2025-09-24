<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>
<body>
    <?php 
    $hora = getdate();
    $zona = date_default_timezone_set("Europe/Madrid");
    echo"<h1>Estamos a  ". $hora['year'] ."/". $hora['mon'] ."/". $hora['wday'] ."/". "a las ". $hora['hours'] .":". $hora['minutes'] .":". $hora['seconds'] ."</h1>";
    ?> 
</body>
</html>