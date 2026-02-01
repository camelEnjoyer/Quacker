<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Quashtags</title>
</head>

<body>
    <h1>Lista de Quashtags</h1>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Quashtag</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quashtags as $quashtag)
                <tr>
                    <td>{{ $quashtag->id }}</td>
                    <td>{{ $quashtag->name }}</td>
                    <td>
                        <a href="{{ route('quashtags.edit', $quashtag->id) }}">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('quashtags.destroy', $quashtag->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                            <a href="{{ route('quashtags.quacks', $quashtag->id) }}">
                                Ver quacks
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('quashtags.create') }}">Crear nuevo Quashtag</a>
    <a href="/">Volver al inicio</a>

</body>

</html>