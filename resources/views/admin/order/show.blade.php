@extends('admin.layouts.app')

@section('admin-content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="row justify-content-center">
    <div class="col-md-12">
        <div style="margin: auto; margin-top: 20px; text-align: center;">
            <h3>Chi tiết đơn hàng #{{ $order->id }}</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <p><strong>Khách hàng:</strong> {{ $order->user->name }}</p>
                <p><strong>Địa chỉ:</strong> {{ $order->shipping_address }}</p>
                <p><strong>Ngày đặt:</strong> {{ $order->order_date }}</p>
                <p><strong>Tổng tiền:</strong> {{ number_format($order->total_price, 0, ',', '.') }} ₫</p>
                <p><strong>Trạng thái:</strong></p>
                <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                    @csrf
                    <div class="d-flex align-items-center">
                        <select name="status" class="form-select me-2" style="width: auto;">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Đang chờ</option>
                            <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đã giao hàng</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã hoàn thành</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>

            <h4 class="mt-4">Sản phẩm trong đơn hàng</h4>
            <table class="table table-bordered table-hover mt-2">
                <thead class="table-dark">
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
                        <td>{{ number_format($item->price, 0, ',', '.') }} ₫</td>
                        <td>{{ number_format($item->quantity * $item->price, 0, ',', '.') }} ₫</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection