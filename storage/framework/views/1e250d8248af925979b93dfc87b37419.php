<?php $__env->startSection('admin-content'); ?>
<div class="container-fluid px-4">
    <div class="container form-text">
        <div class="row">
            <div class="col-sm-12">
                <h2 style="margin: auto; margin-top: 20px; text-align: center;">Chỉnh sửa sản phẩm</h2>
            </div>
            <div class="col-sm-12">
                <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <!-- Tên sản phẩm -->
                    <div class="form-group">
                        <label for="name">Tên sản phẩm <span class="required">*</span></label>
                        <input class="form-control" id="name" type="text" name="name" value="<?php echo e($product->name); ?>" required>
                    </div>

                    <!-- Mô tả sản phẩm -->
                    <div class="form-group">
                        <label for="details">Mô tả sản phẩm <span class="required">*</span></label>
                        <textarea class="form-control" id="details" name="details" rows="3" required><?php echo e($product->details); ?></textarea>
                    </div>

                    <!-- Số lượng sản phẩm -->
                    <div class="form-group">
                        <label for="quantity">Số lượng sản phẩm <span class="required">*</span></label>
                        <input class="form-control" type="number" id="quantity" name="quantity" value="<?php echo e($product->quantity); ?>" required>
                    </div>

                    <!-- Giá sản phẩm -->
                    <div class="form-group">
                        <label for="price">Giá sản phẩm <span class="required">*</span></label>
                        <input class="form-control" type="number" id="price" name="price" value="<?php echo e($product->price); ?>" required>
                    </div>

                    <!-- Giá nhập sản phẩm -->
                    <div class="form-group">
                        <label for="price_buy">Giá nhập sản phẩm <span class="required">*</span></label>
                        <input class="form-control" type="number" id="price_buy" name="price_buy" value="<?php echo e($product->price_buy); ?>" required>
                    </div>

                    <!-- Thương hiệu -->
                    <div class="form-group">
                        <label for="brand_id">Thương hiệu <span class="required">*</span></label>
                        <select class="form-control" id="brand_id" name="brand_id" required>
                            <option value="" selected>-- Chọn thương hiệu --</option>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($brand->id); ?>" <?php echo e($product->brand_id == $brand->id ? 'selected' : ''); ?>><?php echo e($brand->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Danh mục -->
                    <div class="form-group">
                        <label for="category_id">Danh mục <span class="required">*</span></label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="" selected>-- Chọn danh mục --</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e($product->category_id == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <!-- Ảnh sản phẩm -->
                    <div class="form-group">
                        <label for="image_1">Ảnh 1</label>
                        <input type="file" id="image_1" name="image_1" accept=".png,.gif,.jpg,.jpeg">
                    </div>

                    <!-- Xuất xứ -->
                    <div class="form-group">
                        <label for="origin">Xuất xứ</label>
                        <input class="form-control" id="origin" type="text" name="origin" value="<?php echo e($product->origin); ?>">
                    </div>

                    <!-- Bộ sưu tập -->
                    <div class="form-group">
                        <label for="collection">Bộ sưu tập</label>
                        <input class="form-control" id="collection" type="text" name="collection" value="<?php echo e($product->collection); ?>">
                    </div>

                    <!-- Phát hành -->
                    <div class="form-group">
                        <label for="rel">Phát hành</label>
                        <input class="form-control" id="rel" type="text" name="rel" value="<?php echo e($product->rel); ?>">
                    </div>

                    <!-- Nồng độ -->
                    <div class="form-group">
                        <label for="concentration">Nồng độ</label>
                        <input class="form-control" id="concentration" type="text" name="concentration" value="<?php echo e($product->concentration); ?>">
                    </div>

                    <!-- Nhóm hương -->
                    <div class="form-group">
                        <label for="fragrance_group">Nhóm hương</label>
                        <input class="form-control" id="fragrance_group" type="text" name="fragrance_group" value="<?php echo e($product->fragrance_group); ?>">
                    </div>

                    <!-- Phong cách -->
                    <div class="form-group">
                        <label for="style">Phong cách</label>
                        <input class="form-control" id="style" type="text" name="style" value="<?php echo e($product->style); ?>">
                    </div>

                    <!-- Nhà pha chế -->
                    <div class="form-group">
                        <label for="perfumer">Nhà pha chế</label>
                        <input class="form-control" id="perfumer" type="text" name="perfumer" value="<?php echo e($product->perfumer); ?>">
                    </div>

                    <!-- Nút submit -->
                    <button type="submit" class="btn btn-success" name="btnsubmit">Cập nhật</button>
                    <button type="reset" class="btn btn-danger" name="btnReset">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>