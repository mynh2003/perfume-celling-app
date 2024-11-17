<?php

namespace App\Http\Controllers\UI;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Lấy thông tin giỏ hàng từ bảng cart cho người dùng hiện tại
        $cartItems = Cart::where('user_id', Auth::id())->get();

        // Tính tổng giá trị giỏ hàng
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity; // Giả sử bạn có quan hệ product trong model Cart
        });

        // Lấy thông tin người dùng
        $user = Auth::user();

        // Kiểm tra nếu người dùng nhập địa chỉ mới, nếu không thì lấy từ thông tin người dùng
        $shippingAddress = $request->input('shipping_address') ?: $user->address;
        $city = $request->input('city') ?: $user->city;
        $district = $request->input('district') ?: $user->district;
        $ward = $request->input('ward') ?: $user->ward;
        $phone = $request->input('phone') ?: $user->phone;

        // Kết hợp các trường thành địa chỉ hoàn chỉnh
        $fullShippingAddress = $ward . ', ' . $district . ', ' . $city . ', ' . $shippingAddress;

        // Tạo đơn hàng mới
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_date' => now(),
            'status' => 'pending',
            'total_price' => $totalPrice,
            'phone' => $phone,
            'shipping_address' => $fullShippingAddress,
        ]);

        // Thêm các sản phẩm vào đơn hàng và cập nhật số lượng tồn kho
        foreach ($cartItems as $item) {
            // Tạo OrderItem
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price // Lấy giá sản phẩm từ quan hệ với bảng products
            ]);

            // Cập nhật số lượng tồn kho
            $product = $item->product; // Giả sử có quan hệ product trong Cart
            $product->quantity -= $item->quantity;
            $product->save();
        }

        // Xóa giỏ hàng sau khi đặt hàng
        Cart::where('user_id', Auth::id())->delete(); // Xóa tất cả sản phẩm trong giỏ hàng của người dùng

        return redirect()->route('order.success', ['orderId' => $order->id]);
    }


    // Phương thức checkout để hiển thị giỏ hàng và form thanh toán
    public function checkout()
    {
        // Lấy các sản phẩm trong giỏ hàng của người dùng
        $cartItems = Cart::where('user_id', Auth::id())->get();

        // Tính tổng giá trị giỏ hàng
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Trả về view checkout và truyền dữ liệu giỏ hàng và tổng giá trị
        return view('ui.orders.checkout', compact('cartItems', 'totalPrice'));
    }
    public function viewOrder($orderId)
    {
        // Lấy thông tin đơn hàng và các sản phẩm trong đơn hàng
        $order = Order::with('items.product')->findOrFail($orderId);

        return view('ui.orders.order_success', compact('order'));
    }
    public function orderHistory()
    {
        // Lấy lịch sử đơn hàng của người dùng hiện tại
        $orders = Order::where('user_id', Auth::id())->with('items.product')->get();

        return view('ui.orders.order_history', compact('orders'));
    }
}
