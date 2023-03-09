<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin\Event;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sufix'=> $this->faker->randomElement(['Lic.', 'Ing.', 'Doc.', '']),
            'nombre' => $this->faker->firstName(),
            'apellido_paterno' => $this->faker->firstNameMale(),
            'apellido_materno' => $this->faker->firstNameFemale(),
            'email' => $this->faker->unique()->safeEmail(),
            'carnet_identidad' => $this->faker->randomNumber(8),
            'carnet_universitario' => $this->faker->randomNumber(8),
            'carrera'=> $this->faker->randomElement(['Contaduría Pública',
                                                    'Contaduría Pública T.S.',
                                                    'Administración Financiera',
                                                    'Administración Financiera T.S.',
                                                    'Comercio Exterior y Aduanas'
                                                    ]),
            'empleo' => $this->faker->sentence(),
            'n_celular' => $this->faker->phoneNumber(8),
            'n_celular2' => $this->faker->phoneNumber(8),
            'n_deposito' => $this->faker->randomNumber(8),
            'estado'=> $this->faker->randomElement(['estudiante', 'profesional']),
            'pago'=> $this->faker->randomElement(['deposito', 'transferencia']),
            'progreso'=> $this->faker->randomElement(['enviado', 'aprobado', 'rechazado']),
            // 'img_deposito' => 'depositos/'. $this->faker->image(public_path('storage/depositos'), 640, 480, null, false),
            'id_evento' => Event::all()->random()->id
        ];
    }
}
