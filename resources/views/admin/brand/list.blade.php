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
                    <a href="{{ route('brand.edit', $brand->id) }}">
                        <button class="btn btn-primary flex-fill mx-1">Sửa</button>
                    </a>
                    <form action="{{ route('brand.delete', $brand->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger flex-fill mx-1" onclick="return confirm('Bạn có chắc chắn muốn xóa nhãn hàng này không?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-container">
        {{ $listBrand->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection