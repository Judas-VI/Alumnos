<?php

namespace Database\Factories;

use App\Models\Alumno; 
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;

    public function definition(): array
    {
        // Genera un codigo de 8 dígitos unico.
        $codigo = $this->faker->unique()->numerify('########');
        
        // Define las opciones de sexo para que elija aleatoriamente.
        $sexo = $this->faker->randomElement(['M', 'F']);
        
        // Define las opciones de carrera
        $carreras = ['Ingeniería en Sistemas', 'Derecho', 'Administración de Empresas', 'Medicina', 'Arquitectura'];

        return [
            // El campo 'codigo' es unico
            'codigo' => $codigo, 

            // Genera un nombre y apellido aleatorio
            'nombre' => $this->faker->firstName($sexo == 'M' ? 'male' : 'female') . ' ' . $this->faker->lastName,
            
            // Genera un correo único basado en el código
            'correo' => $this->faker->unique()->safeEmail(),
            
            // Genera una fecha de nacimiento aleatoria entre 18 y 25 años atras
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-25 years', '-18 years')->format('Y-m-d'),
            
            // Sexo seleccionado
            'sexo' => $sexo,
            
            // Carrera aleatoria
            'carrera' => $this->faker->randomElement($carreras),
        ];
    }
}
