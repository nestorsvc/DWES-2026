@extends('layouts.app')
@section('content')
<h1>Editar libro</h1>
    <form method="post" action="{{ route('books.update',$book) }}">
        @csrf
        @method("PUT")
        <div>
            <label for="titulo">Titulo</label>
            <input name="title" type="text" value="{{ old('title',$book->title) }}">
        </div>

        <div>
            <label for="author_id">Id del Autor</label>
            <input name="author_id" type="text" value="{{ old('author_id',$book->author_id) }}">
        </div>

        <div>
            <label for="isbn">Isbn</label>
            <input name="isbn" type="text" value="{{ old('isbn',$book->isbn) }}">
        </div>

        <div>
            <label for="published_year">Fecha publicación</label>
            <input name="published_year" type="number" value="{{ old('published_year',$book->published_year) }}">
        </div>
{{--
        <div>
            <label for="category">Categoria</label>
            <input name="category" type="text" value="{{ old('category',$book->category) }}">
        </div> --}}

        <button type="submit">Editar libro</button>
    </form>
@endsection
