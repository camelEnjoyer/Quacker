<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>TODOS LOS QUACKS</h1>
    @foreach ($quacks as $quack)
        <p>{{ '@' . $quack->user_nickname }}</p>
        <p>Ha escrito: {{ $quack->contenido }}</p>
        <p>Creado: {{ $quack->created_at }}</p>
        <a href="{{ route('quacks.edit', $quack) }}">editar</a>
        <a href="{{ route('quacks.show', $quack) }}">ver quack</a>
        <form action="{{ route("quacks.destroy", $quack) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Eliminar</button>
        </form>
    @endforeach
    <a href="/quacks/create">Crear nuevo quack</a>
</body>

</html>