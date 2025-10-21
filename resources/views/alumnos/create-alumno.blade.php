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
    
     @include('form-error')

    <form action="{{ route('alumno.store') }}" method="POST">
        @csrf

        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" value="{{ old('codigo') }}">
        @error('codigo')
        <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
        @enderror
        <br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
        @error('nombre')
        <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
        @enderror
        <br>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="{{ old('correo') }}">
        @error('correo')
        <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
        @enderror
        <br>

        <label for="fecha_nacimiento">Fecha Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
        @error('fecha_nacimiento')
        <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
        @enderror
        <br>

        <fieldset>
            <legend>Sexo:</legend>
            <label>
                <input type="radio" name="sexo" value="M"> M
            </label>
            <label>
                <input type="radio" name="sexo" value="F"> F
            </label>
            @error('sexo')
            <span style="color: red; font-size: 0.9em; display: block;">{{ $message }}</span>
            @enderror
        </fieldset>

        <label for="carrera">Carrera:</label>
        <input type="text" id="carrera" name="carrera" value="{{ old('carrera') }}">
        @error('carrera')
        <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
        @enderror
        <br>

        <button type="submit">Guardar</button>
    </form>
</body>

</html>