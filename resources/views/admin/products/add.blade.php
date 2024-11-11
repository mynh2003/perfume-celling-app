@extends('admin.layouts.app')

@section('admin-content')
<div class="container-fluid px-4">
    <div class="container form-text">
        <div class="row">
            <div class="col-sm-12">
                <h2 style="margin: auto; margin-top: 20px; text-align: center;">Quản lý sản phẩm</h2>
            </div>
            <div class="col-sm-12">
                <form method="POST" enctype="multipart/form-data">
                    <!-- Tên sản phẩm -->
                    <div class="form-group">
                        <label for="txtname">
                            <span class="title">Tên sản phẩm</span>
                            <span class="required">*</span>
                        </label>
                        <input class="form-control" id="name" type="text" name="name">
                    </div>
                    <!-- Mô tả sản phẩm -->
                    <div class="form-group">
                        <label for="txtdesc">
                            <span class="title">Mô tả sản phẩm</span>
                            <span class="required">*</span>
                        </label>
                        <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                    </div>
                    <!-- Số lượng sản phẩm -->
                    <div class="form-group">
                        <label for="txtquantity">
                            <span class="title">Số lượng sản phẩm</span>
                            <span class="required">*</span>
                        </label>
                        <input class="form-control" type="number" id="quantity" name="quantity">
                    </div>
                    <!-- Giá sản phẩm -->
                    <div class="form-group">
                        <label for="txtprice">
                            <span class="title">Giá sản phẩm</span>
                            <span class="required">*</span>
                        </label>
                        <input class="form-control" type="number" id="price" name="price">
                    </div>
                    <!-- Loại sản phẩm -->
                    <div class="form-group">
                        <label>
                            <span class="title">Thương hiệu</span>
                            <span class="required">*</span>
                        </label>
                        <select class="form-control" name="category">
                            <option value="" selected>-- Chọn --</option>
                        </select>
                    </div>
                    <!-- Giới tính -->
                    <div class="form-group">
                        <label><span class="title">Giới tính:</span></label>
                        <input type="radio" name="gender" value="1" id="nam" style="margin-left: 10px">
                        <label for="nam">Nam</label>
                        <input type="radio" name="gender" value="2" id="nu" style="margin-left: 10px">
                        <label for="nu">Nữ</label>
                        <input type="radio" name="gender" value="3" id="nam_va_nu" style="margin-left: 10px">
                        <label for="nam_va_nu">Nam và nữ</label>
                    </div>
                    <!-- Ảnh 1 -->
                    <div class="form-group">
                        <label for="txtpic">
                            <span class="title">Ảnh 1</span>
                            <span class="required">*</span>
                        </label>
                        <div class="custom-file">
                            <input type="file" id="image_1" name="image_1" accept=".png,.gif,.jpg,.jpeg">
                        </div>
                    </div>
                    <!-- Ảnh 2 -->
                    <div class="form-group">
                        <label for="txtpic">
                            <span class="title">Ảnh 2</span>
                            <span class="required">*</span>
                        </label>
                        <div class="custom-file">
                            <input type="file" id="image_2" name="image_2" accept=".png,.gif,.jpg,.jpeg">
                        </div>
                    </div>
                    <!-- Ảnh 3 -->
                    <div class="form-group">
                        <label for="txtpic">
                            <span class="title">Ảnh 3</span>
                            <span class="required">*</span>
                        </label>
                        <div class="custom-file">
                            <input type="file" id="image_3" name="image_3" accept=".png,.gif,.jpg,.jpeg">
                        </div>
                    </div>
                    <!-- Nút submit -->
                    <button type="submit" class="btn btn-success" name="btnsubmit">Xác nhận</button>
                    <a href="/qlkh/admin/product.php" class="btn btn-danger">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection