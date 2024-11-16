<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        // $brands = Brand::all();
        // $categories = Category::all();
        // $totalQuantity = CartHelper::getTotalQuantity($request);
        // , compact('totalQuantity','categories','brands')
        return view('pages.index');
    }

    public function products()
    {
        $products = Product::paginate(12); // Phân trang 12 sản phẩm mỗi trang
        return view('pages.products', compact('products'));
    }
    

    public function about() {
        // $brands = Brand::all();
        // $categories = Category::all();
        // $totalQuantity = CartHelper::getTotalQuantity($request);
        // , compact('totalQuantity','categories','brands')
        return view('pages.about');
    }

    // public function show($id) {
    //     $product = Product::find($id);
    //     if (!$product) {
    //         return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
    //     }
    //     return response()->json($product);
    // }

    public function contact() {
        // $brands = Brand::all();
        // $categories = Category::all();
        // $totalQuantity = CartHelper::getTotalQuantity($request); 
        // , compact('totalQuantity','categories','brands')
        return view('pages.contact');
    }
}
