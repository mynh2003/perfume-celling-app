@extends('admin.layouts.app')

@section('admin-content')<div class="container-fluid px-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="container form-text">
        <div class="row">
            <div class="col-sm-12">
                <h2 style="margin: auto; margin-top: 20px; margin-bottom: 10px; text-align: center;">Quản lý giao diện</h2>
            </div>

            <div class="col-sm-12">
                <!-- <form action="" enctype="multipart/form-data"> -->

                <!-- Bảng Logo -->
                <form action="{{ route('update.logo') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Thêm token CSRF -->
                    <fieldset style="border: 1px solid #ccc; padding: 20px; margin-bottom: 20px;">
                        <legend>Logo</legend>
                        <div class="form-group">
                            <label for="Logo">Ảnh Logo <span class="required">*</span></label>
                            <div class="custom-file">
                                @if($logo->isNotEmpty())
                                <div class="mt-2">
                                    <img src="{{ asset('storage/manual/logo/' .$logo->first()->image) }}" alt="Current Logo" style="max-width: 100px; max-height: 100px;">
                                </div>
                                @else
                                <p>Không có logo hiện tại.</p>
                                @endif
                                <input type="file" id="Logo" name="clLogo" accept=".png,.gif,.jpg,.jpeg" require>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" name="btnsubmit_Logo">Xác nhận</button>
                    </fieldset>
                </form>



                <!-- Bảng Header -->
                <form action="{{ route('update.header') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Thêm token CSRF -->
                    <fieldset style="border: 1px solid #ccc; padding: 20px; margin-bottom: 20px;">
                        <legend>Header</legend>
                        <div class="form-group">
                            <label for="name">Text <span class="required">*</span></label>
                            <input class="form-control" id="header" type="text" name="txtText" value="{{ $header->first()->text }}" require>
                        </div>
                        <button type="submit" class="btn btn-success" name="btnsubmit_Header">Xác nhận</button>
                    </fieldset>
                </form>



                <!-- Bảng Footer -->
                <form action="{{ route('update.footer') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Thêm token CSRF -->
                    <fieldset style="border: 1px solid #ccc; padding: 20px; margin-bottom: 20px;">
                        <legend>Footer</legend>

                        <div class="form-group">
                            <label for="quantity">Copyright <span class="required">*</span></label>
                            <input class="form-control" type="text" id="Copyright" name="txtCopyright" value="{{ $footer->first()->copyright }}" require>
                        </div>

                        <div class="form-group">
                            <label for="price">Member <span class="required">*</span></label>
                            <input class="form-control" type="text" id="Member" name="txtMember" value="{{ $footer->first()->member }}" require>
                        </div>

                        <div class="form-group">
                            <label for="price">Class <span class="required">*</span></label>
                            <input class="form-control" type="text" id="Class" name="txtClass" value="{{ $footer->first()->class }}" require>
                        </div>

                        <div class="form-group">
                            <label for="price">Address <span class="required">*</span></label>
                            <input class="form-control" type="text" id="Address" name="txtAddress" value="{{ $footer->first()->address }}" require>
                        </div>

                        <button type="submit" class="btn btn-success" name="btnsubmit_Footer">Xác nhận</button>
                    </fieldset>
                </form>

                <!-- Bảng Slide -->
                <form action="{{ route('update.slides') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Thêm token CSRF -->
                    <fieldset style="border: 1px solid #ccc; padding: 20px; margin-bottom: 20px;">
                        <legend>Slide</legend>
                        @foreach($slides as $slide)
                        <div class="form-group">
                            <label for="image_1">Ảnh {{$slide->id}} <span class="required">*</span></label>
                            <div class="custom-file">
                                @if(!empty($slide->img))
                                <div class="mt-2">
                                    <img src="{{ asset('storage/manual/slide/' .$slide->img) }}" alt="Current Logo" style="max-width: 100px; max-height: 100px;">
                                </div>
                                @else
                                <p>Không có logo hiện tại.</p>
                                @endif
                                <input type="file" name="slide_{{ $slide->id }}" accept=".png,.gif,.jpg,.jpeg">
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-success" name="btnsubmit_Slide">Xác nhận</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    @endsection