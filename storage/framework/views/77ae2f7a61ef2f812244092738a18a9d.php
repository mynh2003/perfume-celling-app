<div class="banner bg-dark-red overflow-hidden position-relative">
    <div class="marquee-wrapper">
        <span class="marquee-text"><?php echo e($header->first()->text); ?></span>
    </div>
</div>
<div class="topcenter">
    <div class="container">
        <div class="topcenter-inner clearfix">
            <a href="/" class="logo">
                <img src="<?php echo e(asset('storage/manual/logo/' .$logo->first()->image)); ?>" alt="">
            </a>
            <div class="search">
                <div class="search-item search-text">
                    <form action="">
                        <input type="text" name="keyword" placeholder="Tìm nước hoa hoặc nhãn hiệu...">
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <div class="search-item search-select">
                    <select class="selectpicker" name="" id="">
                        <option value="" selected>Chọn thương hiệu</option> <!-- Tùy chọn mặc định -->
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

            </div>
            <div class="topcart clearfix">
                <div class="register">
                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Đăng nhập')); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <!-- Link trực tiếp đến trang thông tin cá nhân, không cần biểu mẫu -->
                                <a class="dropdown-item" href="<?php echo e(route('user.profile')); ?>">
                                    <?php echo e(__('Thông tin')); ?>

                                </a>
                                
                                <!-- Đăng xuất -->
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Đăng xuất')); ?>

                                </a>
                                
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>
                    <a href="<?php echo e(route('orders.history')); ?>">Lịch sử mua hàng</a>
                </div>
                <div class="cart">
                    <a href="/cart">
                        <i class="bi bi-cart3"></i>
                       <?php if(auth()->guard()->guest()): ?>
                       
                        <?php else: ?>
                            <?php if($totalProductCart > 0): ?>
                            <span class="cart-count bg-dark-red" id="cartCount"><?php echo e($totalProductCart); ?></span> 
                            <?php endif; ?>
                       <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>

        <div class="topcenter-menu clearfix">
            <div class="categories">
                <div class="categories-title">
                    <i class="fa-solid fa-bars"></i>
                    <span>DANH MỤC</span>
                    <i class="bi bi-caret-down-fill"></i>
                </div>
                <ul class="categories-menu bg-dark-red">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('product.productWithCategory', ['category_id' => $category->id])); ?>" class="expandable">
                            <span><?php echo e($category->name); ?></span>
                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="menu-horizontal">
                <ul class="menu-main">
                    <li><a href="<?php echo e(route('pages.index')); ?>" class="<?php echo e(request()->is('home') ? 'active' : ''); ?>">TRANG CHỦ</a></li>
                    <li><a href="<?php echo e(route('pages.about')); ?>" class="<?php echo e(request()->is('about') ? 'active' : ''); ?>">GIỚI THIỆU</a></li>
                    <li><a href="<?php echo e(route('pages.products')); ?>" class="<?php echo e(request()->is('products') ? 'active' : ''); ?>">SẢN PHẨM</a></li>
                    <li><a href="<?php echo e(route('pages.contact')); ?>"class="<?php echo e(request()->is('contact') ? 'active' : ''); ?>">LIÊN HỆ</a></li>
                    <div class="btn-group open">
                        <button type="button" class="btn btn-default dropdown-toggle aaa"></button>
                    </div>
                </ul>
            </div>
            <div class="hotline">
                <a href="tel:19008198" class="hotline-item">
                    <div class="hotline-icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="hotline-number">
                        <span>Đặt hàng: (8h -22h)</span>
                        <span>19008198</span>
                    </div>
                </a>
                <a href="tel:19008199" class="hotline-item">
                    <div class="hotline-icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="hotline-number">
                        <span>Đặt hàng: (8h -22h)</span>
                        <span>19008199</span>
                    </div>
                </a>
            </div>
        </div> 
    </div>
</div><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/layouts/header.blade.php ENDPATH**/ ?>