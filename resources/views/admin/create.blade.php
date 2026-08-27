@extends('layouts.admin')
@section('title','Thêm sản phẩm')

@section('content')
<h2>Thêm sản phẩm mới</h2>

<a href="{{ route('products.index') }}" class="btn btn-secondary mb-
3">Quay lại danh sách</a>

<form action="{{ route('products.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên sản phẩm</label>
        <input type="text" name="name" class="form-label form-control
@error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name') <div class="invalid-feedback">{{ $message}}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Giá bán</label>
        <input type="number" name="price" class="form-control
@error('price') is-invalid @enderror" value="{{ old('price') }}">
        @error('price') <div class="invalid-feedback">{{ $message}}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Số lượng tồn kho</label>
        <input type="number" name="stock_quantity" class="form-control
@error('stock_quantity') is-invalid @enderror" value="{{old('stock_quantity') }}">
        @error('stock_quantity') <div class="invalid-feedback">{{$message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Mô tả sản phẩm</label>
        <textarea name="description" class="form-control" rows="3">{{old('description') }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
</form>
@endsection