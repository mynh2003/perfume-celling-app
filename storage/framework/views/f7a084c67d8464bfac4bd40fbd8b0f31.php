<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Thông tin cá nhân</h2>

    <!-- Hiển thị thông báo thành công (nếu có) -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Form hiển thị thông tin người dùng và cho phép chỉnh sửa -->
    <form action="<?php echo e(route('user.updateProfile', ['id' => Auth::user()->id])); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <!-- Tên -->
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>" required>
        </div>

        <!-- Username -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo e(Auth::user()->username); ?>" readonly>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo e(Auth::user()->email); ?>" readonly>
        </div>

        <!-- Số điện thoại -->
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo e(Auth::user()->phone); ?>">
        </div>

        <!-- Địa chỉ -->
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" value="<?php echo e(Auth::user()->address); ?>">
        </div>

        <!-- Thành phố -->
        <div class="mb-3">
            <label for="city" class="form-label">Thành phố</label>
            <input type="text" name="city" id="city" class="form-control" value="<?php echo e(Auth::user()->city); ?>">
        </div>

        <!-- Quận/Huyện -->
        <div class="mb-3">
            <label for="district" class="form-label">Quận/Huyện</label>
            <input type="text" name="district" id="district" class="form-control" value="<?php echo e(Auth::user()->district); ?>">
        </div>

        <!-- Phường/Xã -->
        <div class="mb-3">
            <label for="ward" class="form-label">Phường/Xã</label>
            <input type="text" name="ward" id="ward" class="form-control" value="<?php echo e(Auth::user()->ward); ?>">
        </div>

        <!-- Nút cập nhật -->
        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/users/profile.blade.php ENDPATH**/ ?>