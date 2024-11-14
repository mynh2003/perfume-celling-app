<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    

    // Phương thức xử lý thêm thương hiệu mới
    public function create(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
           
        ]);

        // Tạo thương hiệu mới
        Brand::create([
            'name' => $request->input('name'),
           
        ]);

        // Chuyển hướng sau khi thêm thành công
        return redirect()->route('admin.addBrand')->with('success', 'Thương hiệu đã được thêm thành công!');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    // Phương thức cập nhật thương hiệu
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.listBrand')->with('success', 'Thương hiệu đã được cập nhật thành công!');
    }

    // Phương thức xóa thương hiệu
    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('admin.listBrand')->with('success', 'Thương hiệu đã được xóa thành công!');
    }
    
    
}
