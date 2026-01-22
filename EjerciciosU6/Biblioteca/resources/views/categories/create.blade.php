@extends('layouts.app')
@section('content')
<h1>Crear categoría</h1>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name">Nombre</label>
        <input type="text" name="name" value="{{ old('name') }}">
        <button type="submit">Crear</button>
    </form>
@endsection
