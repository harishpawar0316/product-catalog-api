<?php

namespace App\Repositories;

use App\DAO\CategoryDAO;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Get all categories in a nested structure.
     */
    public function allNested(): array
    {
        $categories = Category::with('children')->whereNull('parent_category_id')->get();
        
        return $this->buildNestedStructure($categories);
    }

    /**
     * Recursively build the nested structure.
     */
    private function buildNestedStructure($categories): array
    {
        return $categories->map(function ($category) {
            return new CategoryDAO(
                $category->id,
                $category->name,
                $category->parent_category_id,
                $this->buildNestedStructure($category->children)
            );
        })->toArray();
    }
}