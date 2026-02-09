@extends('layouts.app')
@section('title', 'Peliculas')

@section('content')
<a href="{{ route('peliculas.create') }}">Crear</a>
    <table border="1">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Director</th>
                <th>Duracion</th>
                <th>Clasifiacion</th>
                <th>Sinopsis</th>
                <th>Fecha Estreno</th>
                <th>Sala</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peliculas as $pelicula)
                <tr>
                    <td>{{ $pelicula->titulo }}</td>
                    <td>{{ $pelicula->director }}</td>
                    <td>{{ $pelicula->duracion }}</td>
                    <td>{{ $pelicula->clasificacion }}</td>
                    <td>{{ $pelicula->sinopsis }}</td>
                    <td>{{ $pelicula->fecha_estreno }}</td>
                    <td>{{ $pelicula->sala_id }}</td>
                    <td>
                        <a href="{{ route('peliculas.edit', $pelicula) }}">Editar</a>
                        <a href="{{ route('peliculas.show', $pelicula->id) }}">Ver</a>
                        <form action="{{ route('peliculas.destroy', $pelicula) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Desea eliminar la pelicula?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <th></th>
            </tr>
        </tbody>
    </table>

@endsection
