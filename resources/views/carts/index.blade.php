@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="cart-container">
    <h2>Giỏ hàng của bạn</h2>

    @if(count($cartItems) > 0)
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="{{ asset('storage/manual/product/'. $item->product->image_1) }}" alt="{{ $item->product->name }}" class="product-image">
                                <span>{{ $item->product->name }}</span>
                            </div>
                        </td>
                        <td>{{ number_format($item->product->price, 0, ',', '.') }}đ</td>
                        <td>
                            <div class="quantity-control">
                                <button class="btn btn-decrease" data-id="{{ $item->product_id }}">-</button>
                                <input type="number" class="quantity-input" value="{{ $item->quantity }}" min="1" data-id="{{ $item->product_id }}">
                                <button class="btn btn-increase" data-id="{{ $item->product_id }}">+</button>
                            </div>
                        </td>
                        <td class="item-total" data-id="{{ $item->product_id }}">
                            {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}đ
                        </td>
                        <td>
                            <form action="{{ route('cart.remove', $item->product_id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" style="text-align: right;"><strong>Tổng tiền:</strong></td>
                    <td colspan="2">
                        <strong id="total-cart">
                            {{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }}đ
                        </strong>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="cart-controller">
            <form action="{{ route('cart.clear') }}" method="POST" style="margin-top: 20px;">
                @csrf
                <button type="submit" class="btn btn-danger ">Xóa hết giỏ hàng</button>
            </form>
            
            <form action="" method="POST" style="margin-top: 20px;">
                <button type="submit" class="btn btn-danger ">Mua hàng</button>
            </form>
            
        </div>
    @else
        <p>Chưa có sản phẩm nào trong giỏ hàng của bạn.</p>
    @endif
</div>
@endsection
