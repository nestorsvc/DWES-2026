<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Coches</title>
</head>

<body class="container">

   <?php
// Array original de coches (no se modifica)
$cochesOriginales = [
    "Toyota" => ["Corolla", "Yaris", "RAV4"],
    "Ford"   => ["Fiesta", "Focus", "Mustang"],
    "BMW"    => ["Serie 1", "Serie 3", "X5"]
];

$nombresMarcas = array_keys($cochesOriginales);

// Capturamos la marca y los modelos enviados
$marca = $_POST['marca'] ?? '';
$modelosEnviados = $_POST['modelos'] ?? null;

// Array para mensajes de cambios
$mensajes = [];

// Para rellenar los inputs: usamos los valores enviados si existen, si no los originales
$modelosParaMostrar = [];
if ($marca !== "") {
    if (!empty($modelosEnviados)) {
        foreach ($cochesOriginales[$marca] as $i => $modeloOriginal) {
            $nuevoValor = $modelosEnviados[$i] ?? $modeloOriginal;
            $modelosParaMostrar[$i] = $nuevoValor;

            if ($nuevoValor !== $modeloOriginal) {
                $mensajes[] = "El modelo '$modeloOriginal' se actualizó como '$nuevoValor'.";
            } else {
                $mensajes[] = "El modelo '$modeloOriginal' no se actualizó.";
            }
        }
    } else {
        $modelosParaMostrar = $cochesOriginales[$marca];
    }
}

?>

<h1><a href="index.php">Marcas y modelos</a></h1>

<!-- Formulario de selección de marca -->
<form action="" method="post">
    <select name="marca">
        <option disabled <?= $marca === "" ? "selected" : "" ?>>Escoge una marca</option>
        <?php foreach ($nombresMarcas as $nombre): ?>
            <option value="<?= $nombre ?>" <?= $marca === $nombre ? "selected" : "" ?>><?= $nombre ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Mostrar</button>
</form>

<?php if ($marca !== ""): ?>
    <!-- Formulario para actualizar modelos -->
    <form action="" method="post">
        <input type="hidden" name="marca" value="<?= $marca ?>">

        <div class="tabla">
            <div class="fila encabezado">
                <div class="celda">#</div>
                <div class="celda">Modelo</div>
            </div>
            <?php foreach ($modelosParaMostrar as $i => $modelo): ?>
                <div class="fila">
                    <div class="celda"><?= $i + 1 ?></div>
                    <div class="celda">
                        <input type="text" name="modelos[]" value="<?= htmlspecialchars($modelo) ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit">Actualizar</button>
    </form>

    <!-- Mensajes de cambios -->
    <?php if (!empty($mensajes)): ?>
        <h4>Resultados:</h4>
        <ul>
            <?php foreach ($mensajes as $msg): ?>
                <li><?= $msg ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php endif; ?>
