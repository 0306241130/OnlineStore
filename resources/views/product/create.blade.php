<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <h2>Thêm sản phẩm </h2>

        @if(session('success'))
        <div class="alert alert-success">
            <strong>Thành công</strong>{{session('success')}}
        </div>
        <br>
        <img src="{{asset('storage/' . session('image_path'))}}" alt="image" style="max-width: 100px; margin-top: 10px; border-radius:
4px;">
        @endif
    </div>
    <form action="{{ route('product.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Tên sản phẩm:</label>
            <input type="text" name="product_name" required
                placeholder="Nhập tên sản phẩm...">
        </div>

        <div class="form-group">
            <label>Giá bán (VNĐ):</label>
            <input type="number" name="product_price" required
                placeholder="Ví dụ: 150000">
        </div>

        <div class="form-group">
            <label>Hình ảnh sản phẩm:</label>
            <input type="file" name="product_image" accept="image/*"
                required>
        </div>
        <button type="submit" class="btn-submit">Lưu Sản Phẩm</button>
    </form>
    </div>

</body>

</html>
</body>

</html>