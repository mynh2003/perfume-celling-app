<!-- resources/views/user/profile.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thông tin cá nhân</h2>

    <!-- Hiển thị thông báo thành công (nếu có) -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form hiển thị thông tin người dùng và cho phép chỉnh sửa -->
    <form action="{{ route('user.updateProfile') }}" method="POST">
        @csrf
        <!-- Tên -->
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
        </div>

        <!-- Các trường khác nếu cần (VD: số điện thoại, địa chỉ, v.v.) -->

        <!-- Nút cập nhật -->
        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
    </form>
</div>
@endsection
