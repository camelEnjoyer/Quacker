<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil · Quacker</title>
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

        input,
        textarea {
            background-color: #000000;
            border: 1px solid #2f3336;
            color: #e7e9ea;
            padding: 14px 16px;
            border-radius: 10px;
            font-size: 15px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input::placeholder,
        textarea::placeholder {
            color: #71767b;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #1d9bf0;
            box-shadow: 0 0 0 2px rgba(29, 155, 240, 0.3);
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

        /* Mensaje de éxito */
        .success {
            color: #00c851;
            text-align: center;
            margin-bottom: 16px;
        }

        /* Error */
        .error {
            color: #ff3547;
            font-size: 13px;
            margin-top: 4px;
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
        <h1>Editar perfil</h1>

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT') <!-- IMPORTANTE: porque la ruta es PUT -->

            <input type="text" name="full_name" placeholder="Nombre completo"
                value="{{ old('full_name', $user->full_name) }}">
            @error('full_name')
                <div class="error">{{ $message }}</div>
            @enderror

            <input type="text" name="nickname" placeholder="Nickname" value="{{ old('nickname', $user->nickname) }}">
            @error('nickname')
                <div class="error">{{ $message }}</div>
            @enderror

            <input type="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <input type="password" name="password" placeholder="Contraseña (opcional)">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña">

            <textarea name="bio" placeholder="Bio">{{ old('bio', $user->bio) }}</textarea>
            @error('bio')
                <div class="error">{{ $message }}</div>
            @enderror

            <input type="submit" value="Guardar cambios">
        </form>


        <div class="back">
            <a href="/feed">Volver al feed</a>
        </div>
    </div>
</body>

</html>
