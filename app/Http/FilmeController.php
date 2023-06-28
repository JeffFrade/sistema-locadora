<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\FilmeService;

class FilmeController extends Controller
{
    private $filmeService;

    public function __construct(FilmeService $filmeService)
    {
        $this->filmeService = $filmeService;
    }



}
