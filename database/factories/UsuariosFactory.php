<?php

namespace Database\Factories;

use App\Models\Usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuariosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuarios::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
        'edad' => $this->faker->word,
        'direccion' => $this->faker->word,
        'correo' => $this->faker->word,
        'telefono' => $this->faker->word,
        'biografia' => $this->faker->word,
        'facebook' => $this->faker->word,
        'twitter' => $this->faker->word,
        'instagram' => $this->faker->word,
        'estado_id' => $this->faker->randomDigitNotNull,
        'privacidad_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
