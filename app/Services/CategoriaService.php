<?php

namespace App\Services;

use App\Exceptions\CategoriaNotFoundException;
use App\Repositories\CategoriaRepository;

class CategoriaService
{
    private $categoriaRepository;

    public function __construct()
    {
        $this->categoriaRepository = new CategoriaRepository();
    }

    public function index(array $data = [])
    {
        $search = $data['search'] ?? '';

        return $this->categoriaRepository->index($search);
    }

    public function store(array $data)
    {
        $this->categoriaRepository->create($data);
    }

    public function edit(int $id)
    {
        $categoria =  $this->categoriaRepository->findFirst('id', $id);

        if (empty($categoria)) {
            throw new CategoriaNotFoundException('Categoria inexistente.');
        }

        return $categoria;
    }

    public function update(array $data, int $id)
    {
        $this->edit($id);
        $this->categoriaRepository->update($data, $id);
    }

    public function delete(int $id)
    {
        $this->edit($id);
        $this->categoriaRepository->delete($id);
    }
}
