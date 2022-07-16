<?php

namespace Database\Factories\Admin;

use App\Models\Exhibitor;
use App\Models\Organizer;
use Illuminate\Database\Eloquent\Factories\Factory;


class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'evento' => $this->faker->sentence(),
            'detalle' => $this->faker->paragraphs(1, true),
            'costo_student' => $this->faker->numberBetween(0, 50),
            'costo_prof' => $this->faker->numberBetween(50, 150),
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),
            'imagen' => 'events/' . $this->faker->image(public_path('storage/events'), 640, 480, null, false),
            'link_whatsapp' => $this->faker->url(),
            'link_telegram' => $this->faker->url(),
            'estado'=> $this->faker->randomElement([1, 2]),
            'id_expositor' => Exhibitor::all()->random()->id,
            'id_organizador' => Organizer::all()->random()->id
        ];
    }
}
