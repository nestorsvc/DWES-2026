@extends('layouts.app')
@section('content')
    <h1>Autor: {{ $author->name }}</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>País</th>
                <th>Fecha nacimiento</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $author->name }}</td>
                <td>{{ $author->country }}</td>
                <td>{{ $author->birth_date }}</td>
                <td>
                    <a href="{{ route('authors.edit', $author) }}">Editar</a>
                    <form method="POST" action="{{ route('authors.destroy', $author) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
