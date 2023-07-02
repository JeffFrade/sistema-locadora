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


}
