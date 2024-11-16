@extends('admin.layouts.app')

@section('admin-content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container-fluid px-4 container-brand">
    <div style="margin: auto; margin-top: 20px; text-align: center;">
        <h3>Thương hiệu</h3>
    </div>
    <table class="table" style="margin-top: 20px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên thương hiệu</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <!-- Hiển thị dữ liệu mẫu -->
            @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>
                    <!-- Nút Sửa -->
                    <a href="{{ route('brand.edit', $brand->id) }}" style="display: inline; margin-right: 10px;">
                        <i class="fas fa-edit"></i>
                    </a>
                    <!-- Nút Xóa -->
                    <form action="{{ route('brand.delete', $brand->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick='return confirm("Bạn có chắc chắn muốn xóa thương hiệu này?")' style="border: none; background: none;">
                            <i style="color: red" class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12">
            <div class="product-pagination-container">
                <!-- Hiển thị các nút phân trang mẫu -->
                <a class="pagination-link" href="#">1</a>
                <a class="pagination-link active" href="#">2</a>
                <a class="pagination-link" href="#">3</a>
            </div>
        </div>
    </div>
</div>
@endsection