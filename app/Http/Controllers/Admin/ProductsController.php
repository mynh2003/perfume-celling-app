<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    public function create(Request $request)
    {
        // Validation dữ liệu
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'price_buy' => 'required|numeric|min:0',
            'details' => 'nullable|max:500',
            'origin' => 'nullable|max:50',
            'collection' => 'nullable|max:50',
            'rel' => 'nullable|max:50',
            'concentration' => 'nullable|max:50',
            'fragrance_group' => 'nullable|max:50',
            'style' => 'nullable|max:50',
            'perfumer' => 'nullable|max:50',
            'image_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra ảnh bắt buộc
        ], [
            // Custom error messages
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists' => 'Danh mục không hợp lệ.',
            'brand_id.required' => 'Thương hiệu là bắt buộc.',
            'brand_id.exists' => 'Thương hiệu không hợp lệ.',
            'price.required' => 'Giá bán là bắt buộc.',
            'price.numeric' => 'Giá bán phải là một số.',
            'price.min' => 'Giá bán không được âm.',
            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng không được âm.',
            'price_buy.required' => 'Giá nhập là bắt buộc.',
            'price_buy.numeric' => 'Giá nhập phải là một số.',
            'price_buy.min' => 'Giá nhập không được âm.',
            'image_1.required' => 'Ảnh sản phẩm là bắt buộc.',
            'image_1.image' => 'Ảnh phải là một tệp hình ảnh.',
            'image_1.mimes' => 'Ảnh chỉ hỗ trợ định dạng jpeg, png, jpg, gif.',
            'image_1.max' => 'Dung lượng ảnh tối đa là 2MB.',
        ]);
    
        // Tạo đối tượng Product mới
        $product = new Product();
    
        // Gán giá trị cho các trường
        $product->name = $request->name;
        $product->details = $request->details;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->price_buy = $request->price_buy;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->origin = $request->origin;
        $product->collection = $request->collection;
        $product->rel = $request->rel;
        $product->concentration = $request->concentration;
        $product->fragrance_group = $request->fragrance_group;
        $product->style = $request->style;
        $product->perfumer = $request->perfumer;
    
        // Xử lý lưu ảnh nếu có
        if ($request->hasFile('image_1')) {
            // Lưu ảnh mới
            $fileName = $request->file('image_1')->getClientOriginalName();
            $request->file('image_1')->storeAs('manual/product', $fileName, 'public');
    
            // Gán tên ảnh cho trường image_1
            $product->image_1 = $fileName;
        }
    
        // Lưu sản phẩm mới vào cơ sở dữ liệu
        $product->save();
    
        // Trả về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('admin.listProduct')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    




    public function delete($id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($id);
    
        // Kiểm tra và xóa ảnh nếu tồn tại
        if ($product->image_1) {
            $pathToDelete = 'manual/product/' . $product->image_1;
    
            // Kiểm tra nếu file tồn tại trong thư mục lưu trữ và xóa file
            if (Storage::disk('public')->exists($pathToDelete)) {
                Storage::disk('public')->delete($pathToDelete);
            }
        }
    
        // Xóa sản phẩm khỏi cơ sở dữ liệu
        $product->delete();
    
        // Trả về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('admin.listProduct')->with('success', 'Sản phẩm đã được xóa thành công!');
    }

    public function edit($id)
    {
        // Lấy sản phẩm theo ID và dữ liệu thương hiệu, danh mục
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();

        // Trả về view edit và truyền dữ liệu
        return view('admin.products.edit', compact('product', 'brands', 'categories'));
    }
    public function update(Request $request, $id)
    {
        // Validation dữ liệu
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
    
        // Lấy sản phẩm theo ID
        $product = Product::findOrFail($id);
    
        // Cập nhật dữ liệu sản phẩm
        $product->name = $request->name;
        $product->details = $request->details;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->price_buy = $request->price_buy;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->origin = $request->origin;
        $product->collection = $request->collection;
        $product->rel = $request->rel;
        $product->concentration = $request->concentration;
        $product->fragrance_group = $request->fragrance_group;
        $product->style = $request->style;
        $product->perfumer = $request->perfumer;
    
        // Xử lý lưu ảnh nếu có
        if ($request->hasFile('image_1')) {
            // Xóa ảnh cũ nếu tồn tại
            $pathToDelete = 'manual/product/' . $product->image_1;
            if ($product->image_1 && Storage::disk('public')->exists($pathToDelete)) {
                Storage::disk('public')->delete($pathToDelete);
            }
    
            // Lưu ảnh mới
            $fileName = $request->file('image_1')->getClientOriginalName();
            $request->file('image_1')->storeAs('manual/product', $fileName, 'public');
    
            // Cập nhật tên ảnh trong database
            $product->image_1 = $fileName;
        }
    
        // Lưu sản phẩm đã cập nhật
        $product->save();
    
        // Trả về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('admin.listProduct')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }
    

}
