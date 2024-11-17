@extends('ui.layouts.app')
@section('reset')
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

        .btn-light-blue {
            background-color: #2f80ed; /* Màu nền nút đăng nhập */
            border: none; /* Bỏ viền */
        }

        .btn-light-blue:hover {
            background-color: #639eec;; /* Màu nền khi hover */
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
       
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark-red">{{ __('Đặt lại mật khẩu') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Nhập lại mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-light-blue">
                                    {{ __('Đổi mật khẩu') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
