<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $clientes = $this->clienteService->index($params);

        return view('cliente.index', compact('clientes', 'params'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(int $id)
    {

    }

    public function update(Request $request, int $id)
    {

    }

    public function delete(int $id)
    {

    }
}
