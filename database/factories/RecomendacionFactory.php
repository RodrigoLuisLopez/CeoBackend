<?php

namespace Database\Factories;

use App\Models\Recomendacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecomendacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recomendacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nota' => $this->faker->word,
        'recomendador_id' => $this->faker->randomDigitNotNull,
        'recomendado_id' => $this->faker->randomDigitNotNull,
        'alcance_id' => $this->faker->randomDigitNotNull,
        'giro_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
