<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Repositories\Models\Cliente>
 */
class CategoriaFactory extends Factory
{
    public $model = \App\Repositories\Models\Categoria::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'  => $this->faker->randomNumber(7, true),
            'categoria' => $this->faker->word()
        ];
    }
}
