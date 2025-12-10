<?php
$coches = [
    "Toyota" => ["Corolla", "Yaris", "RAV4"],
    "Ford"   => ["Fiesta", "Focus", "Mustang"],
    "BMW"    => ["Serie 1", "Serie 3", "X5"]
];

$modelosEnviados = $_POST['modelos'] ?? null;
$mensajes = [];
$modelosParaMostrar = [];
$marcaSeleccionada = $_POST['marcas'] ?? "";
if ($marcaSeleccionada !== "") {
    if (!empty($modelosEnviados)) {
        foreach ($coches[$marcaSeleccionada] as $i => $modelo) {
            $nuevoValor = $modelosEnviados[$i] ?? $modelo;
            $modelosParaMostrar[$i] = $nuevoValor;
        }
        if ($nuevoValor === $modelo) {
            $mensajes[] = "El modelo '$modelo' se actualizó como '$nuevoValor'.";
        } else {
            $mensajes[] = "El modelo '$modelo' no se actualizó.";
        }
    } else {
        $modelosParaMostrar = $coches[$marcaSeleccionada];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Marcas</title>
</head>

<body class="container">
    <h1>Selecciona una marca</h1>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <select name="marcas">
            <?php foreach ($coches as $marca => $indice): ?>
                <option value="<?= htmlspecialchars($marca) ?>" <?= $marca === $marcaSeleccionada ? 'selected' : '' ?>> <?= htmlspecialchars($marca) ?></option>
            <?php endforeach ?>
        </select>
        <button type="submit">Enviar</button>
    </form>
    <?php if ($marcaSeleccionada !== "") : ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Modelo editable</th>
                </tr>
            </thead>
            <tbody>
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

                    <?php foreach ($modelosParaMostrar as $i => $modelo): ?>
                        <tr>
                            <td> <?= $i + 1 ?></td>
                            <td><input name="modelos[]" value="<?= htmlspecialchars($modelo) ?>"></td>
                        </tr>
                    <?php endforeach ?>
                    <button type="submit">Actualizar</button>
                </form>

            <tbody>
        </table>
    <?php endif ?>
</body>

</html>