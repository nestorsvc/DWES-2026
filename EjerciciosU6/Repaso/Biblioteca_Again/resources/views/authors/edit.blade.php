<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar autor</title>
</head>
<body>
    <h1>Editar autor {{ $author->id }}</h1>
    <form action="{{ route('authors.update',$author) }}" method="post">
        @method("PUT")
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name',$author->name) }}">

        <label for="bio">Bio</label>
        <input type="text" name="bio" value="{{ old('name',$author->bio) }}">
        <button>Editar</button>
    </form>
</body>
</html>
