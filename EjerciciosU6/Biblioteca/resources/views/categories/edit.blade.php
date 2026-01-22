@extends('layouts.app')
@section('content')
<h1>Crear categoría</h1>
    <form action="{{ route('categories.update',$category) }}" method="post">
        @csrf
        @method("PUT")
        <label for="name">Nombre</label>
        <input type="text" name="name" value="{{ old('name',$category->name) }}">
        <button type="submit">Editar</button>
    </form>
@endsection
