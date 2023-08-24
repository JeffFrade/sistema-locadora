<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Repositories\Models\Filme;


class CategoriaFilmeController extends Controller
{
    public function atualizarCategoriaFilme()
    {
        $filmes = Filme::all();

        foreach ($filmes as $filme) {
            $categoriaIds = $filme->categorias->pluck('id')->toArray();
            $filme->categorias()->sync($categoriaIds);
        }

        return "Tabela categoria_filme atualizada com sucesso!";
    }
}
