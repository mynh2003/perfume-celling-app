@extends('admin.layouts.app')

@section('admin-content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    <div class="container-fluid px-4">
    <h3 class="mt-4" style="text-align: center;">Danh Sách Tài Khoản Quản Trị</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Tài Khoản</th>
                    <th>Họ và Tên</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <a href="{{ route('admin.update.form', $admin->id) }}" class="btn btn-primary">Sửa</a>
                            <form action="{{ route('accountAdmin.delete', $admin->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
