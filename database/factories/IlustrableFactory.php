<?php

namespace Database\Factories;

use App\Models\Ilustrable;
use Illuminate\Database\Eloquent\Factories\Factory;

class IlustrableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ilustrable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ilustrable_id' => $this->faker->randomDigitNotNull,
        'ilustrable_type' => $this->faker->word,
        'url' => $this->faker->word,
        'urls' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
