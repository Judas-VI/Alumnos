<?php

use App\Models\Alumno; //modelo  a usar
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class); // crea un ambiente esteril para una prube si interferecncia de datos ateriormente guardados
use Illuminate\Support\Facades\Log;


test('muestra el listado de alumnos', function () {
    // 1. Crear un alumno en la base de datos para asegurar que hay contenido.
    $alumno = Alumno::factory()->create();

    // 2. Simular la petición GET a la ruta de índice.
    $this->get(route('alumno.index'))
        // 3. Verificar que la respuesta sea 200 (OK).
        ->assertStatus(200)
        // 4. Verificar que se muestren las columnas de la tabla.
        ->assertSeeInOrder(['Código', 'Nombre', 'Correo', 'Carrera', 'Acciones'])
        // 5. Verificar que el alumno creado se muestre en el listado.
        ->assertSee($alumno->nombre)
        ->assertSee($alumno->codigo)
        ->assertSee($alumno->correo)
        ->assertSee($alumno->carrera);
});

test('muestra el formulario de creación de alumno', function () {
    // 1. Simular la petición GET a la ruta de creación.
    $this->get(route('alumno.create'))
        // 2. Verificar que la respuesta sea 200 (OK).
        ->assertStatus(200)
        // 3. Verificar que los elementos clave del formulario estén visibles.
        ->assertSee('Nuevo Alumno')
        ->assertSee('Código:')
        ->assertSee('Fecha Nacimiento:')
        ->assertSee('Guardar');
});

test('puede crear un nuevo alumno con éxito', function () {
    // 1. Usar el factory para crear datos válidos, pero SIN guardar en BD (make).
    $datos_alumno = Alumno::factory()->make()->toArray();
    
    // 2. Simular el envío de un formulario POST.
    $this->post(route('alumno.store'), $datos_alumno)
        // 3. Verificar que la respuesta sea una redirección (típico después de un store exitoso).
        ->assertRedirect(route('alumno.index'));

    // 4. Verificar que los datos se hayan guardado en la base de datos.
    $this->assertDatabaseHas('alumnos', [
        'codigo' => $datos_alumno['codigo'],
        'correo' => $datos_alumno['correo'],
    ]);
    
    // 5. Opcional: Verificar que el nuevo alumno aparece en el listado.
    $this->get(route('alumno.index'))
        ->assertSee($datos_alumno['nombre']);
});

test('verifica errores de validacion al crear alumno', function () {
    // 1. Crear un conjunto de datos intencionalmente inválidos.
    $datos_invalidos = [
        'codigo'            => '12345', // Demasiado corto, quizás no cumple unique
        'nombre'            => '',      // Falla 'required'
        'correo'            => 'not-an-email', // Falla 'email'
        'fecha_nacimiento'  => '2025-01-01', // Podría fallar una regla 'before:today' si la tuvieras
        'sexo'              => 'O',       // Falla 'in:M,F'
        'carrera'           => '',      // Falla 'required'
    ];

    // 2. Simular el envío de un formulario POST con datos inválidos.
    $this->post(route('alumno.store'), $datos_invalidos)
        // 3. Verificar que la respuesta es un error de validación (código 302 o 422 si es una API).
        ->assertStatus(302) 
        // 4. Verificar que los campos específicos tengan errores.
        ->assertInvalid(['nombre', 'correo', 'sexo', 'carrera']); 
        // Nota: 'codigo' podría fallar 'unique' o 'required|max', 'fecha_nacimiento' puede fallar 'date'.

    // 5. Verificar que NO se haya guardado ningún registro en la base de datos.
    $this->assertDatabaseMissing('alumnos', $datos_invalidos);
});

test('el correo y el codigo deben ser unicos', function () {
    // 1. Crear un alumno válido para ocupar el correo y el código.
    $alumnoExistente = Alumno::factory()->create();

    // 2. Crear datos de un nuevo alumno que intenta usar el mismo código y correo.
    $datosDuplicados = Alumno::factory()->make([
        'codigo' => $alumnoExistente->codigo,
        'correo' => $alumnoExistente->correo,
    ])->toArray();

    // 3. Enviar los datos duplicados.
    $this->post(route('alumno.store'), $datosDuplicados)
        // 4. Verificar que la validación falle.
        ->assertStatus(302)
        // 5. Verificar que los mensajes de error sean específicos para 'unique'.
        ->assertInvalid(['codigo', 'correo']);

    // 6. Verificar que el duplicado NO se haya guardado.
    $this->assertDatabaseCount('alumnos', 1); // Solo debe existir el primero.
});
