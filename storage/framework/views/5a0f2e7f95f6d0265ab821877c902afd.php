<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name')); ?> - Admin</title>
    <!-- Thêm link Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="icon" href="<?php echo e(asset('storage/manual/logo/logo-icon.png')); ?>" type="image/png">
    <style>
        /* Thêm các styles riêng cho ứng dụng */
        body {
            background-color: #f4f7fc;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 500px;
            width: 100%;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 20px;
        }

        .card-body {
            padding: 30px;
        }

        .card-footer {
            padding: 15px;
            text-align: center;
            background-color: #f9f9f9;
        }

        .form-label {
            font-weight: bold;
        }

        .invalid-feedback {
            color: #dc3545;
        }

        .btn-primary {
            width: 100%;
            font-size: 16px;
        }

        .btn-link {
            color: #007bff;
        }

        .btn-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php echo $__env->yieldContent('admin-auth-content'); ?>
    </div>

    <!-- Thêm script của Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/admin/auth/layout.blade.php ENDPATH**/ ?>