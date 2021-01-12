<?php

namespace Database\Factories;

use App\Models\ReservaHabitacione;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaHabitacioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReservaHabitacione::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),

            'habitacion_id' => $this->faker->numberBetween(1, 5),
            'reserva_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
