<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quacker</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

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

            background-color: #000;
            color: #e7e9ea;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .landing {
            text-align: center;
            max-width: 420px;
            width: 100%;
            padding: 40px 20px;
        }

        .logo {
            width: 90px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 42px;
            font-weight: 900;
            margin-bottom: 14px;
        }

        .subtitle {
            color: #71767b;
            font-size: 16px;
            margin-bottom: 36px;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .btn {
            text-decoration: none;
            padding: 14px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 15px;
            transition: background-color 0.2s, transform 0.1s;
        }

        .btn-primary {
            background-color: #1d9bf0;
            color: white;
        }

        .btn-primary:hover {
            background-color: #1a8cd8;
        }

        .btn-secondary {
            border: 1px solid #2f3336;
            color: #e7e9ea;
        }

        .btn-secondary:hover {
            background-color: #16181c;
        }

        .btn:active {
            transform: scale(0.97);
        }

        .footer {
            margin-top: 32px;
            font-size: 13px;
            color: #71767b;
        }
    </style>
</head>

<body>

    <div class="landing">
        <img class="logo" src="{{ asset('images/quacker_logo.svg') }}" alt="Logo Quacker">

        <h1>QUACKER</h1>
        <p class="subtitle">Dilo. Comparte. Quackea.</p>

        <div class="actions">
            <a href="/login" class="btn btn-primary">Iniciar sesión</a>
            <a href="/register" class="btn btn-secondary">Registrarse</a>
            <a href="/quacks" class="btn btn-secondary">Ver Quacks</a>
            <a href="/users" class="btn btn-secondary">Usuarios</a>
            <a href="/quashtags" class="btn btn-secondary">Quashtags</a>
        </div>

        <div class="footer">
            © {{ date('Y') }} Quacker
        </div>
    </div>

</body>

</html>
