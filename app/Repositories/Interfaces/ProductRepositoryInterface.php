<?php

namespace App\Repositories\Interfaces;

use App\DAO\ProductDAO;

interface ProductRepositoryInterface
{
    public function findById(int $id): ?ProductDAO;
    public function paginate(int $perPage = 10, array $filters = []);
    public function create(array $data): ProductDAO;
    public function update(int $id, array $data): ProductDAO;
    public function delete(int $id): bool;
}