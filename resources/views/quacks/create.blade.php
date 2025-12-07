<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Crear Quack</h1>
    <form action="{{ route('quacks.store') }}" method="POST">
        @csrf
        <input type="text" name="user_nickname" placeholder="Usuario Nickname" required>
        <br>
        <br>
        <textarea name="contenido" id="contenido" placeholder="Dinos que piensas!!" cols="30" rows="10"></textarea>
        <br>
        <br>
        <input type="submit" value="Añadir Quack">
    </form>
    <br>
    <a href="/quacks">Volver a Quacks</a>

</body>

</html>