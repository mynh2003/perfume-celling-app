<?php $__env->startSection('content'); ?>
<div class="container checkout-wrapper">
    <h2>Thanh toán</h2>

    <!-- Hiển thị sản phẩm trong giỏ hàng -->
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
            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->product->name); ?></td>
                    <td><?php echo e($item->quantity); ?></td>
                    <td><?php echo e(number_format($item->product->price, 2)); ?> đ</td>
                    <td><?php echo e(number_format($item->product->price * $item->quantity, 2)); ?> đ</td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!-- Hiển thị tổng giá trị -->
    <p><strong>Tổng giá:</strong> <?php echo e(number_format($totalPrice, 2)); ?> đ</p>

    <!-- Form nhập thông tin giao hàng -->
    <form action="<?php echo e(route('order.place')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <!-- Tên người nhận (không thay đổi) -->
        <div class="mb-3">
            <label for="name" class="form-label">Tên người nhận</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(Auth::user()->name); ?>" disabled>
        </div>

        <!-- Số điện thoại -->
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại người nhận</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone', Auth::user()->phone)); ?>" required>
        </div>

        <!-- Thành phố -->
        <div class="mb-3">
            <label for="city" class="form-label">Thành phố</label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo e(old('city', Auth::user()->city)); ?>" required>
        </div>

        <!-- Quận/Huyện -->
        <div class="mb-3">
            <label for="district" class="form-label">Quận/Huyện</label>
            <input type="text" class="form-control" id="district" name="district" value="<?php echo e(old('district', Auth::user()->district)); ?>" required>
        </div>

        <!-- Phường/Xã -->
        <div class="mb-3">
            <label for="ward" class="form-label">Phường/Xã</label>
            <input type="text" class="form-control" id="ward" name="ward" value="<?php echo e(old('ward', Auth::user()->ward)); ?>" required>
        </div>

        <!-- Địa chỉ -->
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo e(old('address', Auth::user()->address)); ?>" required>
        </div>

        <!-- Nút gửi đơn hàng -->
        <button type="submit" class="btn btn-primary">Đặt hàng</button>
        <!-- Nút quay lại -->
        <a href="<?php echo e(route('cart.index')); ?>" class="btn checkout-btn-back">Quay lại giỏ hàng</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('checkout-css'); ?>
    <style>
        /* Đảm bảo CSS chỉ ảnh hưởng đến lớp có class .checkout-wrapper */
        .checkout-wrapper .table th, .checkout-wrapper .table td {
            text-align: center;
        }

        .checkout-wrapper .form-label {
            font-weight: bold;
        }

        .checkout-wrapper .form-control {
            width: 100%;
        }

        .checkout-wrapper .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            color: white;
            font-size: 16px;
        }

        .checkout-wrapper .btn-primary:hover {
            background-color: #0056b3;
        }

        .checkout-wrapper .checkout-btn-back {
            background-color: #6c757d; /* Màu xám cho nút */
            border: none;
            padding: 10px 20px;
            color: white;
            font-size: 16px;
            border-radius: 5px; /* Bo tròn góc nút */
            text-decoration: none; /* Xóa underline */
            display: inline-block; /* Hiển thị nút kiểu inline-block */
            transition: background-color 0.3s, transform 0.2s; /* Hiệu ứng chuyển màu và thay đổi kích thước khi hover */
        }

        .checkout-wrapper .checkout-btn-back:active {
            background-color: #545b62; /* Màu khi nhấn */
            transform: scale(1); /* Trả lại kích thước ban đầu khi nhấn */
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/ui/orders/checkout.blade.php ENDPATH**/ ?>