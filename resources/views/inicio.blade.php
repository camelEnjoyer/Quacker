<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <style>
        body {
            text-align: center;
            align-items: center;
        }

        img {
            width: 100px;
        }
    </style>
</head>

<body>
    <h1>QUACKER</h1>
    <img src="{{ asset('images/quacker_logo.svg') }}" alt="logo quacker">
    <a href="/users">Lista de Usuarios</a> 
    <a href="/quacks">Lista de Quacks</a>
    <a href="/login">Iniciar Sesión</a>
</body>

</html>