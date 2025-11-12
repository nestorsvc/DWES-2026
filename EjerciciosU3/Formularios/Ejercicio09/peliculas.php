<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body class="container">
    <h1>Buscador de peliculas por titulo</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label for="titulo">Introduce el titulo de la pelicula</label>
        <input type="text" name="titulo" placeholder="Ejemplo: El Padrino">
        <button type="submit" id="btnBuscar" >Buscar</button>
    </form>
    <p>Introduce un titulo (o parte de él) para buscar</p>


    <?php
    $peliculas = [
        "El Padrino" => [
            "anio" => 1972,
            "sinopsis" => "La historia de la familia Corleone y su lucha por mantener el poder en el mundo del crimen."
        ],
        "Forrest Gump" => [
            "anio" => 1994,
            "sinopsis" => "Un hombre con un coeficiente intelectual bajo presencia y participa en algunos de los eventos más importantes de la historia de EE. UU."
        ],
        "Inception" => [
            "anio" => 2010,
            "sinopsis" => "Un ladrón especializado en robar secretos del subconsciente recibe el desafío de implantar una idea en la mente de alguien."
        ],
        "Titanic" => [
            "anio" => 1997,
            "sinopsis" => "Una historia de amor entre Jack y Rose a bordo del fatídico barco Titanic."
        ],
        "El Señor de los Anillos: La Comunidad del Anillo" => [
            "anio" => 2001,
            "sinopsis" => "Un joven hobbit emprende un peligroso viaje para destruir un anillo que podría destruir la Tierra Media."
        ],
        "Matrix" => [
            "anio" => 1999,
            "sinopsis" => "Un programador descubre que la realidad es una simulación controlada por máquinas y se une a la resistencia."
        ],
        "Gladiador" => [
            "anio" => 2000,
            "sinopsis" => "Un general romano es traicionado y esclavizado, buscando venganza y justicia en la arena del Coliseo."
        ],
        "Jurassic Park" => [
            "anio" => 1993,
            "sinopsis" => "Un parque temático con dinosaurios clonados se convierte en un peligro mortal cuando los animales escapan."
        ],
        "La La Land" => [
            "anio" => 2016,
            "sinopsis" => "Una historia de amor entre una actriz y un músico en busca de sus sueños en Los Ángeles."
        ],
        "Harry Potter y la Piedra Filosofal" => [
            "anio" => 2001,
            "sinopsis" => "Un niño descubre que es un mago y asiste a la escuela Hogwarts, donde comienzan sus aventuras."
        ]
    ];
    ?>
</body>

</html>