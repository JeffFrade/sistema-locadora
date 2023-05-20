<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Repositories\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Repositories\Models\Cliente>
 */
class CategoriaFactory extends Factory
{
    public $model = Categoria::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categoria' => $this->faker->word()
        ];
    }
}
