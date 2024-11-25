<!DOCTYPE html>
<html>
<head>
    <title>Lista de Categorías</title>
</head>
<body>
    <h1>Lista de Categorías</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Fabricante</th>
                <th>Fecha de Lanzamiento</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <img src="{{ public_path('images/' . $category->image) }}" alt="{{ $category->name }}" style="width: 100px; height: 100px;">
                    </td>
                    <td>{{ $category->manufacturer }}</td>
                    <td>{{ $category->releasedate }}</td>
                    <td>{{ $category->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>