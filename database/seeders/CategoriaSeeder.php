<?php

namespace Database\Seeders;

use App\Repositories\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::factory(250)->create();
    }
}
