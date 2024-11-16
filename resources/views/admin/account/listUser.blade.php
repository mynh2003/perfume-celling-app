@extends('admin.layouts.app')

@section('admin-content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container-fluid px-4">
    <h3 class="mt-4" style="text-align: center;">Danh Sách Tài Khoản Người Dùng</h3>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Tên tài khoản</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Thành phố</th>
                    <th>Quận/Huyện</th>
                    <th>Phường/Xã</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->district }}</td>
                    <td>{{ $user->ward }}</td>
                    <td>{{ $user->address }}</td>
                    <td>
                       
                        <form action="{{ route('accountUser.delete', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
