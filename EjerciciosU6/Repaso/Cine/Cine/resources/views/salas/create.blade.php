@extends('layouts.app');
@section('title', 'Crear Sala')

@section('content')
    <form action="{{ route('salas.store') }}" method="post">
         @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        @error('nombre')
            <p>{{ $message }}</p>
        @enderror

        <label for="capacidad">Capacidad</label>
        <input type="number" name="capacidad">
        @error('capacidad')
            <p>{{ $message }}</p>
        @enderror

        <label for="tipo">Tipo</label>
        <input type="string" name="tipo">
        @error('tipo')
            <p>{{ $message }}</p>
        @enderror

        <input type="hidden" name="activa" value="0">
        <input type="checkbox" name="activa" value="1">
        @error('activa')
            <p>{{ $message }}</p>
        @enderror

        <button>Crear</button>
    </form>
@endsection
