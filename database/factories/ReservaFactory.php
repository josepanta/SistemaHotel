<?php

namespace Database\Factories;

use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reserva::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estado' => $this->faker->randomElement(['reservada', 'check-in', 'check_out', 'cancelada']),

            'tipo_reserva_id' => $this->faker->numberBetween(1, 5),
            'user_id'=> $this->faker->numberBetween(1, 10),
        ];
    }
}
