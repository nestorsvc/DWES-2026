<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear autor</title>
</head>
<body>
    <h1>Crear autor</h1>
    <form action="{{ route('authors.store') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}">

        <label for="bio">Bio</label>
        <input type="text" name="bio" value="{{ old('name') }}">
        <button>Crear</button>
    </form>
</body>
</html>
