<?php

namespace App\Services;
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
}
