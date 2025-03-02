<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    /**
     * Get all categories in a nested structure.
     */
    public function allNested(): array;
}