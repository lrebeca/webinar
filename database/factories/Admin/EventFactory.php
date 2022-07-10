<?php

namespace Database\Factories\Admin;

use App\Models\Exhibitor;
use App\Models\Unit;
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
            'costo' => $this->faker->numberBetween(0, 200),
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),
            'imagen' => 'events/' . $this->faker->image(public_path('storage/events'), 640, 480, null, false),
            'link_whatsapp' => $this->faker->url(),
            'link_telegram' => $this->faker->url(),
            'estado'=> $this->faker->randomElement([1, 2]),
            'id_expositor' => Exhibitor::all()->random()->id,
            'id_unidad' => Unit::all()->random()->id
        ];
    }
}
