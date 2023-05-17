<?php

namespace App\Services;

use App\Exceptions\ClienteNotFoundException;
use App\Helpers\StringHelper;
use App\Repositories\ClienteRepository;

class ClienteService
{
    private $clienteRepository;

    public function __construct()
    {
        $this->clienteRepository = new ClienteRepository();
    }

    public function index(array $data = [])
    {
        $search = StringHelper::clearString($data['search'] ?? '');
        $status = $data['status'] ?? null;

        return $this->clienteRepository->index($search, $status);
    }

    public function store(array $data)
    {
        $this->clienteRepository->create($data);
    }

    public function edit(int $id)
    {
        $cliente = $this->clienteRepository->findFirst('id', $id);

        if (empty($cliente)) {
            throw new ClienteNotFoundException('Cliente inexistente.');
        }

        return $cliente;
    }

    public function update(array $data, int $id)
    {
        $this->edit($id);
        $this->clienteRepository->update($data, $id);
    }

    public function delete(int $id)
    {
        $this->edit($id);
        $this->clienteRepository->delete($id);
    }
}
