<?php $__env->startSection('content'); ?>
<div class="container order-history-wrapper">
    <h2>Lịch sử đơn hàng của bạn</h2>

    <?php if($orders->isEmpty()): ?>
        <p>Bạn chưa có đơn hàng nào.</p>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng giá</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($order->id); ?></td>
                        <td><?php echo e($order->order_date); ?></td>
                        <td><?php echo e(number_format($order->total_price, 2)); ?> đ</td>
                        <td><?php echo e(ucfirst($order->status)); ?></td>
                        <td><a href="<?php echo e(route('order.success', ['orderId' => $order->id])); ?>" class="btn btn-info btn-sm">Xem</a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('order_history-css'); ?>
    <style>
        /* Đảm bảo CSS chỉ ảnh hưởng đến lớp có class .order-history-wrapper */
        .order-history-wrapper .table th, .order-history-wrapper .table td {
            text-align: center;
            vertical-align: middle;
        }

        .order-history-wrapper .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }

        .order-history-wrapper .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .order-history-wrapper .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .order-history-wrapper .container {
            margin-top: 30px;
        }

        .order-history-wrapper h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/orders/order_history.blade.php ENDPATH**/ ?>