<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .gray-text {
            color: #4b4b4b;
        }
    </style>
</head>

<body>
    <h1>Bienvenido {{ auth()->user()->full_name }} </h1>
    <p class="gray-text">{{"@" . auth()->user()->nickname }}</h3>
    <p>{{ auth()->user()->bio }}</p>

    <form action="/logout" method="POST">
        @csrf
        <input type="submit" value="Cerrar sesión">
    </form>
</body>

</html>