<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quacks del usuario</title>
</head>

<body>
    <h1>Quacks de {{ $user->full_name }} ({{ '@' . $user->nickname }})</h1>

    @forelse($quacks as $quack)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            {{ $quack->created_at }}<br>
            {{ $quack->contenido }}
        </div>
    @empty
        <p>Este usuario aún no tiene quacks.</p>
    @endforelse

</body>

</html>
