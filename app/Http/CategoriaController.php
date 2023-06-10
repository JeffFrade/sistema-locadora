<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Exceptions\ClienteNotFoundException;
use App\Helpers\DateHelper;
use App\Helpers\StringHelper;
use App\Services\CategoriaService;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $categorias = $this->categoriaService->index($params);
        return view('categoria.index', compact('categorias', 'params'));
    }

    public function create()
    {
        return view('categoria.create');
    }

    public function store(Request $request)
    {
        $params = $this->toValidate($request);
        $this->categoriaService->store($params);

        return redirect(route('dashboard.categorias.index'))
        ->with('message', 'Categoria cadastrada com sucesso!');
    }

    // public function edit(int $id)
    // {
    //     $cliente = $this->clienteService->edit($id);

    //     return view('cliente.edit', compact('cliente'));
    // }

    // public function update(Request $request, int $id)
    // {
    //     try {
    //         $params = $this->toValidate($request, $id);
    //         $this->clienteService->update($params, $id);

    //         return redirect(route('dashboard.clientes.index'))
    //             ->with('message', 'Cliente editado com sucesso!');
    //     } catch (ClienteNotFoundException $e) {
    //         return redirect(route('dashboard.clientes.index'))
    //             ->with('error', $e->getMessage());
    //     }
    // }

    // public function delete(int $id)
    // {
    //     try {
    //         $this->clienteService->delete($id);

    //         return $this->successResponse('Cliente excluído com sucesso!');
    //     } catch (ClienteNotFoundException $e) {
    //         return $this->errorResponse($e);
    //     }
    // }

    // public function status(int $id)
    // {
    //     try {
    //         $this->clienteService->status($id);

    //         return $this->successResponse('Status do cliente alterado com sucesso!');
    //     } catch (ClienteNotFoundException $e) {
    //         return $this->errorResponse($e);
    //     }
    // }

    protected function toValidate(Request $request, ?int $id = null)
    {

        $toValidateArr = [
            'categoria' => 'required|max:70'
        ];

        return $this->validate($request, $toValidateArr);
    }
}
