<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{ 
    // public function addToCart(Request $request, $productId)
    // {
    //     try {
    //         // Lấy sản phẩm từ cơ sở dữ liệu
    //         $product = Product::findOrFail($productId);

    //         // Lấy user_id từ session hoặc xác thực người dùng
    //         $userId = $request->session()->get('user_id') ?? Auth::id();

    //         if (!$userId) {
    //             $userId = uniqid();
    //             $request->session()->put('user_id', $userId);

    //         }

    //         // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    //         $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();


    //         if ($cartItem) {
    //             $cartItem->quantity += 1;
    //             $cartItem->save();

    //         } else {
    //             Cart::insert([
    //                 'user_id' => $userId,
    //                 'product_id' => $productId,
    //                 'quantity' => 1,                 
    //                 'created_at' => now(),
    //                 'updated_at' => now(),
    //             ]);
 
    //         }

    //         // Cập nhật giỏ hàng trong session
    //         $cart = Session::get('cart', []);
    //         $cart[$productId] = [
    //             'name' => $product->name,
    //             'price' => $product->price,
    //             'quantity' => isset($cart[$productId]) ? $cart[$productId]['quantity'] + 1 : 1,
    //             'image' => $product->image,
    //         ];
    //         Session::put('cart', $cart);
       

    //         Session::flash('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    //         return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');

    //     } catch (\Exception $e) {

    //         return redirect()->back()->with('error', 'Lỗi thêm sản phẩm vào giỏ hàng: ' . $e->getMessage());
    //     }
    // }

    // public function remove(Request $request, $productId)
    // {
    //     try {
    //         // Lấy user_id từ session hoặc xác thực người dùng
    //         $userId = $request->session()->get('user_id', uniqid());


    //         // Xóa sản phẩm khỏi cơ sở dữ liệu
    //         Cart::where('user_id', $userId)->where('product_id', $productId)->delete();


    //         // Cập nhật giỏ hàng trong session
    //         $cart = $request->session()->get('cart', []);

    //         // Nếu giỏ hàng không rỗng, loại bỏ sản phẩm
    //         if (isset($cart[$userId][$productId])) {
    //             unset($cart[$userId][$productId]);
    //             $request->session()->put('cart', $cart);
 
    //         }

    //         return redirect()->back()->with('success', 'Sản phẩm đã được xóa.');
    //     } catch (\Exception $e) {

    //         return redirect()->back()->with('error', 'Lỗi khi xóa sản phẩm!');
    //     }
    // }

    // public function clear(Request $request)
    // {
    //     try {
    //         // Lấy user_id từ session hoặc xác thực người dùng
    //         $userId = $request->session()->get('user_id');


    //         // Xóa tất cả sản phẩm trong cơ sở dữ liệu dựa trên user_id
    //         Cart::where('user_id', $userId)->delete();


    //         // Xóa giỏ hàng trong session
    //         Session::forget('cart');


    //         // Thêm thông báo vào session
    //         Session::flash('success', 'Giỏ hàng đã được xóa.');
    //         return redirect()->back()->with('success', 'Giỏ hàng đã được xóa.');

    //     } catch (\Exception $e) {

    //         return redirect()->back()->with('error', 'Lỗi khi xóa giỏ hàng!');
    //     }
    // }

    // public function index(Request $request)
    // {
    //     $brands = Brand::all();
    //     $categories = Category::all();
    //     // Tạo user_id nếu chưa có
    //     if (!$request->session()->has('user_id')) {
    //         $request->session()->put('user_id', uniqid());
          
    //     }

    //     // Lấy giỏ hàng từ cơ sở dữ liệu
    //     $userId = $request->session()->get('user_id');
    //     $cartItems = Cart::where('user_id', $userId)->get();
    //     $totalQuantity = Cart::where('user_id', $userId)->count();

        

    //     return view('carts.index', compact('cartItems', 'totalQuantity','categories','brands'));
    // }
    // public function updateQuantity(Request $request, $productId)
    // {
    //     // Tạo user_id nếu chưa có
    //     if (!$request->session()->has('user_id')) {
    //         $request->session()->put('user_id', uniqid());
            
    //     }
    //     $userId = $request->session()->get('user_id');
    //     $quantity = $request->input('quantity');

    //     // Cập nhật số lượng trong giỏ hàng
    //     $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
    //     if ($cartItem) {
    //         $cartItem->quantity = $quantity;
    //         $cartItem->save();

    //         return response()->json(['success' => true]);
    //     }

    //     return response()->json(['success' => false]);
    // }

    public function addToCart(Request $request, $productId)
    {
        try {
            // Lấy sản phẩm từ cơ sở dữ liệu
            $product = Product::findOrFail($productId);

            // Lấy user_id từ xác thực người dùng
            $userId = Auth::id();

            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();

            if ($cartItem) {
                // Cập nhật số lượng nếu sản phẩm đã có trong giỏ hàng
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                // Thêm sản phẩm mới vào giỏ hàng
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => 1,                 
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Thông báo thành công
            return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi thêm sản phẩm vào giỏ hàng: ' . $e->getMessage());
        }
    }

    public function remove(Request $request, $productId)
    {
        try {
            // Lấy user_id từ xác thực người dùng
            $userId = Auth::id();

            // Xóa sản phẩm khỏi cơ sở dữ liệu
            Cart::where('user_id', $userId)->where('product_id', $productId)->delete();

            return redirect()->back()->with('success', 'Sản phẩm đã được xóa.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi khi xóa sản phẩm!');
        }
    }

    public function clear(Request $request)
    {
        try {
            // Lấy user_id từ xác thực người dùng
            $userId = Auth::id();

            // Xóa tất cả sản phẩm trong cơ sở dữ liệu dựa trên user_id
            Cart::where('user_id', $userId)->delete();

            return redirect()->back()->with('success', 'Giỏ hàng đã được xóa.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi khi xóa giỏ hàng!');
        }
    }

    public function index(Request $request)
    {
        $brands = Brand::all();
        $categories = Category::all();

        // Lấy user_id từ xác thực người dùng
        $userId = Auth::id();

        // Lấy giỏ hàng từ cơ sở dữ liệu
        $cartItems = Cart::where('user_id', $userId)->get();
        $totalQuantity = $cartItems->sum('quantity');

        return view('carts.index', compact('cartItems', 'totalQuantity', 'categories', 'brands'));
    }

    public function updateQuantity(Request $request, $productId)
    {
        try {
            // Lấy user_id từ xác thực người dùng
            $userId = Auth::id();

            $quantity = $request->input('quantity');

            // Cập nhật số lượng trong giỏ hàng
            $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();

                return response()->json(['success' => true]);
            }

            return response()->json(['success' => false]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
