<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil · Quacker</title>

    <style>
        /* RESET */
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

            background-color: #000000;
            color: #e7e9ea;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 60px;
        }

        /* CONTENEDOR PERFIL */
        .profile-card {
            width: 100%;
            max-width: 520px;
            background-color: #16181c;
            border-radius: 18px;
            border: 1px solid #2f3336;
            padding: 28px;
        }

        /* HEADER PERFIL */
        .profile-header {
            margin-bottom: 20px;
        }

        .profile-name {
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .profile-nickname {
            color: #71767b;
            font-size: 15px;
            margin-bottom: 14px;
        }

        .profile-bio {
            font-size: 15px;
            line-height: 1.5;
            margin-bottom: 24px;
        }

        /* BOTÓN LOGOUT */
        .logout-form {
            display: flex;
            justify-content: flex-end;
        }

        .logout-form input {
            background-color: transparent;
            border: 1px solid #f4212e;
            color: #f4212e;
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s, color 0.2s, transform 0.1s;
        }

        .logout-form input:hover {
            background-color: rgba(244, 33, 46, 0.1);
        }

        .logout-form input:active {
            transform: scale(0.96);
        }
    </style>
</head>

<body>

    <div class="profile-card">
        <div class="profile-header">
            <h1 class="profile-name">
                Bienvenido {{ auth()->user()->full_name }}
            </h1>

            <p class="profile-nickname">
                {{ '@' . auth()->user()->nickname }}
            </p>

            <p class="profile-bio">
                {{ auth()->user()->bio }}
            </p>
        </div>

        <form class="logout-form" action="/logout" method="POST">
            @csrf
            <input type="submit" value="Cerrar sesión">
        </form>
    </div>

</body>

</html>
