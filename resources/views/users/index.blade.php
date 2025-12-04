<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>TODOS LOS USUARIOS</h1>
    @foreach ($users as $user)
        {{ $user->nickname }}
        <a href="{{ route('users.edit', $user) }}">editar</a>
        <form action="{{ route("users.destroy", $user) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Eliminar</button>
        </form>
    @endforeach
    <a href="/users/create">Crear nuevo usuario</a>
</body>

</html>