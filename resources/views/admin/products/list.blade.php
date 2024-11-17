@extends('admin.layouts.app')

@section('admin-content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container-fluid px-4 container-product">
    <div style="margin: auto; margin-top: 20px; text-align: center;">
        <h3>Sản phẩm</h3>
    </div>
    <table class="table" style="margin-top: 20px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Thương hiệu</th>
                <th scope="col">Danh mục</th>
                <!-- Cột Chi tiết sẽ ẩn mặc định -->
                <th class="detail-column" scope="col" style="display: none;">Chi tiết</th>
                <!-- Các cột còn lại -->
                <th class="other-column" scope="col">Xuất xứ</th>
                <th class="other-column" scope="col">Bộ sưu tập</th>
                <th class="other-column" scope="col">Phát hành</th>
                <th class="other-column" scope="col">Nồng độ</th>
                <th class="other-column" scope="col">Nhà pha chế</th>
                <th class="other-column" scope="col">Nhóm hương</th>
                <th class="other-column" scope="col">Phong cách</th>
                <th class="other-column" scope="col">Giá</th>
                <th class="other-column" scope="col">Số lượng</th>
                <th scope="col" style="width: 90px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img class="product-img" src="{{ asset('storage/manual/product/'. $product->image_1) }}" alt=""></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->brand->name ?? 'Chưa xác định' }}</td>
                <td>{{ $product->category->name ?? 'Chưa xác định' }}</td>
                <!-- Cột Chi tiết sẽ ẩn mặc định -->
                <td class="detail-column" style="display: none;">{{ $product->details }}</td>
                <!-- Các cột còn lại -->
                <td class="other-column">{{ $product->origin }}</td>
                <td class="other-column">{{ $product->collection }}</td>
                <td class="other-column">{{ $product->rel }}</td>
                <td class="other-column">{{ $product->concentration }}</td>
                <td class="other-column">{{ $product->perfumer }}</td>
                <td class="other-column">{{ $product->fragrance_group }}</td>
                <td class="other-column">{{ $product->style }}</td>
                <td class="other-column">{{ $product->price }}</td>
                <td class="other-column">{{ $product->quantity }}</td>
                <td>
                    <div class="d-flex mt-1">
                        <button class="toggle-details-btn btn btn-info flex-fill mx-1">Chi tiết</button>
                        <a href="{{ route('products.edit', $product->id) }}">
                            <button class="btn btn-primary flex-fill mx-1">Sửa</button>
                        </a>
                        <form action="{{ route('products.delete', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger flex-fill mx-1" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <div class="pagination-container">
        {{ $products->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const toggleButtons = document.querySelectorAll('.toggle-details-btn');
    const detailColumns = document.querySelectorAll('.detail-column');
    const otherColumns = document.querySelectorAll('.other-column');

    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const isDetailVisible = detailColumns[0].style.display !== 'none';
            
            // Hiển thị/Ẩn tất cả các cột chi tiết
            detailColumns.forEach(column => {
                column.style.display = isDetailVisible ? 'none' : 'table-cell';
            });
            
            // Hiển thị/Ẩn tất cả các cột còn lại
            otherColumns.forEach(column => {
                column.style.display = isDetailVisible ? 'table-cell' : 'none';
            });
            
            // Cập nhật văn bản nút cho tất cả các dòng
            toggleButtons.forEach(btn => {
                btn.textContent = isDetailVisible ? 'Chi tiết' : 'Ẩn';
            });
        });
    });
});

</script>

@endsection