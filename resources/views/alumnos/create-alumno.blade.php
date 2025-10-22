<x-Layaout>
    {{-- Contenedor principal con fondo oscuro y texto claro --}}
    <div class="container my-5 p-4 bg-dark text-white rounded shadow">
        
        <x-encabezado>
            <h1>Nuevo Alumno:</h1>
        </x-encabezado>

        <x-form-error />

        <form action="{{ route('alumno.store') }}" method="POST" class="row g-3">
            @csrf

            {{-- Campo Código --}}
            <div class="col-md-6">
                <label for="codigo" class="form-label text-light">Código:</label>
                {{-- Los inputs se mantienen claros para mejor legibilidad, pero con estilo oscuro si es posible --}}
                <input type="text" id="codigo" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo') }}">
                @error('codigo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Campo Nombre --}}
            <div class="col-md-6">
                <label for="nombre" class="form-label text-light">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                @error('nombre')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Campo Correo --}}
            <div class="col-md-6">
                <label for="correo" class="form-label text-light">Correo:</label>
                <input type="email" id="correo" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}">
                @error('correo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Campo Fecha Nacimiento --}}
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label text-light">Fecha Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror" value="{{ old('fecha_nacimiento') }}">
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
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="M" @checked(old('sexo') == 'M')>
                        <label class="form-check-label" for="sexoM">
                            M
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="F" @checked(old('sexo') == 'F')>
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
                <input type="text" id="carrera" name="carrera" class="form-control @error('carrera') is-invalid @enderror" value="{{ old('carrera') }}">
                @error('carrera')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Botón Guardar (Se mantiene 'primary' para un buen contraste) --}}
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</x-Layaout>