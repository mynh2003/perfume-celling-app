@extends('admin.layouts.app')

@section('admin-content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mt-5">
            <div class="card-header bg-dark">{{ __('Cập nhật thông tin tài khoản') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.update', $admin->id) }}">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Tên tài khoản') }}</label>
                        <input id="name" type="text" class="form-control" name="username" value="{{ old('name', $admin->username) }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Họ tên') }}</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $admin->name) }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $admin->email) }}" required>
                        @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="current_password" class="form-label">{{ __('Mật khẩu hiện tại') }}</label>
                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                        @error('current_password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Mật khẩu mới') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('Xác nhận mật khẩu mới') }}</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-100">{{ __('Cập nhật') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
