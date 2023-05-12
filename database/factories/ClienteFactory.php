<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Repositories\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    public $model = \App\Repositories\Models\Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'cpf' => $this->faker->cpf(false),
            'contato' => $this->faker->landlineNumber(false),
            'data_nascimento' => $this->faker->date(),
            'status' => random_int(0, 1)
        ];
    }
}
