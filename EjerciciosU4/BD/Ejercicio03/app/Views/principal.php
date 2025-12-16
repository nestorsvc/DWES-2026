<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funicular Bulnes</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"> -->
    <link rel="stylesheet" href="styles/principal.css">
</head>

<body>
    <div class="container">
        <h3 id="marco">FB</h3>
        <div class="titulo">
            <h3>Funicular Bulnes</h3>
            <p>Reservas, llegada y gestión de plazas</p>
        </div>
        <div class="columnas">
            <section>
                <p>Reservar Plaza</p>
                <p>Reservar una plaza libre con DNI y nombre.</p>
                <a href="index.php?page=reservar">
                    <button type="submit" name="btnReservar">Reservar</button>
                </a>
            </section>
            <section>
                <p>LLegada Destino</p>
                <p>Borrar pasajeros y liberar todas las plazas (transacción).</p>
                <a href="index.php?page=llegada">
                    <button type="submit" name="btnLlegada">LLegada</button>
                </a>
            </section>
            <section>
                <p>Gestión de plazas</p>
                <p>Ver y actualizar precios de las plazas.</p>
                <a href="index.php?page=gestion">
                    <button type="submit" name="btnGestionar">Gestionar</button>
                </a>
            </section>
        </div>
        <p id="copy">&copy; 2025 Funicular Bulnes</p>
    </div>
</body>

</html>