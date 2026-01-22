@extends('layouts.app')
@section('content')
    <h1>Libro: {{ $book->title }}</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Publicado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->published_year }}</td>
                <td>
                    <a href="{{ route('books.edit', $book) }}">Editar</a>
                    <form action="{{ route('books.destroy', $book) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
