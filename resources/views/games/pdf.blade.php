<!DOCTYPE html>
<html>
<head>
    <title>Lista de Juegos</title>
</head>
<body>
    <h1>Lista de Juegos</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Título</th>
                <th>Desarrollador</th>
                <th>Fecha de Lanzamiento</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Género</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <td>
                        <img src="{{ public_path('images/' . $game->image) }}" alt="{{ $game->title }}" style="width: 100px; height: 100px;">
                    </td>
                    <td>{{ $game->title }}</td>
                    <td>{{ $game->developer }}</td>
                    <td>{{ $game->releasedate }}</td>
                    <td>{{ $game->category->name }}</td>
                    <td>{{ $game->price }}</td>
                    <td>{{ $game->genre }}</td>
                    <td>{{ $game->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>