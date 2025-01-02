<?php $__env->startSection('admin-content'); ?>
<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div style="margin: auto; margin-top: 20px; text-align: center;">
            <h3>Chi tiết đơn hàng #<?php echo e($order->id); ?></h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <p><strong>Khách hàng:</strong> <?php echo e($order->user->name); ?></p>
                <p><strong>Địa chỉ:</strong> <?php echo e($order->shipping_address); ?></p>
                <p><strong>Ngày đặt:</strong> <?php echo e($order->order_date); ?></p>
                <p><strong>Tổng tiền:</strong> <?php echo e(number_format($order->total_price, 0, ',', '.')); ?> ₫</p>
                <p><strong>Trạng thái:</strong></p>
                <form method="POST" action="<?php echo e(route('admin.orders.updateStatus', $order->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="d-flex align-items-center">
                        <select name="status" class="form-select me-2" style="width: auto;">
                            <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Đang chờ</option>
                            <option value="confirmed" <?php echo e($order->status == 'confirmed' ? 'selected' : ''); ?>>Đã xác nhận</option>
                            <option value="shipped" <?php echo e($order->status == 'shipped' ? 'selected' : ''); ?>>Đã giao hàng</option>
                            <option value="delivered" <?php echo e($order->status == 'delivered' ? 'selected' : ''); ?>>Đã hoàn thành</option>
                            <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>Đã hủy</option>
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
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->product->name); ?></td>
                        <td><?php echo e($item->quantity); ?></td>
                        <td><?php echo e(number_format($item->price, 0, ',', '.')); ?> ₫</td>
                        <td><?php echo e(number_format($item->quantity * $item->price, 0, ',', '.')); ?> ₫</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/admin/order/show.blade.php ENDPATH**/ ?>