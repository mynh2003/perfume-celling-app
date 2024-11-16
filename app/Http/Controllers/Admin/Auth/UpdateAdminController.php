<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UpdateAdminController extends Controller
{
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the update form for the specified admin.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showUpdateForm($id)
    {
        $admin = Admin::findOrFail($id); // Lấy thông tin admin theo ID
        return view('admin.auth.update', compact('admin'));
    }

    /**
     * Handle the admin update request.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id); // Lấy admin theo ID

        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:admins,email,' . $admin->id],
            'current_password' => ['required'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Mật khẩu cũ không chính xác.']);
        }

        // Cập nhật thông tin
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Nếu có mật khẩu mới, cập nhật
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect($this->redirectTo)->with('success', 'Thông tin tài khoản đã được cập nhật thành công.');
    }
}