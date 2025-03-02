<?php

namespace App\DAO;

class CategoryDAO
{
    public function __construct(
        public ?int $id,
        public string $name,
        public ?int $parent_category_id,
        public ?array $children = []
    ) {}
}