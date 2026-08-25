<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Random 1 cụm từ gồm 2 chữ
        $name = fake()->unique()->words(2, true);
        return [
            //
            'name' => ucfirst($name), // Viết hoa chữ cái đầu
            'slug' => Str::slug($name),
        ];
    }
}
