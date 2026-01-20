<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autores</title>
</head>
<body>
    <h1>Autores</h1>

    <a href="{{ route('authors.create') }}">Crear autor</a>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>País</th>
                <th>Fecha nacimiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->country }}</td>
                    <td>{{ $author->birth_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $authors->links() }}
</body>
</html>
