<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public static  $products = [
        [
            "id" => "1",
            "name" => "TV",
            "description" => "Best TV",
            "image" => "TV.webp",
            "price" => "2000"
        ],
        ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "image" =>
        "iphone.webp", "price" => "1500"],
        [
            "id" => "3",
            "name" => "Chromecast",
            "description" => "Best Chromecast",
            "image" => "chromecast.webp",
            "price" => "300"
        ],
        ["id" => "4", "name" => "Glasses", "description" => "Best Glasses", "image" =>
        "Glasses.webp", "price" => "500"]
    ];

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Stroe";
        $viewData['subtitle'] = 'Danh Sách Sản Phẩm';
        $viewData['products'] = $this::$products;
        return view('product.index')->with('viewData', $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = ProductController::$products[$id - 1];
        $viewData['title'] = $product['name'] . ' - Online Store';
        $viewData['subtitle'] = $product['name'] . '- Thông tin sản phẩm';
        $viewData['product'] = $product;
        return view("product.show")->with('viewData', $viewData);
    }
}
