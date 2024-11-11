@extends('admin.layouts.app')

@section('admin-content')
<div class="container-fluid px-4 container-product">
    <div style="margin: auto; margin-top: 20px; text-align: center;">
        <h3>Sản phẩm</h3>
    </div>
    <p style="text-align: right; color: red;">Hiển thị sản phẩm</p>
    <table class="table" style="margin-top: 20px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Thương hiệu</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Chi tiết</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Xuất xứ</th>
                <th scope="col">Bộ sưu tập</th>
                <th scope="col">Phát hành</th>
                <th scope="col">Nồng độ</th>
                <th scope="col">Nhà pha chế</th>
                <th scope="col">Nhóm hương</th>
                <th scope="col">Phong cách</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col" style="width: 90px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->brand->name ?? 'Chưa xác định' }}</td>
                <td>{{ $product->category->name ?? 'Chưa xác định' }}</td>
                <td class="details-cell">{{ $product->details }}</td>
                <td><img class="product-img" src="{{ asset('storage/manual/product/' . $product->image_1) }}" alt=""></td>
                <td>{{ $product->origin }}</td>
                <td>{{ $product->collection }}</td>
                <td>{{ $product->rel }}</td>
                <td>{{ $product->concentration }}</td>
                <td>{{ $product->fragrance_group }}</td>
                <td>{{ $product->style }}</td>
                <td>{{ $product->perfumer }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <a href="">
                        <button class="btn btn-primary">Sửa</button>
                    </a>
                    <form action="" method="POST" style="display:inline;">
                        <!-- @csrf
                        @method('DELETE') -->
                        <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12">
            <div class="product-pagination-container">
                
            </div>
        </div>
    </div>
</div>
@endsection
