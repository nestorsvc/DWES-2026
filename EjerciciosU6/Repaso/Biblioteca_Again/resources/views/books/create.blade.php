<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear</title>
</head>
<body>
<h1>Crear libro</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <label for="title">Titulo</label>
        <input type="text" name="title">

        <label for="isbn">ISBN</label>
        <input type="text" name="isbn">

        <select name="author_id">
            <option disabled selected value="default">Selecciona el autor</option>
            @foreach ($authors as $author )
                <option value="{{$author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>

        <label for="published_at">Publicado</label>
        <input type="datetime" name="published_at">

        <label for="pages">Paginas</label>
        <input type="int" name="pages">

        <label for="price">Precio</label>
        <input type="number" name="price" step="0.01">

        <button>Crear</button>
    </form>

</body>
</html>
