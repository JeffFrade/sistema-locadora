<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\FilmeService;
use App\Services\CategoriaService;
use Illuminate\Http\Request;

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

    protected function toValidate(Request $request)
    {
        $toValidateArr = [
            'titulo' => 'required|max:150',
        ];

        return $this->validate($request, $toValidateArr);
    }

}
