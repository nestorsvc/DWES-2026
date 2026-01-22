    @extends('layouts.app')
    @section('content')
        <h1>Autores</h1>

        <a href="{{ route('authors.create') }}">Crear autor</a>

        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>País</th>
                    <th>Fecha nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->country }}</td>
                        <td>{{ $author->birth_date }}</td>
                        <td>
                            <a href="{{ route('authors.edit', $author) }}">Editar</a>
                            <a href="{{ route('authors.show', $author) }}">Ver</a>
                            <form method="POST" action="{{ route('authors.destroy', $author) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $authors->links() }}
    @endsection
