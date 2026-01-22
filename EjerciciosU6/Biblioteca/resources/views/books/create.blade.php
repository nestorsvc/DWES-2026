@extends('layouts.app')
@section('content')
    <h1>Crear libro</h1>
    <form method="post" action="{{ route('books.store') }}">
        @csrf
        <div>
            <label for="titulo">Titulo</label>
            <input name="title" type="text" value="{{ old('title') }}">
        </div>

        <div>
            <label for="isbn">Isbn</label>
            <input name="isbn" type="text" value="{{ old('isbn') }}">
        </div>

        <div>
            <label for="published_year">Fecha publicación</label>
            <input name="published_year" type="number" value="{{ old('published_year') }}">
        </div>

        <label>Autor:</label>
        <select name="author_id">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>

        {{--
        <div>
            <label for="category">Categoria</label>
            <input name="category" type="text" value="{{ old('category') }}">
        </div> --}}


        <button type="submit">Crear libro</button>
    </form>
@endsection
