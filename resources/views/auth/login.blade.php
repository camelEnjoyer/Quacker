<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="/login" method="POST">
        @csrf
        <h1>Iniciar Sesión</h1>
        <label for="email">Email:</label>
        <input type="email" name="email">
        @error('email')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <label for="password">Contraseña:</label>
        <input type="password" name="password">
        @error('password')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <input type="submit" value="Entrar">
        <a href="/">Volver al inicio</a>
    </form>
</body>

</html>