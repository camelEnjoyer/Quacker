<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión · Quacker</title>

    <style>
        /* RESET */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* FONTS tipo Apple */
        body {
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "SF Pro Text",
                "SF Pro Display",
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                sans-serif;

            background-color: #000000;
            color: #e7e9ea;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* CONTENEDOR */
        .card {
            background-color: #16181c;
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

        /* FORM */
        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        label {
            font-size: 14px;
            color: #71767b;
        }

        input {
            background-color: #000000;
            border: 1px solid #2f3336;
            color: #e7e9ea;
            padding: 14px 16px;
            border-radius: 10px;
            font-size: 15px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input::placeholder {
            color: #71767b;
        }

        input:focus {
            outline: none;
            border-color: #1d9bf0;
            box-shadow: 0 0 0 2px rgba(29, 155, 240, 0.3);
        }

        /* ERRORES */
        .error {
            color: #f4212e;
            font-size: 14px;
        }

        /* BOTÓN */
        input[type="submit"] {
            background-color: #1d9bf0;
            border: none;
            color: white;
            font-weight: 700;
            font-size: 16px;
            padding: 14px;
            border-radius: 999px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.2s, transform 0.1s;
        }

        input[type="submit"]:hover {
            background-color: #1a8cd8;
        }

        input[type="submit"]:active {
            transform: scale(0.97);
        }

        /* SEPARADOR */
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
            background-color: #2f3336;
        }

        /* REGISTRO */
        .register {
            text-align: center;
            font-size: 14px;
            color: #71767b;
        }

        .register a {
            color: #1d9bf0;
            font-weight: 700;
            text-decoration: none;
        }

        .register a:hover {
            text-decoration: underline;
        }

        /* LINK */
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
        <h1>Iniciar sesión</h1>

        <form action="/login" method="POST">
            @csrf

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="correo@ejemplo.com"
                value="{{ old('email') }}">

            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Contraseña">

            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror

            <input type="submit" value="Entrar">
        </form>

        <div class="divider">o</div>

        <div class="register">
            ¿No tienes cuenta?
            <a href="{{ route('users.create') }}">Regístrate</a>
        </div>

        <div class="back">
            <a href="/">← Volver al inicio</a>
        </div>
    </div>

</body>

</html>
