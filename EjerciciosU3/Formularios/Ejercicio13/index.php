<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Bandas</title>
</head>

<body class="container">
    <?php
    $bandas = [
        "U2" => [
            "vocalista" => [
                "nombre" => "Bono",
                "imagen" => "imagenes/bono.jpg"
            ],
            "musicos" => [
                [
                    "nombre" => "The Edge",
                    "instrumento" => "guitarra",
                    "imagen" => "imagenes/the_edge.jpg"
                ],
                [
                    "nombre" => "Adam Clayton",
                    "instrumento" => "bajo",
                    "imagen" => "imagenes/adam_clayton.jpg"
                ],
                [
                    "nombre" => "Larry Mullen Jr.",
                    "instrumento" => "batería",
                    "imagen" => "imagenes/larry_mulen.jpg"
                ]
            ]
        ],
        "Led Zeppelin" => [
            "vocalista" => [
                "nombre" => "Robert Plant",
                "imagen" => "imagenes/robert_plan.jpg"
            ],
            "musicos" => [
                [
                    "nombre" => "Jimmy Page",
                    "instrumento" => "guitarra",
                    "imagen" => "imagenes/jimmy_page.jpg"
                ],
                [
                    "nombre" => "John Paul Jones",
                    "instrumento" => "bajo",
                    "imagen" => "imagenes/john_paul_jones.jpg"
                ],
                [
                    "nombre" => "John Bonham",
                    "instrumento" => "batería",
                    "imagen" => "imagenes/john_bonham.jpg"
                ]
            ]
        ],
        "Metallica" => [
            "vocalista" => [
                "nombre" => "James Hetfield",
                "imagen" => "imagenes/james_hetfield.jpg"
            ],
            "musicos" => [
                [
                    "nombre" => "Lars Ulrich",
                    "instrumento" => "batería",
                    "imagen" => "imagenes/lars_ulrich.jpg"
                ],
                [
                    "nombre" => "Kirk Hammett",
                    "instrumento" => "guitarra solista",
                    "imagen" => "imagenes/kirk_hammett.jpg"
                ],
                [
                    "nombre" => "Robert Trujillo",
                    "instrumento" => "bajo",
                    "imagen" => "imagenes/robert_trujillo.jpg"
                ]
            ]
        ],
        "AC/DC" => [
            "vocalista" => [
                "nombre" => "Brian Johnson",
                "imagen" => "imagenes/brian_johnson.jpg"
            ],
            "musicos" => [
                [
                    "nombre" => "Angus Young",
                    "instrumento" => "guitarra solista",
                    "imagen" => "imagenes/angus_young.jpg"
                ],
                [
                    "nombre" => "Stevie Young",
                    "instrumento" => "guitarra rítmica",
                    "imagen" => "imagenes/stevie_young.jpg"
                ],
                [
                    "nombre" => "Cliff Williams",
                    "instrumento" => "bajo",
                    "imagen" => "imagenes/cliff_williams.jpg"
                ],
                [
                    "nombre" => "Phil Rudd",
                    "instrumento" => "batería",
                    "imagen" => "imagenes/phil_rudd.jpg"
                ]
            ]
        ],
        "Queen" => [
            "vocalista" => [
                "nombre" => "Freddie Mercury",
                "imagen" => "imagenes/freddie_mercury.jpg"
            ],
            "musicos" => [
                [
                    "nombre" => "Brian May",
                    "instrumento" => "guitarra",
                    "imagen" => "imagenes/brian_may.jpg"
                ],
                [
                    "nombre" => "John Deacon",
                    "instrumento" => "bajo",
                    "imagen" => "imagenes/john_deacon.jpg"
                ],
                [
                    "nombre" => "Roger Taylor",
                    "instrumento" => "batería",
                    "imagen" => "imagenes/roger_taylor.jpg"
                ]
            ]
        ],
        "The Beatles" => [
            "vocalista" => [
                "nombre" => "John Lennon",
                "imagen" => "imagenes/john_lennon.jpg"
            ],
            "musicos" => [
                [
                    "nombre" => "Paul McCartney",
                    "instrumento" => "bajo",
                    "imagen" => "imagenes/paul_mccartney.jpg"
                ],
                [
                    "nombre" => "George Harrison",
                    "instrumento" => "guitarra",
                    "imagen" => "imagenes/george_harrison.jpg"
                ],
                [
                    "nombre" => "Ringo Starr",
                    "instrumento" => "batería",
                    "imagen" => "imagenes/ringo_starr.jpg"
                ]
            ]
        ]
    ];

    $nombresBandas = array_keys($bandas);
    $bandaSeleccionada = $_POST["bandaSeleccionada"] ?? "";
    $tipo = $_POST["tipo"] ?? "";
    ?>

    <a href="index.php">
        <h1>Bandas legendarias - Componentes</h1>
    </a>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="banda">Selecciona banda</label>
        <select name="bandaSeleccionada">
            <option value="mostrar-todas" <?= $bandaSeleccionada === "" ? 'selected' : '' ?>>Mostrar todas</option>
            <?php foreach ($nombresBandas as $nombre): ?>
                <option value="<?= htmlspecialchars($nombre) ?>" <?= $nombre === $bandaSeleccionada ? 'selected' : '' ?>> <?= htmlspecialchars($nombre) ?> </option>
            <?php endforeach ?>
        </select>
        <h1>Mostrar</h1>
        <label>
            <input type="radio" name="tipo" value="vocalistas" <?= $tipo == "vocalistas" ? 'checked' : "" ?>>
            Vocalistas
        </label>

        <label>
            <input type="radio" name="tipo" value="musicos" <?= $tipo == "musicos" ? 'checked' : "" ?>>
            Musicos
        </label>
        <button type="submit">Mostrar</button>
    </form>
   <?php if ($bandaSeleccionada !== ""): ?>

    <?php
    // Determinar qué bandas mostrar
    $bandasAMostrar = [];

    if ($bandaSeleccionada === "mostrar-todas") {
        $bandasAMostrar = $nombresBandas;   // todas las bandas
    } else {
        $bandasAMostrar = [$bandaSeleccionada];  // solo una
    }
    ?>

    <?php foreach ($bandasAMostrar as $nombreBanda): ?>

        <?php if ($tipo === "vocalistas"): ?>

            <!-- Mostrar vocalista -->
            <section style='background-color: #f0f0f0; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;'>
                <h2><?= $nombreBanda ?></h2>
                <p><b><?= $bandas[$nombreBanda]["vocalista"]["nombre"] ?></b></p>
                <img src="<?= $bandas[$nombreBanda]["vocalista"]["imagen"] ?>">
            </section>

        <?php elseif ($tipo === "musicos"): ?>

            <!-- Mostrar músicos -->
            <h2><?= $nombreBanda ?></h2>
            <?php foreach ($bandas[$nombreBanda]["musicos"] as $musico): ?>
                <section style='background-color: #f0f0f0; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;'>
                    <p><b><?= $musico["nombre"] ?></b></p>
                    <p><i>(<?= $musico["instrumento"] ?>)</i></p>
                    <img src="<?= $musico["imagen"] ?>">
                </section>
            <?php endforeach; ?>
        <?php endif; ?>

    <?php endforeach; ?>

<?php endif; ?>


</body>

</html>