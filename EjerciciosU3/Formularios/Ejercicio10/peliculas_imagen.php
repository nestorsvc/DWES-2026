<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<?php
$busqueda = $_POST['busqueda'] ?? '';
?>

<body class="container">
    <h1>Buscador de peliculas por titulo</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label for="busqueda">Introduce el titulo de la pelicula</label>
        <input type="text" name="busqueda" value="<?= htmlspecialchars($busqueda) ?>" placeholder="Ejemplo: La lengua de las mariposas">
        <button type="submit" id="btnBuscar">Buscar</button>
    </form>
    <p>Introduce un titulo (o parte de él) para buscar</p>

    <?php
    $peliculas = [
        "El espíritu de la colmena" => [
            "año" => 1973, 
            "sinopsis" => "Una niña en la posguerra española queda fascinada por la película 'Frankenstein' y vive entre realidad y fantasía." 
        ],
        "Volver" => [
            "año" => 2006, 
            "sinopsis" => "Drama de Pedro Almodóvar sobre la familia, los secretos y la supervivencia de varias mujeres en La Mancha." 
        ],
        "Tristana" => [
            "año" => 1970,
            "sinopsis" => "Relación compleja entre una joven huérfana y su tutor; retrato de poder y dependencia."
        ],
        "La vaquilla" => [
            "año" => 1985,
            "sinopsis" => "Comedia satírica sobre la Guerra Civil española: un grupo intenta robar una vaca utilizada en una fiesta franquista."
        ],
        "Los otros" => [
            "año" => 2001,
            "sinopsis" => "Thriller gótico sobre una mujer y sus hijos fotosensibles que viven en una mansión aislada con secretos inquietantes."
        ],
        "El laberinto del fauno" => [
            "año" => 2006,
            "sinopsis" => "Fábula oscura ambientada en la posguerra: una niña encuentra un mundo fantástico mientras su madre sufre con la brutalidad del régimen."
        ],
        "Mar adentro" => [
            "año" => 2004,
            "sinopsis" => "Historia real de Ramón Sampedro, un hombre tetrapléjico que luchó por su derecho a morir dignamente."
        ],
        "Ocho apellidos vascos" => [
            "año" => 2014,
            "sinopsis" => "Comedia romántica sobre los choques culturales entre un sevillano y una joven vasca."
        ],
        "La lengua de las mariposas" => [
            "año" => 1999,
            "sinopsis" => "Relato tierno y amargo sobre la amistad entre un niño y su maestro en la víspera de la Guerra Civil."
        ],
        "Tesis" => [
            "año" => 1996,
            "sinopsis" => "Suspense universitario sobre una estudiante que investiga la morbosa fascinación por las imágenes violentas."
        ],
        "Celda 211" => [
            "año" => 2009,
            "sinopsis" => "Un guardia de prisiones se ve atrapado en un motín y debe hacerse pasar por reo para sobrevivir."
        ],
        "La piel que habito" => [
            "año" => 2011,
            "sinopsis" => "Thriller psicológico de Pedro Almodóvar sobre venganza y ética científica."
        ],
    ];

    $imagenes = [
        "El espíritu de la colmena" => "el_espiritu_de_la_colmena.jpg",
        "Los otros" => "los_otros_the_others.jpg",
        "Volver" => "volver.jpg",
        "Tristana" => "tristana.jpg",
        "La vaquilla" => "la_vaquilla.jpg",
        "El laberinto del fauno" => "el_laberinto_del_fauno.jpg",
        "Mar adentro" => "mar_adentro.jpg",
        "Ocho apellidos vascos" => "ocho_apellidos_vascos.jpg",
        "La lengua de las mariposas" => "la_lengua_de_las_mariposas.jpg",
        "Tesis" => "tesis.jpg",
        "Celda 211" => "celda_211.jpg",
        "La piel que habito" => "la_piel_que_habito.jpg"
    ];


    // Solamente entra aqui si el formulario ya ha sido enviado
    if ($busqueda !== '') {
        // Saco unicamente los titulos de las peliculas
        $titulosPeliculas = array_keys($peliculas);

        // Saco una array con los titulos que contienen la busqueda que he introducido
        $titulosEncontrados = array_filter($titulosPeliculas, function ($titulo) use ($busqueda) {
            if (str_contains(strtolower($titulo), strtolower($busqueda))) {
                return $titulo;
            }
        });

        // function imagenAsociadaPelicula($titulo)
        // {
        //     $titulo = trim($titulo);
        //     $titulo = str_replace(" ", "_", $titulo);
        //     $titulo = strtolower($titulo);
        //     return $titulo;
        // }

        // Recorro ese mismo array y voy formateando la salida de cada pelicula, para sacar su imagen, como la clave del array $imagenes es el nombre de cada pelicula,
        // con simplemente hacer $imagenes[$titulo] ya accedo al titulo de la pelicula.
        foreach ($titulosEncontrados as $titulo) {
            echo "<section style='background-color: #f0f0f0; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;'>
        <p><b><i>$titulo</i></b> (" . $peliculas[$titulo]["año"] . ")</p>
        <p>" . $peliculas[$titulo]["sinopsis"] . "</p>" .
                "<img src='img/".$imagenes[$titulo]."'>
      </section>";
        }

        // Muestro el numero de coincidencias de la búsqueda
        echo count($titulosEncontrados) . " resultados para la búsqueda '$busqueda'.";
    }
    ?>
    <a href="peliculas_imagen.php">Limpiar</a>
</body>

</html>