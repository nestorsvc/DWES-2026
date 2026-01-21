<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar autor</title>
</head>
<body>
     <div>
        <h1>Editar autor</h1>

        <form method="post" action="{{ route('authors.update', $author) }}">
            @csrf
            @method("PUT")
            <div>
                <label for="nombre">Nombre</label>
                <input name="name" value="{{ old('name', $author->name) }}">
            </div>

            <div>
                <label for="pais">País</label>
                <input name="country" value="{{ old('country', $author->country) }}">
            </div>

            <div>
                <label for="nacimiento">Fecha de nacimiento</label>
                <input name="birth_date" type="date" value="{{ old('birth_date', $author->birth_date) }}">
            </div>

            <div>
                <button type="submit">Guardar</button>
                <a href="{{ route('authors.index') }}">Cancelar</a>
            </div>


        </form>

    </div>
</body>
</html>
