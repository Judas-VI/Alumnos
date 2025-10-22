<x-Layaout>
    {{-- Contenedor principal con fondo oscuro y texto claro --}}
    <div class="container my-5 p-4 bg-dark text-white rounded shadow">
        
        <h1 class="mb-4 pb-2 border-bottom border-secondary text-light">Listado de Alumnos</h1>
        
        {{-- Enlace para agregar alumno --}}
        <div class="mb-4">
            <a href="{{ route('alumno.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Agregar Nuevo Alumno
            </a>
        </div>

        {{-- Tabla de Alumnos --}}
        {{-- Usamos table-dark para el estilo de tabla oscuro y table-hover para interactividad --}}
        <table class="table table-dark table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Carrera</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->codigo }}</td>
                    <td>
                        {{-- El nombre es un enlace para ver detalles, usamos btn-link para que parezca texto --}}
                        <a href="{{ route('alumno.show', $alumno->id) }}" class="text-info text-decoration-none">
                            {{ $alumno->nombre }}
                        </a>
                    </td>
                    <td>{{ $alumno->correo }}</td>
                    <td>{{ $alumno->carrera }}</td>
                    <td class="d-flex justify-content-center gap-2">
                        {{-- Botón Editar (azul) --}}
                        <a href="{{ route('alumno.edit', $alumno->id) }}" class="btn btn-primary btn-sm">
                            Editar
                        </a>
                        
                        {{-- Formulario de Eliminación --}}
                        <form action="{{ route('alumno.destroy', $alumno->id) }}" method="POST" class="m-0">
                            @csrf
                            @method('DELETE')
                            {{-- Botón Eliminar (rojo) --}}
                            <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('¿Estás seguro de que deseas eliminar a {{ $alumno->nombre }}?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Aquí podrías añadir paginación si la usas: $alumnos->links() --}}

    </div>
</x-Layaout>