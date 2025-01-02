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
    <table class="table" style="margin-top: 20px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Thương hiệu</th>
                <th scope="col">Danh mục</th>
                <!-- Cột Chi tiết sẽ ẩn mặc định -->
                <th class="detail-column" scope="col" style="display: none;">Chi tiết</th>
                <!-- Các cột còn lại -->
                <th class="other-column" scope="col">Xuất xứ</th>
                <th class="other-column" scope="col">Bộ sưu tập</th>
                <th class="other-column" scope="col">Phát hành</th>
                <th class="other-column" scope="col">Nồng độ</th>
                <th class="other-column" scope="col">Nhà pha chế</th>
                <th class="other-column" scope="col">Nhóm hương</th>
                <th class="other-column" scope="col">Phong cách</th>
                <th class="other-column" scope="col">Giá</th>
                <th class="other-column" scope="col">Số lượng</th>
                <th scope="col" style="width: 90px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product->id); ?></td>
                <td><img class="product-img" src="<?php echo e(asset('storage/manual/product/'. $product->image_1)); ?>" alt=""></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->brand->name ?? 'Chưa xác định'); ?></td>
                <td><?php echo e($product->category->name ?? 'Chưa xác định'); ?></td>
                <!-- Cột Chi tiết sẽ ẩn mặc định -->
                <td class="detail-column" style="display: none;"><?php echo e($product->details); ?></td>
                <!-- Các cột còn lại -->
                <td class="other-column"><?php echo e($product->origin); ?></td>
                <td class="other-column"><?php echo e($product->collection); ?></td>
                <td class="other-column"><?php echo e($product->rel); ?></td>
                <td class="other-column"><?php echo e($product->concentration); ?></td>
                <td class="other-column"><?php echo e($product->perfumer); ?></td>
                <td class="other-column"><?php echo e($product->fragrance_group); ?></td>
                <td class="other-column"><?php echo e($product->style); ?></td>
                <td class="other-column"><?php echo e($product->price); ?></td>
                <td class="other-column"><?php echo e($product->quantity); ?></td>
                <td>
                    <div class="d-flex mt-1">
                        <button class="toggle-details-btn btn btn-info flex-fill mx-1">Chi tiết</button>
                        <a href="<?php echo e(route('products.edit', $product->id)); ?>">
                            <button class="btn btn-primary flex-fill mx-1">Sửa</button>
                        </a>
                        <form action="<?php echo e(route('products.delete', $product->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger flex-fill mx-1" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>


    <div class="pagination-container">
        <?php echo e($products->links('vendor.pagination.bootstrap-4')); ?>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const toggleButtons = document.querySelectorAll('.toggle-details-btn');
    const detailColumns = document.querySelectorAll('.detail-column');
    const otherColumns = document.querySelectorAll('.other-column');

    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const isDetailVisible = detailColumns[0].style.display !== 'none';
            
            // Hiển thị/Ẩn tất cả các cột chi tiết
            detailColumns.forEach(column => {
                column.style.display = isDetailVisible ? 'none' : 'table-cell';
            });
            
            // Hiển thị/Ẩn tất cả các cột còn lại
            otherColumns.forEach(column => {
                column.style.display = isDetailVisible ? 'table-cell' : 'none';
            });
            
            // Cập nhật văn bản nút cho tất cả các dòng
            toggleButtons.forEach(btn => {
                btn.textContent = isDetailVisible ? 'Chi tiết' : 'Ẩn';
            });
        });
    });
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/admin/products/list.blade.php ENDPATH**/ ?>