<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    @vite(['resources/js/app.js'])
    <title>@yield('title', 'Biblioteca')</title>
</head>

<body>
    <nav>
        <a href="{{ route('books.index') }}">Libros</a> |
        <a href="{{ route('authors.index') }}">Autores</a> |
        <a href="{{ route('categories.index') }}">Categorías</a>
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>
