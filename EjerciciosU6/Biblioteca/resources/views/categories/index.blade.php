<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categorías</title>
</head>
<body>
    <h1>Categorías</h1>

    <a href="{{ route('categories.create') }}">Crear categoría</a>


    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>

    {{ $categories->links() }}
</body>
</html>
