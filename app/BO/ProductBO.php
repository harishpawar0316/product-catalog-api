<?php

namespace App\BO;

class ProductBO
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $description,
        public string $sku,
        public float $price,
        public int $category_id
    ) {}
}