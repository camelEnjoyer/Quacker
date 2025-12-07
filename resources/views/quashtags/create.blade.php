<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('quashtags.store') }}" method="post">
        @csrf
        <label for="nombre">Quashtag:</label>
        <input type="text" id="name" name="name" value="#" required>
        <input type="submit" value="Crear quashtag">
    </form>
</body>
</html>