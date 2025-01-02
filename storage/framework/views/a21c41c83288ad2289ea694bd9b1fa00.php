<?php $__env->startSection('admin-content'); ?>
<div class="container-fluid px-4">
    <div class="container form-text">
        <div class="row">
            <div class="col-sm-12">
                <h3 style="text-align: center; margin-top: 20px;">Sửa Thương Hiệu</h3>
            </div>
            <div class="col-sm-12">
                <form action="<?php echo e(route('brand.update', $brand->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="txtname">Tên thương hiệu</label>
                        <input class="form-control" id="txtname" type="text" name="name" value="<?php echo e($brand->name); ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                    <a href="<?php echo e(route('admin.listBrand')); ?>" class="btn btn-danger">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/admin/brand/edit.blade.php ENDPATH**/ ?>