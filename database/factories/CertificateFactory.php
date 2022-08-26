<?php

namespace Database\Factories;

use App\Models\Admin\Event;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'detalle' => $this->faker->paragraph(1),
            'id_evento' => Event::all()->random()->id,
        ];
    }
}
