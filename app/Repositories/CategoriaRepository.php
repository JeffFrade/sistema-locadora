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
}
