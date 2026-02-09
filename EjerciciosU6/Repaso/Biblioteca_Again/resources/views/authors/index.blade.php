@extends('layouts.app')
@section('content')
    <h1>Lista de autores</h1>
    <a href="{{ route('authors.create') }}">Crear autor</a>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Bio</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->bio }}</td>
                    <td>
                        <a href="{{ route('authors.edit', $author) }}">Editar</a>
                        <a href="{{ route('authors.show', $author) }}">Ver</a>
                    </td>
                </tr>
            @endforeach
            @if (session('message'))
                <p>{{ session('message') }}</p>
            @endif
        </tbody>
    </table>
@endsection
