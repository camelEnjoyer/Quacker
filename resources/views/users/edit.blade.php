<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Editar Usuario</h1>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="full_name" value="{{ $user->full_name }}" required>
        <input type="text" name="nickname" value="{{ $user->nickname }}" required>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <input type="password" name="password" placeholder="Nueva contraseña (opcional)">
        <input type="text" name="bio" value="{{ $user->bio }}" placeholder="Biografia (opcional)">
        <input type="submit" value="Actualizar usuario">
    </form>
    <a href="/users">Volver a usuarios</a>
</body>

</html>