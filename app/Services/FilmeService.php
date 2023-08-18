<?php

namespace App\Services;

use App\Repositories\FilmeRepository;
use App\Exceptions\FilmeNotFoundException;

class FilmeService
{
    private $filmeRepository;

    public function __construct()
    {
        $this->filmeRepository = new FilmeRepository();
    }

    public function index(array $data = [])
    {
        $search['titulo'] = $data['search-titulo'] ?? '';
        $search['lancamento'] = $data['search-lancamento'] ?? '';

        return $this->filmeRepository->index($search['titulo'], $search['lancamento']);
    }

    public function store(array $data)
    {
        $this->filmeRepository->create($data);
    }

    public function edit(int $id)
    {
        $filme =  $this->filmeRepository->findFirst('id', $id);

        if (empty($filme)) {
            throw new FilmeNotFoundException('Filme inexistente.');
        }

        return $filme;
    }

    public function update(array $data, int $id)
    {
        $this->edit($id);
        $this->filmeRepository->update($data, $id);
    }

    public function delete(int $id)
    {
        $this->edit($id);
        $this->filmeRepository->delete($id);
    }
}
