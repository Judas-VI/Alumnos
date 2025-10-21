<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumno: Agregar</title>
</head>

<body>
    <h1>Nuevo Alumno</h1>
    <form action="{{ route('alumno.store') }}" method="POST">
        @csrf
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" required>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>
        <br>
        <label for="fecha_nacimiento">Fecha Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
        <br>
        <fieldset>
            <legend>Sexo:</legend>
            <label><input type="radio" name="sexo" value="M" required> M </label>
            <label><input type="radio" name="sexo" value="F"> F </label>
        </fieldset>
        <label for="carrera">Carrera:</label>
        <input type="text" id="carrera" name="carrera" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>