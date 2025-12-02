<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Perfil de {{ $user->full_name }}</h1>
    <p>{{'@' . $user->nickname }}</p>
    @if ($user->bio)
    <p>bio: {{ $user->bio }}</p>
    @else
    <p>No tiene bio</p>
    @endif
    <a href="/users">Volver a los usuarios</a>
</body>

</html>