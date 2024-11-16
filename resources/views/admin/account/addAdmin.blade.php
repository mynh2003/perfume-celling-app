@extends('admin.layouts.app')

@section('admin-content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    <div class="container-fluid px-4">
        <h3 class="mt-4">Thêm Tài Khoản Admin</h3>

        <form action="{{ route('accountAdmin.create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="txtadname">Tên Tài Khoản</label>
                <input type="text" class="form-control" id="txtadname" name="txtadname" required>
                @error('txtadname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="txtname">Họ và Tên</label>
                <input type="text" class="form-control" id="txtname" name="txtname" required>
                @error('txtname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pass">Mật Khẩu</label>
                <input type="password" class="form-control" id="pass" name="pass" required>
                @error('pass')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cpass">Xác Nhận Mật Khẩu</label>
                <input type="password" class="form-control" id="cpass" name="cpass" required>
                @error('cpass')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Thêm Tài Khoản</button>
        </form>
    </div>
@endsection
