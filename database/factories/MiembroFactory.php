<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\miembro>
 */
class MiembroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            "nombre"=>$this->faker->name(),
            "cod"=>$this->faker->unique()->numberBetween(0,666),
            "fecha_entrada"=>$this->faker->date(),
            "rango"=>$this->faker->numberBetween(1,5)
        ];
    }
}
