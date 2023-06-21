<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Models\Categoria;

class CategoriaRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Categoria();
    }

    public function index(string $search = '')
    {
        $model = $this->model;

        if (!empty($search)) {
            $model = $model->where('categoria', 'LIKE', '%' . $search . '%');
        }

        return $model->simplePaginate();
    }
}
