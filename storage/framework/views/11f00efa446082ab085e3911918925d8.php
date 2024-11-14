<?php $__env->startSection('content'); ?>

<div class="cart-container">
<?php if(session('error')): ?>
    <div class="alert alert-error">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
    <h2>Giỏ hàng của bạn</h2>

    <?php if(count($cartItems) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="<?php echo e(asset('storage/manual/product/'. $item->product->image_1)); ?>" alt="<?php echo e($item->product->name); ?>" class="product-image">
                                <span><?php echo e($item->product->name); ?></span>
                            </div>
                        </td>
                        <td><?php echo e(number_format($item->product->price, 0, ',', '.')); ?>đ</td>
                        <td>
                            <div class="quantity-control">
                                <button class="btn btn-decrease" data-id="<?php echo e($item->product_id); ?>">-</button>
                                <input type="number" class="quantity-input" value="<?php echo e($item->quantity); ?>" min="1" data-id="<?php echo e($item->product_id); ?>" data-max-quantity="<?php echo e($item->product->quantity); ?>">
                                <button class="btn btn-increase" data-id="<?php echo e($item->product_id); ?>">+</button>
                            </div>
                        </td>
                        <td class="item-total" data-id="<?php echo e($item->product_id); ?>">
                            <?php echo e(number_format($item->product->price * $item->quantity, 0, ',', '.')); ?>đ
                        </td>
                        <td>
                            <form action="<?php echo e(route('cart.remove', $item->product_id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="3" style="text-align: right;"><strong>Tổng tiền:</strong></td>
                    <td colspan="2">
                        <strong id="total-cart">
                            <?php echo e(number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.')); ?>đ
                        </strong>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="cart-controller">
            <form action="<?php echo e(route('cart.clear')); ?>" method="POST" style="margin-top: 20px;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger ">Xóa hết giỏ hàng</button>
            </form>
            
            <form action="<?php echo e(route('checkout')); ?>" style="margin-top: 20px;" id="orderForm">
                <button type="submit" class="btn btn-primary btn-lg w-100" id="submitButton">
                    Mua hàng
                    <span id="loadingSpinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                </button>
            </form>
            
            <script>
                document.getElementById('orderForm').addEventListener('submit', function () {
                    document.getElementById('submitButton').disabled = true;
                    document.getElementById('loadingSpinner').style.display = 'inline-block';
                });
            </script>
            
            
        </div>
    <?php else: ?>
        <p>Chưa có sản phẩm nào trong giỏ hàng của bạn.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/carts/index.blade.php ENDPATH**/ ?>