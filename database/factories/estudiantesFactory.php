<?php

namespace Database\Factories;
use App\Models\estudiantes;
use Illuminate\Database\Eloquent\Factories\Factory;

class estudiantesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = estudiantes::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'direccion' => $this->faker->address(),
            'edad' => $this->faker->randomElement([17,18, 19, 20, 21]),
            'grado' => $this->faker->randomElement(['1 ','2 ', '3', '4']),
        ];
    }
}
