@extends('ui.layouts.app')
@section('home-styles')
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

    .slider .dots {
        position: absolute;
        bottom: 25px;
        left: 0;
        color: #fff;
        width: 100%;
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

    .featured-products {
        padding: 20px 0;
    }

    .product-list {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .product-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        text-align: center;
        margin: 10px;
        padding: 10px;
        width: calc(25% - 20px); /* 4 sản phẩm trên một hàng */
        
    }
    .product-card img {
        transition: transform 0.3s;
        width: 140px;
        height: 140px;
    }
    .product-card:hover img{
        transform: scale(1.05);
    }
    .product-card h3 {
        font-size: 1.2em;
        margin: 10px 0;
    }

    .product-card button {
        background-color: #a50c0c;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .product-card button:hover {
        background-color: #dc0b0b;
    }

    .brand-slider {
        padding: 20px 0;
    }

    .brand-list {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .brand-card {
        border: 1px solid #ddd;
        border-radius: 8px; /* Hình vuông với border-radius */
        width: 100px; /* Kích thước cố định cho thương hiệu */
        height: 100px; /* Hình vuông */
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 10px;
        background-color: #fff;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s;
    }

    .brand-card img {
        width: 80%; /* Giảm kích thước hình ảnh để không bị chọc ra ngoài */
        height: 80%;
        object-fit: contain; /* Đảm bảo hình ảnh không bị biến dạng */
    }
    .brand-card:hover{
        transform: scale(1.05);
        color: #a50c0c;
    }

    @media (max-width: 768px) {
        .product-card {
            width: calc(50% - 20px); 
        }
        .brand-list{
            flex-wrap: wrap;
            gap: 10px;
        }
        .brand-card {
            flex: 0 0 calc(33.33% - 10px);
            width: 80px; 
            height: 80px;
        }

    }

    @media (max-width: 480px) {
        .product-card {
            width: calc(100% - 20px); 
        }
        .brand-card {
            width: 60px; 
            height: 60px;
        }

        .slider .buttons button {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }
    }
</style>
@endsection

@section('content')

<div class="slider">
    <div class="list">
        @foreach($slides as $slide)
        <div class="item">
            <img src="{{ asset('storage/manual/slide/' .$slide->img) }}" alt="">
        </div>
        @endforeach
    </div>
    <div class="buttons">
        <button id="prev"><</button>
        <button id="next">></button>
    </div>
    <ul class="dots">
        @foreach($slides as $key => $slide)
        <li class="{{ $key === 0 ? 'active' : '' }}"></li>
        @endforeach
    </ul>
</div>

<div class="featured-products">
    <h2>Sản phẩm nổi bật</h2>
    <div class="product-list">
        @foreach($products->take(4) as $product) <!-- Lấy 4 sản phẩm mới nhất -->
        <div class="product-card">
            <img src="{{ asset('storage/manual/product/' . $product->image_1) }}" alt="{{ $product->name }}">
            <h3>{{ $product->name }}</h3>
            <button>Mua ngay</button>
        </div>
        @endforeach
    </div>
</div>

<div class="brand-slider">
    <h2>Thương hiệu</h2>
    <div class="brand-list">
        @foreach($brands->take(5) as $brand) <!-- Lấy 5 thương hiệu -->
        <div class="brand-card">
            @if($brand->logo)
                <img src="{{ asset('storage/manual/brand/' . $brand->logo) }}" alt="{{ $brand->name }}">
            @else
                <span>{{ $brand->name }}</span>
            @endif
        </div>
        @endforeach
    </div>
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

@endsection
