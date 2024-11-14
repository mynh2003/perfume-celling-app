

<?php $__env->startSection('content'); ?>
<div class="container order-success-wrapper">
    <h2>Xác nhận đơn hàng</h2>

    <p>Cảm ơn bạn đã đặt hàng!</p>
    <p><strong>Mã đơn hàng:</strong> <?php echo e($order->id); ?></p>
    <p><strong>Ngày đặt hàng:</strong> <?php echo e($order->order_date); ?></p>
    <p><strong>Tổng giá:</strong> <?php echo e(number_format($order->total_price, 2)); ?> đ</p>

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
            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->product->name); ?></td>
                    <td><?php echo e($item->quantity); ?></td>
                    <td><?php echo e(number_format($item->price, 2)); ?> đ</td>
                    <td><?php echo e(number_format($item->price * $item->quantity, 2)); ?> đ</td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('order_success-css'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/orders/order_success.blade.php ENDPATH**/ ?>