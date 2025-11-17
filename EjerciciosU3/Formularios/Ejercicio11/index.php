<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Sumar inputs</title>
</head>

<body class="container">
<?php 
$numeros = $_POST['numeros'] ?? null;
if($numeros !== null){
    $suma = 0;
    for ($i = 0; $i < count($numeros); $i++){
        $suma += $numeros[$i];
    }
} 
?>

    <h1>Sumar 10 numeros</h1>
    <p><i>Introduce 10 numeros (por defecto 1..10):</b></p>
    <form method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">

        <?php for ($i = 1; $i <= 10; $i++):?>
            <input type="number" name="numeros[]" value="<?= $numeros[$i] ?? $i ?>">
            <?php endfor?>
            <button type="submit">Sumar</button>
</form>
<h3>Resultado: <?= $suma ?? 'Introduce los numeros' ?></h3>
<a href="index.php">Limpiar</a>
</body>
</html>

