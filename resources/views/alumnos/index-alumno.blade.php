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
                <th>ID</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>correo</th>
                <th>Fecha Nacimiento</th>
                <th>Sexo</th>
                <th>Carrera</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->codigo }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->correo }}</td>
                    <td>{{ $alumno->fecha_nacimiento }}</td>
                    <td>{{ $alumno->sexo }}</td>
                    <td>{{ $alumno->carrera }}</td>
                    <td>---</td>
                </tr>
            @endforeach
        </tbody>
</body>
</html>