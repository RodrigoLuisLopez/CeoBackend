<?php

namespace Database\Factories;

use App\Models\Comentable;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comentable_id' => $this->faker->randomDigitNotNull,
        'comentable_type' => $this->faker->word,
        'comentario' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
