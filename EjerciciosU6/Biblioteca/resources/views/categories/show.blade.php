@extends('layouts.app')
@section('content')
    <h1>Categoría: {{$category->name}}</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit',$category) }}">Editar</a>
                    <form action="{{ route('categories.destroy',$category) }}" method="DELETE">
                        @csrf
                        @method("DELETE")
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
                </tr>
            </tbody>
        </table>

@endsection
