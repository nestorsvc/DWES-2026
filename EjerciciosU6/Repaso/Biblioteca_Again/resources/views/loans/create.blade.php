<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loan create</title>
</head>

<body>
    <h1>Crear loan</h1>
    <form action="{{ route('loans.store') }}" method="post">
        @csrf
        <select name="user_id">
            <option value="default" disabled selected>Escoge un usuario</option>
            @foreach ($users as $user )
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <select name="book_id">
            <option value="default" disabled selected>Escoge un libro</option>
            @foreach ($books as $book )
                <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>

        <label for="loaned_at">Prestado</label>
        <input type="datetime" name="loaned_at">

        <label for="returned_at">Devuelto</label>
        <input type="datetime" name="returned_at">

        <label for="status">Estatus</label>
        <input type="text" name="status">

        <button>Crear</button>
    </form>
</body>

</html>
