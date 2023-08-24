<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Models\Filme;

class FilmeRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Filme();
    }

    public function index(string $search = '', string $lancamento = '')
    {
        $model = $this->model->with('categorias');

        if (!empty($lancamento)) {
            $model = $model->where('lancamento', $lancamento);
        }

        if (!empty($search)) {
            $model = $model->where('titulo', 'LIKE', '%' . $search . '%');
        }

        return $model->simplePaginate();
    }
}
