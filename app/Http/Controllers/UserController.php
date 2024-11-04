<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Hiển thị danh sách người dùng
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Phương thức hiển thị trang hồ sơ người dùng
    public function profile()
    {
        // Trả về view 'user.profile' (tùy chỉnh đường dẫn view nếu cần)
        return view('users.profile');
    }

    // Xử lý cập nhật thông tin người dùng
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return redirect()->route('users.show', $id)->with('success', 'Thông tin người dùng đã được cập nhật.');
    }
}
