<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Crear autor</title>
</head>

<body>
    <div>
        <h1>Nuevo autor</h1>

        <form method="post" action="{{ route('authors.store') }}">
            @csrf
            <div>
                <label for="nombre">Nombre</label>
                <input name="name" value="{{ old('name') }}">
            </div>

            <div>
                <label for="pais">País</label>
                <input name="country" value="{{ old('country') }}">
            </div>

            <div>
                <label for="nacimiento">Fecha de nacimiento</label>
                <input name="birth_date" type="date" value="{{ old('birth_date') }}">
            </div>

            <div>
                <button type="submit">Guardar</button>
                <a href="{{ route('authors.index') }}">Cancelar</a>
            </div>


        </form>

    </div>
</body>

</html>
