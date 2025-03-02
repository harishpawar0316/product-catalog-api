<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'sku' => $this->faker->unique()->bothify('SKU-####-???'),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'category_id' => function() {
                return Category::inRandomOrder()->first()->id ?? 
                    Category::factory()->create()->id;
            },
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}