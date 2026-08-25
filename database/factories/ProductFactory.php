<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //// Random lấy ID của một danh mục đã tồn tại trong bảng categories
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'name' => fake()->sentence(3), // Tên sản phẩm dài khoảng 3 từ,
            'price' => fake()->randomFloat(2, 100, 5000), // Giá ngẫu nhiên 100 – 5000,
            'stock_quantity' => fake()->numberBetween(1, 100), // Tồn kho từ 1 - 100
            'description' => fake()->paragraph(), // 1 đoạn văn mô tả
        ];
    }
}
