@extends('layouts.admin')
@section('title','Thùng rác')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Thùng rác sản phẩm</h2>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại danh sách</a>

</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>
                <form action="{{ route('products.restore', $product->id) }}" method="POST" class="d-inline">
                    @csrf

                    <button type="submit" class="btn btn-sm btn-success">Khôi phục</button>

                </form>

                <form action="{{ route('products.forcedelete',$product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('CẢNH BÁO: Hành động này sẽ xóa dữ liệu vĩnh viễn và không thể hoàn tác!')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">Xóa vĩnh viễn</button>

                </form>
            </td>
        </tr>
        @empty($products)
        <tr>
            <td colspan="3" class="text-center text-muted">Thùng rác
                trống.</td>
        </tr>
        @endempty
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center mt-4">
    {{ $products->links() }}
</div>
@endsection