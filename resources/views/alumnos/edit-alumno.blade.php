<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumno: Editar</title>
</head>

<body>
    <h1>Editar Alumno</h1>
    @include('form-error')

    <form action="{{ route('alumno.update', $alumno->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" value="{{ old('codigo') }}">
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
        <br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="{{ old('correo') }}">
        <br>
        <label for="fecha_nacimiento">Fecha Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
        <br>
        <fieldset>
            <legend>Sexo:</legend>
            <label>
                <input type="radio" name="sexo" value="M" {{ old('sexo') == 'M' ? 'checked' : '' }}> M
            </label>
            <label>
                <input type="radio" name="sexo" value="F" {{ old('sexo') == 'F' ? 'checked' : '' }}> F
            </label>
        </fieldset>
        <label for="carrera">Carrera:</label>
        <input type="text" id="carrera" name="carrera" value="{{ old('carrera') }}">
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>