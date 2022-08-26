<?php

namespace Database\Factories;

use App\Models\Admin\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(),
            'id_evento'=> Event::all()->random()->id
        ];
    }
}
