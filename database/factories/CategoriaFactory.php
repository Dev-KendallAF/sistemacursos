<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement(['Programacion','Desarollo Web','Base de Datos','Contabilidad','Gestion de Proyectos','Mecanica','Electronica','Marketing','Administracion','Secretariado','Idiomas','Diseño','Negocios','Analisis de Datos','Computacion','Cloud Computing','Ciberseguridad'])
        ];
    }
}
