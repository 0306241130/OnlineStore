<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
                        // Khóa ngoại liên kết tới bảng categories
                // 'constrained()' tự động hiểu là liên kết với id của bảngcategories
                // 'cascadeOnDelete()' tự động xóa sản phẩm nếu danh mục bị xóa
                $table->id();
                $table->foreignId('category_id')->constrained()->cascadeOnDelete();
                $table->string('name'); // Tên sản phẩm
                $table->decimal('price', 12, 2); // Giá bán (Tối đa 12 chữ số, 2 sốthập phân)
                $table->integer('stock_quantity')->default(0); // Số lượng tồn kho
                $table->text('description')->nullable(); // Mô tả (có thể để trống)
                 $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
