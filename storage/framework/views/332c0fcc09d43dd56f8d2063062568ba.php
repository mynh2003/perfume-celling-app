<?php $__env->startSection('admin-content'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<div class="container-fluid px-4 container-product">
    <div style="margin: auto; margin-top: 20px; text-align: center;">
        <h3>Sản phẩm</h3>
    </div>
    <p style="text-align: right; color: red;">Hiển thị sản phẩm</p>
    <table class="table" style="margin-top: 20px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Thương hiệu</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Chi tiết</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Xuất xứ</th>
                <th scope="col">Bộ sưu tập</th>
                <th scope="col">Phát hành</th>
                <th scope="col">Nồng độ</th>
                <th scope="col">Nhà pha chế</th>
                <th scope="col">Nhóm hương</th>
                <th scope="col">Phong cách</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col" style="width: 90px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product->id); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->brand->name ?? 'Chưa xác định'); ?></td>
                <td><?php echo e($product->category->name ?? 'Chưa xác định'); ?></td>
                <td class="details-cell"><?php echo e($product->details); ?></td>
                <td><img class="product-img" src="<?php echo e(asset('storage/manual/product/'. $product->image_1)); ?>" alt=""></td>
                <td><?php echo e($product->origin); ?></td>
                <td><?php echo e($product->collection); ?></td>
                <td><?php echo e($product->rel); ?></td>
                <td><?php echo e($product->concentration); ?></td>
                <td><?php echo e($product->fragrance_group); ?></td>
                <td><?php echo e($product->style); ?></td>
                <td><?php echo e($product->perfumer); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->quantity); ?></td>
                <td>
                    <!-- Button sửa -->
                    <a href="<?php echo e(route('products.edit', $product->id)); ?>">
                        <button class="btn btn-primary">Sửa</button>
                    </a>
                    <!-- Form xóa -->
                    <form action="<?php echo e(route('products.delete', $product->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12">
            <div class="product-pagination-container">

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/admin/products/list.blade.php ENDPATH**/ ?>