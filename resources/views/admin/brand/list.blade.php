@extends('admin.layouts.app')

@section('admin-content')
<div class="container-fluid px-4 container-brand">
    <div style="margin: auto; margin-top: 20px; text-align: center;">
        <h3>Thương hiệu</h3>
    </div>
    <!-- Nơi hiển thị bảng và phân trang -->
    <p style="text-align: right; color: red;">Hiển thị thương hiệu</p>
    <table class="table" style="margin-top: 20px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên thương hiệu</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <!-- Hiển thị dữ liệu mẫu -->
            <tr>
                <td scope="row">1</td>
                <td>Thương hiệu A</td>
                <td>Mô tả thương hiệu A</td>
                <td>
                    <a href="#" style="display: inline; margin-right: 10px;"><i class="fas fa-edit"></i></a>
                    <button onclick='return confirm("Bạn có chắc chắn muốn xóa thương hiệu này?")'><i style="color: red" class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
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