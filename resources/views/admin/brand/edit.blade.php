@extends('admin.layouts.app')

@section('admin-content')
<div class="container-fluid px-4">
    <div class="container form-text">
        <div class="row">
            <div class="col-sm-12">
                <h3 style="text-align: center; margin-top: 20px;">Sửa Thương Hiệu</h3>
            </div>
            <div class="col-sm-12">
                <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="txtname">Tên thương hiệu</label>
                        <input class="form-control" id="txtname" type="text" name="name" value="{{ $brand->name }}">
                    </div>
                    
                    <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                    <a href="{{ route('admin.listBrand') }}" class="btn btn-danger">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
