@extends('layouts.app')
@section("title","Editar Sala")

@section('content')
     <form action="{{ route('salas.update',$sala) }}" method="post">
         @csrf
         @method("PUT")
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="{{ old($sala->nombre,"") }}">
        @error('nombre')
            <p>{{ $message }}</p>
        @enderror

        <label for="capacidad">Capacidad</label>
        <input type="number" name="capacidad" {{ old($sala->capacidad, "") }}>
        @error('capacidad')
            <p>{{ $message }}</p>
        @enderror

        <label for="tipo">Tipo</label>
        <input type="string" name="tipo" value="{{ old($sala->tipo, "") }}">
        @error('tipo')
            <p>{{ $message }}</p>
        @enderror

        <input type="hidden" name="activa" value="0">
        <input type="checkbox" name="activa" value="1">
        @error('activa')
            <p>{{ $message }}</p>
        @enderror

        <button>Editar</button>
    </form>
@endsection
