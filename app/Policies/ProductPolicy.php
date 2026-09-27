<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    // Quyền xem danh sách: Mọi User đăng nhập đều được phép
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    // Quyền xem chi tiết: Mọi User đăng nhập đều được phép
    public function view(User $user, Product $product): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    // Quyền thêm mới: Chỉ tài khoản có role là 'admin'
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    // Quyền cập nhật (Sửa): Chỉ tài khoản có role là 'admin'
    public function update(User $user, Product $product): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    // Quyền xóa mềm: Chỉ tài khoản có role là 'admin'
    public function delete(User $user, Product $product): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    // Quyền khôi phục: Chỉ tài khoản có role là 'admin'
    public function restore(User $user, Product $product): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // Quyền xóa xóa cứng: Chỉ tài khoản có role là 'admin'
    public function forceDelete(User $user, Product $product): bool
    {
        return $user->role === 'admin';
    }
}
