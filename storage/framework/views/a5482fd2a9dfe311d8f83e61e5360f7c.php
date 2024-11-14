<?php $__env->startSection('home-styles'); ?>
<style>
    .slider {
    width: 100%;
    height: 400px;
    margin: auto;
    position: relative;
    overflow: hidden;
    }

    .slider .list {
        position: absolute;
        width: max-content;
        height: 100%;
        left: 0;
        top: 0;
        display: flex;
        transition: 1s;
    }

    .slider .list img {
        width: 100%;
        max-width: 100vw;
        height: 100%;
        object-fit: cover;
       object-position: center;
    }

    .slider .buttons {
        position: absolute;
        top: 45%;
        left: 5%;
        width: 90%;
        display: flex;
        justify-content: space-between;
    }

    .slider .buttons button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #fff5;
        color: #fff;
        border: none;
        font-family: monospace;
        font-weight: bold;
        font-size: 24px;
        cursor: pointer;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        transition: background-color 0.3s, transform 0.2s;
    }

    .slider .buttons button:hover {
        background-color: rgba(0, 0, 0, 0.8);
        transform: scale(1.1);
    }

    .slider .buttons button:active {
        transform: scale(0.95);
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .slider .dots {
        position: absolute;
        bottom: 25px;
        left: 0;
        color: #fff;
        width: 100%;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    .slider .dots li {

        list-style: none;
        width: 10px;
        height: 10px;
        background-color: #fff;
        margin: 10px;
        border-radius: 20px;
        transition: 0.5s;
    }

    .slider .dots li.active {
        width: 30px;
    }

    @media screen and (max-width: 768px) {
        .slider {
            height: 400px;
        }
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="slider">
        <div class="list">
            <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <img src="<?php echo e(asset('storage/manual/slide/' .$slide->img)); ?>" alt="">
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- <div class="item">
                <img src="<?php echo e(asset('storage/manual/slide/slide2.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(asset('storage/manual/slide/slide3.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(asset('storage/manual/slide/slide4.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(asset('storage/manual/slide/slide5.png')); ?>" alt="">
            </div>
            <div class="item">
                <img src="<?php echo e(asset('storage/manual/slide/slide6.png')); ?>" alt="">
            </div> -->
        </div>
        <div class="buttons">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <ul class="dots">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <script>
        let slider = document.querySelector('.slider .list');
        let items = document.querySelectorAll('.slider .list .item');
        let next = document.getElementById('next');
        let prev = document.getElementById('prev');
        let dots = document.querySelectorAll('.slider .dots li');

        let lengthItems = items.length - 1;
        let active = 0;
        next.onclick = function(){
            active = active + 1 <= lengthItems ? active + 1 : 0;
            reloadSlider();
        }
        prev.onclick = function(){
            active = active - 1 >= 0 ? active - 1 : lengthItems;
            reloadSlider();
        }
        let refreshInterval = setInterval(()=> {next.click()}, 3000);
        function reloadSlider(){
            slider.style.left = -items[active].offsetLeft + 'px';
            // 
            let last_active_dot = document.querySelector('.slider .dots li.active');
            last_active_dot.classList.remove('active');
            dots[active].classList.add('active');

            clearInterval(refreshInterval);
            refreshInterval = setInterval(()=> {next.click()}, 3000);

            
        }

        dots.forEach((li, key) => {
            li.addEventListener('click', ()=>{
                active = key;
                reloadSlider();
            })
        })
        window.onresize = function(event) {
            reloadSlider();
        };

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Project\BTL_Web\perfume-celling-app\resources\views/pages/index.blade.php ENDPATH**/ ?>