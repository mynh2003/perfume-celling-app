<?php $__env->startSection('admin-content'); ?>
<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
<div class="container-fluid px-4 container-brand">
    <div style="margin: auto; margin-top: 20px; text-align: center;">
        <h3>Thương hiệu</h3>
    </div>
    <table class="table" style="margin-top: 20px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên thương hiệu</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <!-- Hiển thị dữ liệu mẫu -->
            <?php $__currentLoopData = $listBrand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($brand->id); ?></td>
                <td><?php echo e($brand->name); ?></td>
                <td>
                    <a href="<?php echo e(route('brand.edit', $brand->id)); ?>">
                        <button class="btn btn-primary flex-fill mx-1">Sửa</button>
                    </a>
                    <form action="<?php echo e(route('brand.delete', $brand->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger flex-fill mx-1" onclick="return confirm('Bạn có chắc chắn muốn xóa nhãn hàng này không?')">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="pagination-container">
        <?php echo e($listBrand->links('vendor.pagination.bootstrap-4')); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/admin/brand/list.blade.php ENDPATH**/ ?>