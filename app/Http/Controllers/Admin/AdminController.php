<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.account.listAdmin', compact('admins'));
    }

    // Thêm tài khoản admin
    public function create(Request $request)
    {
        $request->validate([
            'txtadname' => 'required|unique:admin,username',
            'txtname' => 'required',
            'pass' => 'required|min:6',
            'cpass' => 'required|same:pass',
        ]);

        $admin = new Admin();
        $admin->username = $request->txtadname;
        $admin->fullname = $request->txtname;
        $admin->password = bcrypt($request->pass);
        $admin->save();

        return redirect()->route('accountAdmin.index')->with('success', 'Thêm tài khoản thành công');
    }
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.account.editAdmin', compact('admin'));
    }

    // Xử lý sửa tài khoản admin
    public function update(Request $request, $id)
    {
        $request->validate([
            'txtadname' => 'required|unique:admin,username,' . $id,
            'txtname' => 'required',
            'pass' => 'nullable|min:6',
            'cpass' => 'nullable|same:pass',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->username = $request->txtadname;
        $admin->fullname = $request->txtname;

        if ($request->pass) {
            $admin->password = bcrypt($request->pass);
        }

        $admin->save();

        return redirect()->route('accountAdmin.index')->with('success', 'Cập nhật tài khoản thành công');
    }

    // Xóa tài khoản admin
    public function delete($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('accountAdmin.index')->with('success', 'Xóa tài khoản thành công');
    }
}
