@extends('admin.layouts.app')
@section('admin-content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

    <div class="container-fluid px-4">
        <h3 class="mt-4">Sửa Tài Khoản Admin</h3>

        <form action="{{ route('accountAdmin.update', $admin->id) }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="txtadname">Tên Tài Khoản</label>
                <input type="text" class="form-control" id="txtadname" name="txtadname" value="{{ $admin->username }}" required>
                @error('txtadname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="txtname">Họ và Tên</label>
                <input type="text" class="form-control" id="txtname" name="txtname" value="{{ $admin->name }}" required>
                @error('txtname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pass">Mật Khẩu (Để trống nếu không thay đổi)</label>
                <input type="password" class="form-control" id="pass" name="pass">
                @error('pass')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cpass">Xác Nhận Mật Khẩu</label>
                <input type="password" class="form-control" id="cpass" name="cpass">
                @error('cpass')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật Tài Khoản</button>
        </form>
    </div>
@endsection
