<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('quashtags.update', $quashtag->id) }}" method="post">
        @csrf
        @method('PATCH')
        <label for="nombre">Quashtag:</label>
        <input type="text" id="name" name="name" value="{{ $quashtag->name }}" required>
        <input type="submit" value="Editar quashtag">
    </form>
</body>
</html>