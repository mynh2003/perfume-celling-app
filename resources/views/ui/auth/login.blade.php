@extends('ui.layouts.app')
@section('login')
    <style>
        body {
            background-color: #f8f9fa; /* Màu nền sáng */
        }

        .card {
            border: none; /* Bỏ viền cho card */
            border-radius: 10px; /* Bo góc cho card */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Thêm bóng cho card */
        }

        .card-header {
            color: white; /* Màu chữ cho header */
            font-weight: bold; /* Chữ đậm */
            text-align: center; /* Căn giữa chữ */
        }

        .btn-link {
            font-size: 14px;
            color: #007bff; /* Màu chữ cho nút liên kết */
        }

        .btn-link:hover {
            text-decoration: underline; /* Gạch chân khi hover */
        }

        .form-check-label {
            margin-left: 5px; /* Cách đều cho nhãn checkbox */
        }

        .text-center {
            text-align: center; /* Căn giữa cho footer */
        }
        .form-check{
            display: inline-block;
            padding: 6px 12px;
            margin: 0
        }
        .col-md-6 {
            display: flex;
            flex: 0 0 auto;
            width: -webkit-fill-available;
            justify-content: space-between;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-dark-red">{{ __('Đăng Nhập') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Tên tài khoản') }}</label>

                            <div class="col-md-8">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ghi nhớ tôi') }}
                                    </label>
                                </div>
                                <label for="">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu?') }}
                                    </a>
                                    @endif
                                </label>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng Nhập') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

