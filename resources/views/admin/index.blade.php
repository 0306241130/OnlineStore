@extends('layouts.admin')
@section('title','Danh Sách Sản Phẩm')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Quản lý sản phẩm</h2>
    <div>

        <!-- NÚT THÊM SẢN PHẨM -->
        <!-- Sử dụng class Model vì hàm create không cần đối tượng cụ thể -->
        @can('create', App\Models\Product::class)
        <a href="{{ route('products.create') }}" class="btn btn-success mb-3">+
            Thêm Sản Phẩm Mới</a>
        @endcan

        <a href="{{ route('products.trash') }}" class="btn btn-warning">Thùng rác</a>

    </div>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Loại Sản Phẩm</th>
            <th>Số lượng</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ number_format($product->price) }} đ</td>
            <td>{{$product->category?->name ?? "chưa phân loại"}}</td>
            <td>{{ $product->stock_quantity }}</td>
            <td>
                <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                    class="btn btn-sm btn-info">Sửa</a>
                @can('delete', $product)
                <form action="{{ route('products.destroy',$product->id) }}" method="POST" class="d-inline">
                    @csrf

                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Chắc chắn xóa?')">Xóa</button>
                </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center mt-4">
    {{ $products->links() }}
</div>
@endsection