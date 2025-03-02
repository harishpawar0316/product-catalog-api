<?php

namespace App\DAO;

class ProductDAO
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $description,
        public string $sku,
        public float $price,
        public int $category_id,
        public string $created_at,
        public string $updated_at
    ) {}
}