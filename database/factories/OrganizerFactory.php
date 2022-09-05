<?php

namespace Database\Factories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizerFactory extends Factory
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
            'detalle'=> $this->faker->paragraph(1), 
            'province_id' => Province::all()->random()->id
        ];
    }
}
