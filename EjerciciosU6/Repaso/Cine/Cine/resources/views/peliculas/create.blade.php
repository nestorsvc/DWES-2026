@extends('layouts.app');
@section('title', content: 'Crear Pelicula')

@section('content')
    <form action="{{ route('peliculas.store') }}" method="post">
         @csrf
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo">
        @error('titulo')
            <p>{{ $message }}</p>
        @enderror

        <label for="director">Director</label>
        <input type="text" name="director">
        @error('director')
            <p>{{ $message }}</p>
        @enderror

        <label for="duracion">Duracion</label>
        <input type="int" name="duracion">
        @error('duracion')
            <p>{{ $message }}</p>
        @enderror

        <label for="clasificacion">Clasificacion</label>
        <input type="text" name="clasificacion">
        @error('clasificacion')
            <p>{{ $message }}</p>
        @enderror

        <label for="sinopsis">Sinopsis</label>
        <input type="text" name="sinopsis">
        @error('sinopsis')
            <p>{{ $message }}</p>
        @enderror

        <label for="fecha_estreno">Fecha estreno</label>
        <input type="int" name="fecha_estreno">
        @error('fecha_estreno')
            <p>{{ $message }}</p>
        @enderror

        <select name="sala_id">
            <option value="default" disabled selected>Selecciona una sala</option>
            @foreach ($salas as $sala)
            <option value="{{ $sala->id }}">{{ $sala->nombre}}</option>
            @endforeach
        </select>
        @error('sala_id')
            <p>{{ $message }}</p>
        @enderror
        <button>Crear</button>
    </form>
@endsection
