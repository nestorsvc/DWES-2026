@extends('layouts.app')
@section('content')
    <h1>Categorías</h1>

    <a href="{{ route('categories.create') }}">Crear categoría</a>

        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit',$category) }}">Editar</a>
                        <a href="{{ route('categories.show',$category) }}">Ver</a>
                    <form action="{{ route('categories.destroy',$category) }}" method="DELETE">
                        @csrf
                        @method("DELETE")
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        {{ $categories->links() }}
@endsection
