<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Repositories\Models\User::factory()->create();
        \App\Repositories\Models\Cliente::factory(250)->create();
        $this->call(CategoriaSeeder::class);
    }
}
