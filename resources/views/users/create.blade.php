<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Crear usuario</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <input type="text" name="full_name" placeholder="Nombre completo" required>
        <input type="text" name="nickname" placeholder="nickname" required>
        <input type="email" name="email" placeholder="example@gmail.com" required>
        <input type="password" name="password" placeholder="contraseña" required>
        <input type="submit" value="Añadir usuario">
    </form>
    <a href="/users">Volver a usuarios</a>

</body>

</html>