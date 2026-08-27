@extends('layouts.admin')
@section('title','Danh Sách Sản Phẩm')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Quản lý sản phẩm</h2>
    <div>

        <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm sản phẩm</a>

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
            <td>{{ $product->stock_quantity }}</td>
            <td>
                <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                    class="btn btn-sm btn-info">Sửa</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tạm sản phẩm này?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">Xóa</button>

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center mt-4">
    {{ $products->links() }}
</div>
@endsection