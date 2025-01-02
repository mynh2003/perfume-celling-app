<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <script>
            alert("<?php echo e(session('success')); ?>");
        </script>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <script>
            alert("<?php echo e(session('error')); ?>");
        </script>
    <?php endif; ?>
    <div class="products-header">
        <div>
            <h1><?php echo e(optional($categories->where('id', $category_id ?? '')->first())->name); ?></h1>
        </div>
        <div class="sort-option dp-flex">
            <label for="">Sắp xếp theo</label>
            <select name="SortBy" id="SortBy-top">
                <option value="title-ascending">Tên từ A-Z</option>
                <option value="title-descending">Tên từ Z-A</option>
                <option value="price-ascending">Giá từ thấp đên cao</option>
                <option value="price-descending">Giá từ cao đến thấp</option>
            </select>
        </div>
    </div>
    <div class="products-content ">
            <p><?php echo e(optional($categories->where('id', $category_id ?? '')->first())->description); ?></p>
    </div>
    <div class="grid-data">
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="productName"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="row">
                            <!-- Product Image Slider -->
                            <div class="col-md-5">
                                <div class="product-images">
                                    <img id="productImage1" src="" class="img-fluid" alt="Image 1">
                                    <img id="productImage2" src="" class="img-fluid" alt="Image 2" style="display: none;">
                                    <img id="productImage3" src="" class="img-fluid" alt="Image 3" style="display: none;">
                                </div>
                            </div>
        
                            <!-- Product Details -->
                            <div class="col-md-7">     
                                <ul class="product-info">
                                    <li><strong>Nhãn hiệu:</strong> <span id="productBrand"></span></li>
                                    <li><strong>Giới tính:</strong> <span id="productCategory"></span></li>
                                    <li><strong>Xuất xứ:</strong> <span id="productOrigin"></span></li>
                                    <li><strong>Phát hành:</strong> <span id="productRel"></span></li>
                                    <li><strong>Nồng độ:</strong> <span id="productConcentration"></span></li>
                                    <li><strong>Nhóm hương:</strong> <span id="productFragrance"></span></li>
                                    <li><strong>Phong cách:</strong> <span id="productStyle"></span></li>
                                </ul>
        
                                <!-- Product Options -->
                                <div class="product-options">
                                    <button class="option-button">100ml EDP</button>
                                    <button class="option-button">50ml EDP</button>
                                    <button class="option-button selected">30ml EDP</button>
                                </div>
        
                                <!-- Product Price -->
                                <div class="product-price">
                                    <span class="original-price" id="productOriginalPrice"></span>
                                    <span class="discount-price" id="productPrice"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item panel">
                        <h4 id="proinfo-title" data-toggle="collapse" data-target="#proinfo02" data-parent="#proinfo02" aria-expanded="true" class="collapsed">Thông tin chi tiết</h4>
                        <div class="desc panel-collapse collapse in" aria-expanded="true" id="proinfo02" style>
                                <p ><strong><em><span id="productDetails"></span></em></strong></p>
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <a id="addToCartLink" href="javascript:void(0)" class="btn btn-primary" onclick="<?php echo e(Auth::check() ? '' : 'notifyLogin()'); ?>">Mua ngay</a>          
                    </div>
                </div>
            </div>
        </div>
        
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="grid-data-cell">
            <div class="product-item">
                <div class="product-item-thumb">
                    <img src="<?php echo e(asset('storage/manual/product/' . $product->image_1)); ?>" alt="<?php echo e($product->name); ?>">
                </div>
                <div>
                    <a href="javascript:void(0);" onclick="viewProduct(<?php echo e($product->id); ?>)" class="btn_quick-view ajax">Xem Nhanh</a>
                </div>
                <div class="product-item-body">
                    <div class="product-name">
                        <h3><?php echo e($product->name); ?></h3>
                    </div>
                    <div class="product-brand"><?php echo e($product->brand->name); ?></div>
                    <div class="product-price">
                        <span><?php echo e(number_format($product->price,0,',','.')); ?></span>
                    </div>
                </div>
                <div class="button-add">
                    <a href="<?php echo e(Auth::check() ? route('cart.add', ['id' => $product->id]) : 'javascript:void(0)'); ?>" class="btn selling-btn" onclick="<?php echo e(Auth::check() ? '' : 'notifyLogin()'); ?>">Thêm giỏ hàng</a>
                </div>
            </div>
           
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
    </div>
    <div class="pagination-container">
        <?php echo e($products->links('vendor.pagination.bootstrap-4')); ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
         function notifyLogin() {
            alert("Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.");
        }
        function viewProduct(productId) {
            $.ajax({
                url: '/product/' + productId,
                method: 'GET',
                success: function(data) {
                    $('#productName').text(data.name);
                    $('#productDetails').text(data.details);
                    $('#productBrand').text(data.brand);
                    $('#productPrice').text(data.price.toLocaleString('vi-VN') + ' VNĐ');
                    $('#productPriceBuy').text(data.price_buy);
                    $('#productCategory').text(data.category);

                    $('#productOrigin').text(data.origin);
                    $('#productRel').text(data.rel);
                    $('#productConcentration').text(data.concentration);
                    $('#productFragrance').text(data.fragranceGroup);
                    $('#productStyle').text(data.style);

                    $('#productImage1').attr('src', '<?php echo e(asset("storage/manual/product/")); ?>/' + data.images[0]);
                    $('#productImage2').attr('src', '<?php echo e(asset("storage/manual/product/")); ?>/' + data.images[1]);
                    $('#productImage3').attr('src', '<?php echo e(asset("storage/manual/product/")); ?>/' + data.images[2]);

                    // Cập nhật link cho nút "Thêm giỏ hàng"
                    var addToCartUrl = "<?php echo e(Auth::check() ? route('cart.add', ['id' => ':id']) : 'javascript:void(0)'); ?>";
                    addToCartUrl = addToCartUrl.replace(':id', productId);
                    $('#addToCartLink').attr('href', addToCartUrl);

                    $('#productModal').modal('show');
                },
                error: function() {
                    alert("Không thể tải thông tin sản phẩm.");
                }
            });
        }
        $(document).ready(function() {
            $('.close').click(function() {
                $('#productModal').modal('hide'); // Ẩn modal
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('ui.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/ui/pages/products.blade.php ENDPATH**/ ?>