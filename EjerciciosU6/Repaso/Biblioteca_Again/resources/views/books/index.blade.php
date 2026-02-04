<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de libros</title>
</head>

<body>
    <a href="{{ route('books.create') }}">Crear</a>
    <table border="1">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>ISBN</th>
                <th>AuthorId</th>
                <th>Publicado</th>
                <th>Paginas</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->author_id }}</td>
                    <td>{{ $book->published_at }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->price }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}">Editar</a>
                        <a href="{{ route('books.show', $book) }}">Show</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </thead>
        @if (session('message'))
            <p>{{ session('message') }}</p>
        @endif
    </table>
</body>

</html>
