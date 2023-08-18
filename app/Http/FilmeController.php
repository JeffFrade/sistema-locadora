<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\FilmeService;
use App\Services\CategoriaService;
use Illuminate\Http\Request;
use App\Exceptions\FilmeNotFoundException;

class FilmeController extends Controller
{
    private $filmeService;
    private $categoriaService;

    public function __construct(FilmeService $filmeService, CategoriaService $categoriaService)
    {
        $this->filmeService = $filmeService;
        $this->categoriaService = $categoriaService;
    }

    public function index(Request $request)
    {
        $params = $request->all();

        $filmes = $this->filmeService->index($params);

        return view('filme.index', compact('filmes'));
    }

    public function create()
    {
        $categorias = $this->categoriaService->getAll();

        return view('filme.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $params = $this->toValidate($request);

        $this->filmeService->store($params);

        return redirect(route('dashboard.filmes.index'))
            ->with('message', 'Filme cadastrado com sucesso!');
    }

    public function edit(int $id)
    {
        try {
            $filme = $this->filmeService->edit($id);
            $categorias = $this->categoriaService->getAll();

            return view('filme.edit', compact('filme', 'categorias'));
        } catch (FilmeNotFoundException $e) {
            return redirect(route('dashboard.filmes.index'))
                ->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $params = $this->toValidate($request);

            $this->filmeService->update($params, $id);

            return redirect(route('dashboard.filmes.index'))
                ->with('message', 'Filme editado com sucesso!');
        } catch (FilmeNotFoundException $e) {
            return redirect(route('dashboard.filmes.index'))
                ->with('error', $e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $this->filmeService->delete($id);

            return $this->successResponse('Filme excluído com sucesso!');
        } catch (FilmeNotFoundException $e) {
            return $this->errorResponse($e);
        }
    }

    protected function toValidate(Request $request)
    {
        $toValidateArr = [
            'titulo' => 'required|max:150',
            'lancamento' => 'required|digits:4|numeric',
            'id_categoria' => 'required'
        ];

        return $this->validate($request, $toValidateArr);
    }
}

