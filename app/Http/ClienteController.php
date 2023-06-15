<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Exceptions\ClienteNotFoundException;
use App\Helpers\DateHelper;
use App\Helpers\StringHelper;
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
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $params = $this->toValidate($request);
        $this->clienteService->store($params);

        return redirect(route('dashboard.clientes.index'))
            ->with('message', 'Cliente cadastrado com sucesso!');
    }

    public function edit(int $id)
    {
        $cliente = $this->clienteService->edit($id);

        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, int $id)
    {
        try {
            $params = $this->toValidate($request, $id);
            $this->clienteService->update($params, $id);

            return redirect(route('dashboard.clientes.index'))
                ->with('message', 'Cliente editado com sucesso!');
        } catch (ClienteNotFoundException $e) {
            return redirect(route('dashboard.clientes.index'))
                ->with('error', $e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $this->clienteService->delete($id);

            return $this->successResponse('Cliente excluído com sucesso!');
        } catch (ClienteNotFoundException $e) {
            return $this->errorResponse($e);
        }
    }

    public function status(int $id)
    {
        try {
            $this->clienteService->status($id);

            return $this->successResponse('Status do cliente alterado com sucesso!');
        } catch (ClienteNotFoundException $e) {
            return $this->errorResponse($e);
        }
    }

    protected function toValidate(Request $request, ?int $id = null)
    {
        $request['cpf'] = StringHelper::clearString($request['cpf'] ?? '');
        $request['contato'] = StringHelper::clearString($request['contato'] ?? '');

        $toValidateArr = [
            'nome' => 'required|max:70',
            'cpf' => 'required|size:11|unique:clientes,cpf,' . $id,
            'contato' => 'required|min:10|max:11',
            'data_nascimento' => 'required|date'
        ];

        return $this->validate($request, $toValidateArr);
    }
}
