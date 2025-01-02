<?php $__env->startSection('admin-content'); ?>
<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
    <div class="container-fluid px-4">
    <h3 class="mt-4" style="text-align: center;">Danh Sách Tài Khoản Quản Trị</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Tài Khoản</th>
                    <th>Họ và Tên</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($admin->id); ?></td>
                        <td><?php echo e($admin->username); ?></td>
                        <td><?php echo e($admin->name); ?></td>
                        <td><?php echo e($admin->email); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.update.form', $admin->id)); ?>" class="btn btn-primary">Sửa</a>
                            <form action="<?php echo e(route('accountAdmin.delete', $admin->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/admin/account/listAdmin.blade.php ENDPATH**/ ?>