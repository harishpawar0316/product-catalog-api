<?php

namespace App\Repositories;

use App\DAO\ProductDAO;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function findById(int $id): ?ProductDAO
    {
        $product = Product::find($id);
        return $product ? $this->convertToDAO($product) : null;
    }

    public function paginate(int $perPage = 10, array $filters = [], ?string $search = null)
    {
        $query = Product::query();

        // Apply category filter
        if (isset($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        // Apply search filter
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            });
        }

        return $query->paginate($perPage);
    }

    public function create(array $data): ProductDAO
    {
        $product = Product::create($data);
        return $this->convertToDAO($product);
    }

    public function update(int $id, array $data): ProductDAO
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $this->convertToDAO($product->fresh());
    }

    public function delete(int $id): bool
    {
        return Product::destroy($id);
    }

    private function convertToDAO(Product $product): ProductDAO
    {
        return new ProductDAO(
            $product->id,
            $product->name,
            $product->description,
            $product->sku,
            $product->price,
            $product->category_id,
            $product->created_at->toDateTimeString(),
            $product->updated_at->toDateTimeString()
        );
    }
}