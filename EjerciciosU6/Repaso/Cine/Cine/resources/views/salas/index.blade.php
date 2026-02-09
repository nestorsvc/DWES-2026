@extends('layouts.app')
@section('title','Salas')

@section('content')
<a href="{{ route('salas.create') }}">Crear</a>
        <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Capacidad</th>
                <th>Tipo</th>
                <th>Activa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($salas as $sala)
            <tr>
                <td>{{ $sala->nombre }}</td>
                <td>{{ $sala->capacidad }}</td>
                <td>{{ $sala->tipo }}</td>
                <td>{{ $sala->activa ? 'Si' : 'No'}}</td>
                <td>
                    <a href="{{ route('salas.edit',$sala) }}">Editar</a>
                    <a href="{{ route('salas.show',$sala->id) }}">Ver</a>
                    <form action="{{ route('salas.destroy',$sala) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button onclick="return confirm('Desea eliminar la sala?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
                <p>No hay salas disponibles</p>
            @endempty
        </tbody>
    </table>
@endsection
