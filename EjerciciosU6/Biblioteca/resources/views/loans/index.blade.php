<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Préstamos</title>
</head>
<body>
    <h1>Préstamos</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Libro</th>
                <th>Usuario</th>
                <th>Fecha préstamo</th>
                <th>Fecha devolución</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $loan)
                <tr>
                    <td>{{ $loan->book->title }}</td>
                    <td>{{ $loan->user->name }}</td>
                    <td>{{ $loan->loaned_at }}</td>
                    <td>{{ $loan->returned_at ?? 'No devuelto' }}</td>
                    <td>{{ $loan->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $loans->links() }}
</body>
</html>
