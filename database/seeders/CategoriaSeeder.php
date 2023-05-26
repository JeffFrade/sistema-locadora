<?php

namespace Database\Seeders;

use App\Repositories\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria = new Categoria();
        $categoria->categoria = 'Terror';
        $categoria->save();

        Categoria::create([
            'categoria' => 'Aventura'
        ]);

        // não encontrou a classe DB

        // \DB::table('categorias')->insert([
        //     'categorias' => 'Ação'
        // ]);

    }
}
