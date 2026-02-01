<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse · Quacker</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: #000;
            color: #e7e9ea;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #16181c;
            width: 100%;
            max-width: 420px;
            padding: 36px;
            border-radius: 18px;
            border: 1px solid #2f3336;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 28px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        input {
            background: #000;
            border: 1px solid #2f3336;
            color: #e7e9ea;
            padding: 14px 16px;
            border-radius: 10px;
            font-size: 15px;
        }

        input::placeholder {
            color: #71767b;
        }

        input:focus {
            outline: none;
            border-color: #1d9bf0;
            box-shadow: 0 0 0 2px rgba(29, 155, 240, 0.3);
        }

        input[type="submit"] {
            background: #1d9bf0;
            border: none;
            color: #fff;
            font-weight: 700;
            font-size: 16px;
            padding: 14px;
            border-radius: 999px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background: #1a8cd8;
        }

        input[type="submit"]:active {
            transform: scale(0.97);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 28px 0;
            color: #71767b;
            font-size: 14px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #2f3336;
        }

        .login {
            text-align: center;
            font-size: 14px;
            color: #71767b;
        }

        .login a {
            color: #1d9bf0;
            font-weight: 700;
            text-decoration: none;
        }

        .login a:hover {
            text-decoration: underline;
        }

        .back {
            text-align: center;
            margin-top: 22px;
            font-size: 14px;
        }

        .back a {
            color: #1d9bf0;
            text-decoration: none;
            font-weight: 600;
        }

        .back a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Crear cuenta</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <input type="text" name="full_name" placeholder="Nombre completo" required>
            <input type="text" name="nickname" placeholder="Nombre de usuario" required>
            <input type="email" name="email" placeholder="correo@ejemplo.com" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>

            <input type="submit" value="Registrarse">
        </form>


        <div class="divider">o</div>

        <div class="login">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}">Inicia sesión</a>
        </div>

        <div class="back">
            <a href="/">← Volver al inicio</a>
        </div>
    </div>
</body>

</html>
