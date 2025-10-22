<x-Layaout>
    <div class="container my-5 p-4 bg-dark text-white rounded shadow">
        
        <x-encabezado>
            <h1 class="mb-4 pb-2 border-bottom border-secondary text-light">Editar Alumno: {{ $alumno->nombre }}</h1>
        </x-encabezado>

        <x-form-error />

        <form action="{{ route('alumno.update', $alumno->id) }}" method="POST" class="row g-3">
            @csrf
            {{-- Importante: Laravel usa PATCH o PUT para actualizar recursos --}}
            @method('PATCH')

            {{-- Campo Código --}}
            <div class="col-md-6">
                <label for="codigo" class="form-label text-light">Código:</label>
                <input type="text" id="codigo" name="codigo" 
                       class="form-control @error('codigo') is-invalid @enderror" 
                       value="{{ old('codigo', $alumno->codigo) }}">
                @error('codigo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Campo Nombre --}}
            <div class="col-md-6">
                <label for="nombre" class="form-label text-light">Nombre:</label>
                <input type="text" id="nombre" name="nombre" 
                       class="form-control @error('nombre') is-invalid @enderror" 
                       value="{{ old('nombre', $alumno->nombre) }}">
                @error('nombre')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Campo Correo --}}
            <div class="col-md-6">
                <label for="correo" class="form-label text-light">Correo:</label>
                <input type="email" id="correo" name="correo" 
                       class="form-control @error('correo') is-invalid @enderror" 
                       value="{{ old('correo', $alumno->correo) }}">
                @error('correo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Campo Fecha Nacimiento --}}
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label text-light">Fecha Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" 
                       class="form-control @error('fecha_nacimiento') is-invalid @enderror" 
                       value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}">
                @error('fecha_nacimiento')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Campo Sexo (Radio Buttons) --}}
            <div class="col-md-6">
                <fieldset class="mb-3">
                    <legend class="col-form-label pt-0 text-light">Sexo:</legend>
                    
                    @php
                        // Determinar el valor actual del campo sexo (prioriza old(), sino usa el valor del modelo)
                        $sexo_actual = old('sexo', $alumno->sexo);
                    @endphp

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="M" 
                               @checked($sexo_actual == 'M')>
                        <label class="form-check-label" for="sexoM">
                            M
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="F" 
                               @checked($sexo_actual == 'F')>
                        <label class="form-check-label" for="sexoF">
                            F
                        </label>
                    </div>

                    @error('sexo')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                    @enderror
                </fieldset>
            </div>

            {{-- Campo Carrera --}}
            <div class="col-md-6">
                <label for="carrera" class="form-label text-light">Carrera:</label>
                <input type="text" id="carrera" name="carrera" 
                       class="form-control @error('carrera') is-invalid @enderror" 
                       value="{{ old('carrera', $alumno->carrera) }}">
                @error('carrera')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Botón Guardar --}}
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</x-Layaout>
