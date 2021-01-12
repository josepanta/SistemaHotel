<?php

namespace Database\Factories;

use App\Models\Habitacione;
use Illuminate\Database\Eloquent\Factories\Factory;

class HabitacioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Habitacione::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estado' => $this->faker->randomElement(['ocupada', 'libre', 'mantenimiento']),
            'tipo_habitacion_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
