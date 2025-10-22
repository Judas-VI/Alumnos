<x-Layaout>
    <div class="container my-5">
        
        {{-- Botón para volver al listado --}}
        <div class="mb-4">
            <a href="{{ route('alumno.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver a Listado de Alumnos
            </a>
        </div>

        {{-- Tarjeta de detalles del Alumno --}}
        <div class="card bg-dark text-white shadow-lg border-secondary">
            
            {{-- Encabezado de la Tarjeta --}}
            <div class="card-header border-secondary">
                <h1 class="h3 card-title mb-0 text-light">Detalles del Alumno</h1>
            </div>

            {{-- Cuerpo de la Tarjeta --}}
            <div class="card-body">
                
                {{-- Nombre del Alumno (Título principal) --}}
                <h2 class="card-title display-4 mb-4 text-info">{{ $alumno->nombre }}</h2>

                {{-- Detalles en forma de lista de definiciones (dl) --}}
                <dl class="row">
                    
                    {{-- Correo --}}
                    <dt class="col-sm-4 text-light">Correo:</dt>
                    <dd class="col-sm-8">{{ $alumno->correo }}</dd>

                    {{-- Fecha de Nacimiento --}}
                    <dt class="col-sm-4 text-light">Fecha de Nacimiento:</dt>
                    {{-- Opcional: Formatear la fecha para mejor visualización --}}
                    <dd class="col-sm-8">{{ \Carbon\Carbon::parse($alumno->fecha_nacimiento)->format('d/m/Y') }}</dd> 

                    {{-- Sexo --}}
                    <dt class="col-sm-4 text-light">Sexo:</dt>
                    <dd class="col-sm-8">{{ $alumno->sexo }}</dd>

                    {{-- Carrera --}}
                    <dt class="col-sm-4 text-light">Carrera:</dt>
                    <dd class="col-sm-8">{{ $alumno->carrera }}</dd>
                    
                    {{-- Código (Opcional, si quieres mostrarlo también) --}}
                    <dt class="col-sm-4 text-light">Código:</dt>
                    <dd class="col-sm-8 text-muted">{{ $alumno->codigo }}</dd>
                </dl>
            </div>
            
            {{-- Pie de la Tarjeta con botones de acción --}}
            <div class="card-footer d-flex justify-content-end gap-2 border-secondary">
                <a href="{{ route('alumno.edit', $alumno->id) }}" class="btn btn-primary">
                    <i class="bi bi-pencil-square"></i> Editar Alumno
                </a>
            </div>
        </div>
    </div>
</x-Layaout>