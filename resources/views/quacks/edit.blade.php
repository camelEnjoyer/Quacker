<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Editar Quack</h1>
    <form action="{{ route('quacks.update', $quack) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="user_nickname" value="{{ $quack->user_nickname }}" placeholder="Usuario Nickname" required>
        <textarea name="contenido" id="contenido" cols="30" rows="10" placeholder="Dinos que piensas!!" required>{{ $quack->contenido }}</textarea>
        <input type="submit" value="Editar Quack">
    </form>
    <a href="/quacks">Volver a quacks</a>
</body>

</html>