<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
</head>
<body>
    <h1>Libros</h1>

    <a href="{{ route('books.create') }}">Crear libro</a>

    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Publicado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->published_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $books->links() }}
</body>
</html>
