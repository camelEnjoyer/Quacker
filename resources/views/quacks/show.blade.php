<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Quack de {{ '@' . $quack->user->nickname}}</h1>
    <p>{{'@' . $quack->user->nickname }}</p>
    <p>Ha escrito: {{ $quack->contenido }}</p>
    <p>Creado: {{ $quack->created_at }}</p>
    <a href="/quacks">Volver a los quacks</a>
</body>

</html>