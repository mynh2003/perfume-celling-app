<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- note -->
    <link rel="stylesheet" href="/resources/css/style-header.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="<?php echo e(asset('storage/manual/logo/logo-icon.png')); ?>" type="image/png">
    <link rel="stylesheet" href="<?php echo e(asset('storage/css/ui/cart.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('storage/css/ui/product.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('storage/css/ui/app.css')); ?>">
    <?php echo $__env->yieldContent('login'); ?>
    <?php echo $__env->yieldContent('register'); ?>
    <?php echo $__env->yieldContent('reset'); ?>
    <?php echo $__env->yieldContent('home-styles'); ?>
    <?php echo $__env->yieldContent('checkout-css'); ?>
    <?php echo $__env->yieldContent('order_history-css'); ?>
    <?php echo $__env->yieldContent('order_success-css'); ?>
</head>
<body>
    <div class="app">
        <header>
            <?php echo $__env->make('ui.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </header>
        <main class="py-4">
            <section class="main container dp-flex flex-grow1">
                <div class="sidebar"> 
                    <?php echo $__env->make('ui.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>          
                </div>
                <div class="content">
                    <?php echo $__env->yieldContent('content'); ?>          
                </div>
                
            </section>
        </main>
        <footer class="bg-gray">
            <?php echo $__env->make('ui.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer> 
        <script src="<?php echo e(asset('storage/js/cart.js')); ?>"></script>
    </div>
</body>
</html>
<?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/ui/layouts/app.blade.php ENDPATH**/ ?>