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
    // Array de coches: cada marca tiene un array de modelos
    $coches = [
        "Toyota" => ["Corolla", "Yaris", "RAV4"],
        "Ford"   => ["Fiesta", "Focus", "Mustang"],
        "BMW"    => ["Serie 1", "Serie 3", "X5"]
    ];

    // Obtener solo los nombres de las marcas para llenar el select
    $nombresMarcas = array_keys($coches);
    ?>

    <a href="index.php">
        <h1>Marcas y modelos</h1>
    </a>

    <?php 
    // Capturamos la marca enviada por el primer formulario
    $marca = $_POST["marca"] ?? ""; 
    ?>

    <!-- Primer formulario: elegir marca -->
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <select name="marca">
            <!-- Opción inicial deshabilitada -->
            <option disabled <?= $marca === "" ? "selected" : "" ?>>
                Escoge una marca
            </option>

            <?php foreach ($nombresMarcas as $nombre): ?>
                <!-- Cada opción del select -->
                <option value="<?= htmlspecialchars($nombre) ?>"
                    <?= ($marca === $nombre) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($nombre) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="button">Mostrar</button>
    </form>

    <?php 
    // Segundo formulario: solo se genera si ya se ha seleccionado una marca
    if ($marca !== "") : 
    ?>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <!-- Guardamos la marca en un input oculto para que siga disponible al actualizar -->
            <input type="hidden" name="marca" value="<?= htmlspecialchars($marca) ?>">

            <div class="tabla">
                <!-- Encabezado de la tabla -->
                <div class="fila encabezado">
                    <div class="celda">#</div>
                    <div class="celda">Contenido</div>
                </div>

                <?php $contador = 1 ?>
                <?php foreach ($coches[$marca] as $modelo): ?>
                    <div class="fila">
                        <!-- Número de fila -->
                        <div class="celda"><?= $contador ?></div>
                        <!-- Input de texto para cada modelo, nombre con array [] para que PHP lo reciba como array -->
                        <div class="celda"><input type="text" name="modelos[]" value="<?= $modelo ?>"></div>
                    </div>
                    <?php $contador++ ?>
                <?php endforeach ?>
            </div>

            <button type="submit" class="button">Actualizar</button>
        </form>

        <p><i>Nota: modifica los nombres y pulsa "Actualizar" para ver que nombres han cambiado</i></p>

        <?php
        // Capturamos los modelos enviados por el segundo formulario
        $modelos = $_POST["modelos"] ?? null;

        // Si hay modelos enviados, los mostramos (para debug / ver cambios)
        if (!empty($modelos)) {
            var_dump($modelos);
        }
        ?>
    <?php endif ?>

</body>
</html>
