<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Quashtag: {{ $quashtag->name }}</h1>

    @foreach($quacks as $quack)
        <div style="border: 1px solid black; padding: 10px; margin-bottom: 10px;">
            <p><strong>{{ $quack->user->full_name }}</strong>
            <p>@<strong>{{ $quack->user->nickname }}</strong>
            <p>{{ $quack->contenido }}</p>
            <small>{{ $quack->created_at}}</small>
        </div>
    @endforeach
    <a href="{{ route('quashtags.index') }}">Volver a Quashtags</a>
</body>
</html>