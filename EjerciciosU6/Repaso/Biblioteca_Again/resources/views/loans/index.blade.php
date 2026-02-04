<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>

<body>
    <a href="{{ route("loans.create")}}">Crear</a>
    <table border="1">
        <thead>
            <tr>
                <th>Libro id</th>
                <th>Autor id</th>
                <th>Prestado</th>
                <th>Devuelto</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->book_id }}</td>
                    <td>{{ $loan->user_id }}</td>
                    <td>{{ $loan->loaned_at }}</td>
                    <td>{{ $loan->returned_at }}</td>
                    <td>{{ $loan->status }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
</body>

</html>
