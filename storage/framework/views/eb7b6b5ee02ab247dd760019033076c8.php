<?php $__env->startSection('login'); ?>
    <style>
        body {
            background-color: #f8f9fa; /* Màu nền sáng */
        }

        .card {
            border: none; /* Bỏ viền cho card */
            border-radius: 10px; /* Bo góc cho card */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Thêm bóng cho card */
        }

        .card-header {
            color: white; /* Màu chữ cho header */
            font-weight: bold; /* Chữ đậm */
            text-align: center; /* Căn giữa chữ */
        }

        .btn-link {
            font-size: 14px;
            color: #007bff; /* Màu chữ cho nút liên kết */
        }

        .btn-link:hover {
            text-decoration: underline; /* Gạch chân khi hover */
        }

        .form-check-label {
            margin-left: 5px; /* Cách đều cho nhãn checkbox */
        }

        .text-center {
            text-align: center; /* Căn giữa cho footer */
        }
        .form-check{
            display: inline-block;
            padding: 6px 12px;
            margin: 0
        }
        .col-md-6 {
            display: flex;
            flex: 0 0 auto;
            width: -webkit-fill-available;
            justify-content: space-between;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-dark-red"><?php echo e(__('Đăng Nhập')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Tên tài khoản')); ?></label>

                            <div class="col-md-8">
                                <input id="username" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus>

                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Mật khẩu')); ?></label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="form-check-label" for="remember">
                                        <?php echo e(__('Ghi nhớ tôi')); ?>

                                    </label>
                                </div>
                                <label for="">
                                    <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Quên mật khẩu?')); ?>

                                    </a>
                                    <?php endif; ?>
                                </label>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Đăng Nhập')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Bạn chưa có tài khoản? <a href="<?php echo e(route('register')); ?>">Đăng ký</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('ui.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/ui/auth/login.blade.php ENDPATH**/ ?>