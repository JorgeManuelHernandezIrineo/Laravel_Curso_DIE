<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PeliculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombrePelicula'=> fake()->sentence(3),
            'director'=>fake()->name(),
            'duracion'=>fake()->numberBetween(60,200),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
