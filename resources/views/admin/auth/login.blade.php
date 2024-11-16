@extends('admin.auth.layout')

@section('admin-auth-content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">{{ __('Đăng nhập hệ thống') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="username" class="form-label">{{ __('Tên tài khoản') }}</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
                        @error('username')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Mật khẩu') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">{{ __('Ghi nhớ tôi') }}</label>
                        </div>
                        <a class="btn btn-link" href="">{{ __('Quên mật khẩu?') }}</a>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-100">{{ __('Đăng nhập') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
