<?php
namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('ui.users.index', compact('users'));
    }
    public function profile()
    {
        return view('ui.users.profile');
    }

    // Xử lý cập nhật thông tin người dùng
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Xác thực và cập nhật các trường
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'ward' => 'nullable|string|max:255',
            // Nếu có thay đổi mật khẩu
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Cập nhật thông tin người dùng
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->district = $request->input('district');
        $user->ward = $request->input('ward');

        // Kiểm tra nếu có mật khẩu mới, thì cập nhật
        if ($request->has('password') && $request->input('password') !== '') {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        // Quay lại trang profile với thông báo thành công
        return redirect()->route('ui.user.profile')->with('success', 'Thông tin cá nhân đã được cập nhật.');
    }
}
