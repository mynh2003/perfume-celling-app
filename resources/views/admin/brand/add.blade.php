
@extends('admin.layouts.app')

@section('admin-content')

<div class="container-fluid px-4">
    <div class="container form-text">
        <div class="row">
            <div class="col-sm-12">
                <h3 style="margin: auto; margin-top: 20px; text-align: center;">Quản Lý Thương Hiệu</h3>
            </div>
            <div class="col-sm-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="txtname">
                            <span class="title">Tên thương hiệu</span>
                            <span class="required">*</span>
                        </label>
                        <input class="form-control" id="txtname" type="text" name="name" value="">
                        <span class="error-message" style="color: red;"></span>
                    </div>
                    <div class="form-group">
                        <label for="txtdesc">
                            <span class="title">Mô tả thương hiệu</span>
                            <span class="required">*</span>
                        </label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        <span class="error-message" style="color: red;"></span>
                    </div>
                    <button type="submit" class="btn btn-success" name="btnsubmit">Thêm</button>
                    <a href="/BaitaplonPHP/View/product/category.php" class="btn btn-danger">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection