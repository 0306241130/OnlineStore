<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // Import class này
use Illuminate\Support\Facades\DB; // Import Facade DB
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Ép hiệu ứng phân trang sử dụng cấu trúc HTML của Bootstrap 5
        Paginator::useBootstrapFive();
        // CẤU HÌNH LẮNG NGHE TRUY VẤN SQL (Chỉ chạy ở môi trườnglocal/dev)
        if (config('app.env') === 'local') {
            DB::listen(function ($query) {
                // Ghi câu lệnh SQL kèm thời gian chạy vào file laravel.log
                Log::info("SQL: " . $query->sql . " | Bindings: " .
                    json_encode($query->bindings));
            });
        }
    }
}
