<?php

namespace Database\Factories;

use App\Models\Admin\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'detalle' => $this->faker->sentence(2),
            'link' => $this->faker->url(),
            'id_evento'=> Event::all()->random()->id
        ];
    }
}
