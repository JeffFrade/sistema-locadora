<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\CategoriaService;
use Illuminate\Http\Request;
use App\Exceptions\CategoriaNotFoundException;

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

    public function edit(int $id)
    {
        try {
            $categoria = $this->categoriaService->edit($id);

            return view('categoria.edit', compact('categoria'));
        } catch (CategoriaNotFoundException $e) {
            return redirect(route('dashboard.categorias.index'))
                ->with('error', $e->getMessage());
        }

    }

    public function update(Request $request, int $id)
    {
        try {
            $params = $this->toValidate($request, $id);
            $this->categoriaService->update($params, $id);

            return redirect(route('dashboard.categorias.index'))
                ->with('message', 'Categoria editada com sucesso!');
        } catch (CategoriaNotFoundException $e) {
            return redirect(route('dashboard.categorias.index'))
                ->with('error', $e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $this->categoriaService->delete($id);

            return $this->successResponse('Categoria excluída com sucesso!');
        } catch (CategoriaNotFoundException $e) {
            return $this->errorResponse($e);
        }
    }

    protected function toValidate(Request $request)
    {
        $toValidateArr = [
            'categoria' => 'required|max:50'
        ];

        return $this->validate($request, $toValidateArr);
    }
}
