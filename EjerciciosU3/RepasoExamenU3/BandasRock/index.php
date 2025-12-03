<?php

declare(strict_types=1);
$bandasLegendarias = [
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



$nombreBandas = array_keys($bandasLegendarias);
$bandaSeleccionada = $_POST['bandas'] ?? "";
$tipo = $_POST['tipo'] ?? "";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banda Rock</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body class="container">
    <h1>Bandas legendarias - Componentes</h1>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <select name="bandas">
            <option selected value="mostrarTodas">Mostrar bandas</option>
            <?php foreach ($nombreBandas as $banda): ?>
                <option value="<?= htmlspecialchars($banda) ?>" <?= $banda === $bandaSeleccionada ? 'selected' : "" ?>> <?= htmlspecialchars($banda) ?></option>
            <?php endforeach ?>
        </select>
        <input type="radio" name="tipo" value="vocalista">Vocalista
        <input type="radio" name="tipo" value="musicos">Musicos
        <button type="submit" name="mostrar">Mostrar</button>
    </form>
    <?php if ($banda !== "" && $tipo !== ""): ?>
        <?php
        $bandasAMostrar = [];

        if ($bandaSeleccionada === "mostrarTodas") {
            $bandasAMostrar = $nombreBandas;
        } else {
            $bandasAMostrar = [$bandaSeleccionada];
        }
        var_dump($tipo)
        ?>


        <?php foreach ($bandasAMostrar as $nombreBanda): ?>
            <?php if ($tipo === "vocalista"): ?>
                <section style='background-color: #f0f0f0; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;'>
                    <h2><?= $nombreBanda ?></h2>
                    <p><b><?= $bandasLegendarias[$nombreBanda]["vocalista"]["nombre"] ?><b></p>
                    <img src="<?= $bandasLegendarias[$nombreBanda]["vocalista"]["imagen"] ?>">
                </section>

            <?php elseif ($tipo === "musicos"): ?>

                <h2<?= $nombreBanda ?>>
                    </h2>
                    <?php foreach ($bandasLegendarias[$nombreBanda]["musicos"] as $musico): ?>
                        <section style='background-color: #f0f0f0; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;'>
                            <p><b><?= $musico["nombre"]?><b></p>
                            <p><i>(<?= $musico["instrumento"]?>)<i></p>
                            <img src="<?= $musico["imagen"] ?>">
                        </section>
                    <?php endforeach ?>

                <?php endif ?>

            <?php endforeach ?>
        <?php endif ?>
</body>

</html>