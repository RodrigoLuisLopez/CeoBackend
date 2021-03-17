<?php

namespace Database\Factories;

use App\Models\Seguidor;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeguidorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seguidor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'seguido_id' => $this->faker->randomDigitNotNull,
        'seguidor_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
