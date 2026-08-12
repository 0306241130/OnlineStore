<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //


    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Stroe";
        $viewData['subtitle'] = 'Danh Sách Sản Phẩm';
        $viewData['products'] = Product::all();
        return view('product.index')->with('viewData', $viewData);
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

    public function store(Request $request)
    {
        $name = $request->input('product_name');
        $price = $request->input('product_price');

        $imagepath = "";
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $imagepath = $file->store('product', 'public');
        }

        return redirect()->route('product.create')
            ->with('success', "Đã thêm sản phẩm: $name với giá $price VNĐ")
            ->with('image_path', $imagepath);
    }

    public function create()
    {
        return view('product.create');
    }
}
