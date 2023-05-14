<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Models\Cliente;

class ClienteRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Cliente();
    }

    public function index(string $search = '', ?bool $status = null)
    {
        $model = $this->model;

        if (!empty($status)) {
            $model = $model->where('status', $status);
        }

        if (!empty($search)) {
            $model = $model->where('nome', 'LIKE', '%' . $search . '%')
                ->orWhere('cpf', 'LIKE', '%' . $search . '%')
                ->orWhere('contato', 'LIKE', '%' . $search . '%');
        }

        return $model->simplePaginate();
    }
}
