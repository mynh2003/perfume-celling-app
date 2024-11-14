

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <script>
            alert("<?php echo e(session('success')); ?>");
        </script>
    <?php endif; ?>
    <div class="container-contact">
        <div class="contact">
            <h1 id="contact-us">LIÊN HỆ VỚI CHÚNG TÔI</h1>
        </div>
        <div class="contact-hotline">
            <div class="row clearfix contact-hotline-inner">
                <div class="col-md-4">
                    <div class="hotline-item transition">
                        <div>Phân phối sỉ</div>
                        <span class="contact-phone">0327 504 862</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="hotline-item transition">
                        <div>Chăm sóc khách hàng</div>
                        <span class="contact-phone">1900 8198</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="hotline-item transition">
                        <div>Đặt hàng online</div>
                        <span class="contact-phone">1900 8199</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="contact-info">
                <h3>Mọi chi tiết xin vui lòng liên hệ:</h3>
                <ul>
                    <li>
                        <strong>Email:</strong>
                        <a href="">verfume@gmail.com</a>
                    </li>
                    <li>
                        <strong>Địa chỉ:</strong>
                        118 Lĩnh Nam, Hoàng Mai, Hà Nội
                    </li>
                    <li>
                        Hoặc điền đầy đủ thông tin dưới đây và gửi cho Thế Giới Nước Hoa, chúng tôi sẽ liên lạc với quý khách trong thời gian sớm nhất.
                    </li>
                </ul>
            </div>
        </div>
        <div class="contact-form">
            
            <form action="<?php echo e(route('contact.send')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="item-half">
                    <div class="item">
                        <div class="form-group">
                            <input type="text" class="form-control" name="fullname" placeholder="Họ và tên (*)" required aria-required="true">
                        </div>
                    </div>
                    <div class="item">
                        <div class="form-group">
                            <input type="text" 
                            class="form-control" 
                            name="phone" 
                            placeholder="Điện thoại (*)" 
                            required 
                            aria-required="true" 
                            pattern="^0[0-9]{9}$" 
                            title="Số điện thoại phải có 10 chữ số và bắt đầu bằng số 0">
                        </div>
                    </div>
                </div>
                <div class="item-half">
                    <div class="item">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email (*)" required aria-required="true">
                        </div>
                    </div>
                    <div class="item">
                        <div class="form-group">
                            <input type="text" class="form-control" name="addresses" placeholder="Địa chỉ" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="Tiêu đề (*)" required aria-required="true">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <textarea class="form-control" name="content" placeholder="Nội dung (*)" required aria-required="true"></textarea>
                    </div>
                </div>
                <div class="item-three-half">
                    <div class="item">
                            <button type="submit" class="" >Gửi</button>
                    </div>
                    <div class="item">
                        <button type="reset" class="" >Nhập lại</button>
                </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/pages/contact.blade.php ENDPATH**/ ?>