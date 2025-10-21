<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use Illuminate\Support\Facades\DB;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Limpieza de la tabla
        // Desactiva las llaves foráneas para poder hacer truncate, luego las reactiva
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 
        Alumno::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('Tabla de alumnos limpiada.');

        // 2. Creación de un Alumno Específico (para pruebas)
        // Puedes definir un alumno con datos fijos que siempre necesitarás para iniciar sesión o hacer pruebas.
        Alumno::create([
            'codigo'            => '10000001',
            'nombre'            => 'Juan Perez (TEST)',
            'correo'            => 'juan.perez@test.com',
            'fecha_nacimiento'  => '1998-05-15',
            'sexo'              => 'M',
            'carrera'           => 'Ingeniería en Sistemas',
        ]);

        $this->command->info('Alumno de prueba "Juan Perez" creado.');

        // 3. Creación de Datos Aleatorios con Factory
        // Creamos 100 alumnos adicionales usando el AlumnoFactory
        Alumno::factory()
              ->count(100)
              ->create();

        $this->command->info('100 alumnos aleatorios creados exitosamente.');

        // 4. Creación de alumnos con un estado específico (ej. solo mujeres)
        // Si tienes estados definidos en tu Factory, puedes usarlos aquí.
        // Si no tienes estados, puedes forzar valores usando make() y create()
        
        Alumno::factory()
              ->count(10)
              ->make([
                  'sexo' => 'F',
                  'carrera' => 'Medicina' // Todos los 10 serán de Medicina y Femeninos
              ])
              ->create();
              
        $this->command->info('10 alumnas de Medicina (F) creadas.');
    }
}
