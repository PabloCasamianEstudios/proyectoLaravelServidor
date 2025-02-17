<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\miembro>
 */
class miembroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $sangres = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];

        return [

            "nombre"=>$this->faker->name(),
            "tipo_sangre"=>$this->faker->randomElement($sangres),
            "fecha_entrada"=>$this->faker->date(),
            "rango"=>$this->faker->numberBetween(1,5)
        ];
    }
}
