<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Cine')</title>
</head>

<body>
    <nav>
        <a href="{{ route('peliculas.index') }}">Peliculas</a>
        <a href="{{ route('salas.index') }}">Salas</a>
    </nav>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
    <main>
        @yield('content')
    </main>
</body>

</html>
