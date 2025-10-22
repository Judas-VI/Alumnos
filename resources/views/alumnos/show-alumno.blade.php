<x-Layaout>
    <ul>
        <li>
            <a href="{{ route('alumno.index') }}">Alumnos</a>
        </li>
    </ul>


    <h1>Alumno: {{ $alumno->nombre }}</h1>
    <h3>Correo: {{ $alumno->correo }}</h3>
    <h3>Fecha de Nacimiento: {{ $alumno->fecha_nacimiento }}</h3>
    <h3>Sexo: {{ $alumno->sexo }}</h3>
    <h3>Carrera: {{ $alumno->carrera }}</h3>

</x-Layaout>