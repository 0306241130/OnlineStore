<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //


    public function index()
    {
        // Lấy sản phẩm mới nhất, phân trang mỗi trang 10 sản phẩm
        // Eloquent tự động bỏ qua các sản phẩm đã bị xóa tạm (Soft Deleted)
        $products = Product::with('category')->latest()->paginate(10);

        // return view('products.index', compact('products'));
        return view('admin.index', compact('products'));
    }
    /**
     * 2. Giao diện Form thêm mới
     */
    public function create()
    {

        return view('admin.create');
    }

    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName() . " - Online Store";
        $viewData["subtitle"] = $product->getName() . " - Thông tin sản phẩm.";
        $viewData['product'] = $product;
        return view("product.show")->with('viewData', $viewData);
    }
    /**
     * 3. Xử lý lưu sản phẩm mới vào CSDL
     */
    public function store(Request $request)
    {
        // Validate dữ liệu...
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
        // Lấy thông tin user đang đăng nhập hiện tại

        $currentUser = auth()->user();
        // Thêm sản phẩm kèm theo user_id
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => $currentUser->id, // Tự động gán ID người tạo
        ]);
        return redirect()->route('products.index')->with('success', 'Đã thêm
    sản phẩm thành công!');
    }

    /**
     * 4. Giao diện Form chỉnh sửa
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    /**
     * 5. Xử lý cập nhật dữ liệu sản phẩm
     */
    public function update(StoreProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());
        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }
    /**
     * 6. Xóa tạm thời sản phẩm (Đưa vào thùng rác)
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete(); // Do có SoftDeletes, hàm này sẽ nạp ngày vào cột deleted_at
        return redirect()->route('products.index')->with('success', 'Đã chuyển sản phẩm vào thùng rác!');
    }

    /**
     * 7. Hiển thị danh sách sản phẩm trong Thùng rác
     */
    public function trash()
    {
        // onlyTrashed() chỉ lấy ra các bản ghi có deleted_at KHÁC null
        $products = Product::onlyTrashed()->latest()->paginate(10);
        return view('admin.trash', compact('products'));
    }
    /**
     * 8. Khôi phục sản phẩm từ thùng rác
     */
    public function restore(string $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore(); // Đặt cột deleted_at về lại null
        return redirect()->route('products.trash')->with('success', 'Khôi phục sản phẩm thành công!');
    }
    /**
     * 9. Xóa vĩnh viễn sản phẩm khỏi CSDL
     */
    public function forceDelete(string $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete(); // Xóa hoàn toàn bản ghi khỏi ổ đĩa
        return redirect()->route('products.trash')->with('success', 'Đã xóa  vĩnh viễn sản phẩm khỏi hệ thống!');
    }
}
