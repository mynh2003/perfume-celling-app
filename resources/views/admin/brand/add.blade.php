@extends('admin.layouts.app')

@section('admin-content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container-fluid px-4">
    <div class="container form-text">
        <div class="row">
            <div class="col-sm-12">
                <h3 style="margin: auto; margin-top: 20px; text-align: center;">Thêm Thương Hiệu</h3>
            </div>
            <div class="col-sm-12">
                <form action="{{ route('brand.create') }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="txtname">
                            <span class="title">Tên thương hiệu</span>
                            <span class="required">*</span>
                        </label>
                        <input class="form-control" id="txtname" type="text" name="name" value="">
                        <span class="error-message" style="color: red;"></span>
                    </div>
                    <button type="submit" class="btn btn-success" name="btnsubmit">Thêm</button>
                    <button type="reset" class="btn btn-danger" name="btnReset">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection