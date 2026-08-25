<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // 1. Tạo 10 danh mục
        Category::factory(10)->create();
        $this->command->info('Đã tạo 10 Danh mục!');
        // 2. Tạo 50 sản phẩm (Factory của Product sẽ tự bốc ngẫu nhiên ID của 10 danh mục trên)
        Product::factory(50)->create();
        $this->command->info('Đã tạo 50 Sản phẩm!');
    }
}
