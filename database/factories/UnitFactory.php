<?php

namespace Database\Factories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unidad' => $this->faker->sentence(),
            'descripcion'=> $this->faker->paragraph(1),
            'id_provincia' => Province::all()->random()->id
        ];
    }
}
