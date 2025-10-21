<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumnos</title>
</head>

<body>
    <h1>Listado de Alumnos</h1>
    <ul>
        <li>
            <a href="{{ route('alumno.create') }}">Agrega un alumno</a>
        </li>
    </ul>
    <table border="1">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->codigo }}</td>
                <td>
                    <a href="{{ route('alumno.show', $alumno->id) }}">
                        {{ $alumno->nombre }}
                    </a>
                </td>
                <td>{{ $alumno->correo }}</td>
                <td>{{ $alumno->carrera }}</td>
                <td>

                    <a href="{{ route('alumno.edit', $alumno->id) }}">Editar</a>
                    <form action="{{ route('alumno.destroy', $alumno->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</body>

</html>