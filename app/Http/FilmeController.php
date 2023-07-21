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

        $categorias = $this->categoriaService->getAll();

        return view('filme.index', compact('filmes', 'params', 'categorias'));
    }

    public function create()
    {
        return view('filme.create');
    }

    public function store(Request $request)
    {
        $params = $request->all();

        $titulo = $this->toValidate($request);  //valida somente o título
        $params['titulo'] = $titulo['titulo'];  // devolve o título aos params

        $this->filmeService->store($params);

        return redirect(route('dashboard.filmes.index'))
            ->with('message', 'Filme cadastrado com sucesso!');
    }

    public function edit(int $id)
    {
        try {
            $filme = $this->filmeService->edit($id);
            $categoria = $this->categoriaService->getAll();
        } catch (FilmeNotFoundException $e) {
            return redirect(route('dashboard.filmes.index'))
                ->with('error', $e->getMessage());
        }

        return view('filme.edit', compact('filme', 'categoria'));
    }

    public function update(Request $request, int $id)
    {
        $params = $request->all();

        $titulo = $this->toValidate($request);
        $params['titulo'] =  $titulo['titulo'];

        $idCategoria = $params['id_categoria'];

        $categoria = $this->categoriaService->find($idCategoria);

        $params['categoria'] = $categoria[0]['categoria'];

        try {

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
        ];

        return $this->validate($request, $toValidateArr);
    }

}
