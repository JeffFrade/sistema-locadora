<?php

namespace App\Services;
use App\Exceptions\ClienteNotFoundException;
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
        $search = $data['search'] ?? '';
        $status = $data['status'] ?? null;

        return $this->clienteRepository->index($search, $status);
    }

    public function edit(int $id)
    {
        $cliente = $this->clienteRepository->findFirst('id', $id);

        if (empty($cliente)) {
            throw new ClienteNotFoundException('Cliente inexistente');
        }

        return $cliente;
    }

    public function delete(int $id)
    {
        $this->edit($id);
        $this->clienteRepository->delete($id);
    }
}
