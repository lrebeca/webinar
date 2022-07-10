<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExhibitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'suffix' => $this->faker->suffix(),
            'nombre' => $this->faker->name(),
            //'apellido_paterno' => $this->faker->firstNameMale(),
            //'apellido_materno' => $this->faker->firstNameFemale(),
            'email' => $this->faker->unique()->safeEmail(),
            'direccion' => $this->faker->streetAddress(),
            'num_celular' => $this->faker->phoneNumber(8),
            'descripcion' => $this->faker->paragraph(1),
        ];
    }
}
