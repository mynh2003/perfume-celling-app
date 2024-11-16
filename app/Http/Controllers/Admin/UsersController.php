<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.account.listUser', compact('users'));
    }
    public function delete($id)
    {
        // Tìm tài khoản theo ID và xóa
        $user = User::findOrFail($id);

        // Thực hiện xóa tài khoản
        $user->delete();

        // Trả về trang danh sách với thông báo thành công
        return redirect()->route('accountUser.index')->with('success', 'Xóa tài khoản thành công.');
    }
}
