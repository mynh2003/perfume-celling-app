<?php $__env->startSection('admin-content'); ?>
<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div style="margin: auto; margin-top: 20px; text-align: center;">
            <h3>Danh sách đơn hàng</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Tổng tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($order->id); ?></td>
                        <td><?php echo e($order->user->name); ?></td>
                        <td><?php echo e($order->order_date); ?></td>
                        <td>
                            <?php
                            $statusLabels = [
                                'pending' => 'Đang chờ',
                                'confirmed' => 'Đã xác nhận',
                                'shipped' => 'Đã giao hàng',
                                'delivered' => 'Đã hoàn thành',
                                'cancelled' => 'Đã hủy',
                            ];
                        ?>

                        <span class="badge 
                            <?php if($order->status == 'pending'): ?> bg-warning 
                            <?php elseif($order->status == 'confirmed'): ?> bg-info 
                            <?php elseif($order->status == 'shipped'): ?> bg-primary 
                            <?php elseif($order->status == 'delivered'): ?> bg-success 
                            <?php elseif($order->status == 'cancelled'): ?> bg-danger 
                            <?php endif; ?>">
                            <?php echo e($statusLabels[$order->status] ?? 'Không rõ'); ?>

                        </span>
                        </td>
                        <td><?php echo e(number_format($order->total_price, 0, ',', '.')); ?> ₫</td>
                        <td>
                            <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="btn btn-info btn-sm">Xem</a>
                            <form action="<?php echo e(route('admin.orders.destroy', $order->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">Không có đơn hàng nào</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="pagination-container">
                <?php echo e($orders->links('vendor.pagination.bootstrap-4')); ?>

            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/admin/order/list.blade.php ENDPATH**/ ?>