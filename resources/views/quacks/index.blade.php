<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quacks</title>
</head>

<body>
    <h1>TODOS LOS QUACKS</h1>

    @foreach ($quacks as $quack)
        <p>
            @if($quack->user)
                {{ '@' . $quack->user->nickname }}
            @else
                @usuario_borrado
            @endif
        </p>
        <p>{{ '@' . $quack->user->nickname }}</p>
        <p>Ha escrito: {{ $quack->contenido }}</p>
        <p>Creado: {{ $quack->created_at }}</p>
    @endforeach

    <p style="color:gray">
        (La funcionalidad de crear/editar quacks aparecerá cuando se implemente login)
    </p>

    <a href="/">Volver al inicio</a>
</body>

</html>
