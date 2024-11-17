@extends('ui.layouts.app')

@section('content')
<div class="container order-success-wrapper">
    <h2>Xác nhận đơn hàng</h2>

    <p>Cảm ơn bạn đã đặt hàng!</p>
    <p><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
    <p><strong>Ngày đặt hàng:</strong> {{ $order->order_date }}</p>
    <p><strong>Tổng giá:</strong> {{ number_format($order->total_price, 2) }} đ</p>

    <!-- Hiển thị các sản phẩm trong đơn hàng -->
    <h4>Các sản phẩm trong đơn hàng</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }} đ</td>
                    <td>{{ number_format($item->price * $item->quantity, 2) }} đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('order_success-css')
    <style>
        /* CSS chỉ ảnh hưởng đến lớp có class .order-success-wrapper */
        .order-success-wrapper .table th, .order-success-wrapper .table td {
            text-align: center;
            vertical-align: middle;
        }

        .order-success-wrapper .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }

        .order-success-wrapper .container {
            margin-top: 30px;
        }

        .order-success-wrapper h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .order-success-wrapper h4 {
            margin-top: 30px;
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
        }

        .order-success-wrapper .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .order-success-wrapper .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .order-success-wrapper p {
            font-size: 16px;
            color: #555;
        }
    </style>
@endsection
