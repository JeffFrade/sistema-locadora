<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Repositories\Models\Filme>
 */
class FilmeFactory extends Factory
{
    public $model = \App\Repositories\Models\Filme::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->name(),
            'lancamento' => $this->faker->year(),
            'disponivel' => random_int(0, 1),
            'id_categoria' => random_int(1, 10)
        ];
    }
}
