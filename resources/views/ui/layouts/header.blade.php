<div class="banner bg-dark-red overflow-hidden position-relative">
    <div class="marquee-wrapper">
        <span class="marquee-text">{{$header->first()->text}}</span>
    </div>
</div>
<div class="topcenter">
    <div class="container">
        <div class="topcenter-inner clearfix">
            <i class="fa-solid fa-bars menu-toggle-menu-mobile"></i>
            <a href="/home" class="logo">
                <img src="{{ asset('storage/manual/logo/' .$logo->first()->image)}}" alt="">
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
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="topcart clearfix">
                <div class="register">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <!-- Link trực tiếp đến trang thông tin cá nhân, không cần biểu mẫu -->
                                <a class="dropdown-item" href="{{ route('user.profile') }}">
                                    {{ __('Thông tin') }}
                                </a>
                                
                                <!-- Đăng xuất -->
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Đăng xuất') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <a href="{{ route('orders.history') }}">Lịch sử mua hàng</a>
                </div>
                <div class="cart">
                    <a href="/cart">
                        <i class="bi bi-cart3"></i>
                       @guest
                       
                        @else
                            @if($totalProductCart > 0)
                            <span class="cart-count bg-dark-red" id="cartCount">{{ $totalProductCart}}</span> 
                            @endif
                       @endguest
                    </a>
                </div>
            </div>
        </div>

        <div class="topcenter-menu clearfix">
            <div class="categories">
                <div class="categories-title">
                        <i class="fa-solid fa-bars "></i>
                    <span>DANH MỤC</span>
                    <i class="bi bi-caret-down-fill"></i>
                </div>
                <ul class="categories-menu bg-dark-red">
                    @foreach($categories as $category)
                    <li>
                        <a href="{{ route('product.productWithCategory', ['category_id' => $category->id]) }}" class="expandable">
                            <span>{{ $category->name }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="menu-horizontal">
                <ul class="menu-main">
                    <li><a href="{{ route('pages.index')}}" class="{{ request()->is('home') ? 'active' : '' }}">TRANG CHỦ</a></li>
                    <li><a href="{{ route('pages.about')}}" class="{{ request()->is('about') ? 'active' : '' }}">GIỚI THIỆU</a></li>
                    <li><a href="{{ route('pages.products')}}" class="{{ request()->is('products') ? 'active' : '' }}">SẢN PHẨM</a></li>
                    <li><a href="{{ route('pages.contact')}}"class="{{ request()->is('contact') ? 'active' : '' }}">LIÊN HỆ</a></li>
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
    <div class="mainmenu-mobile">
        <div class="mainmenu-mobile-container">
        <div class="button-menu">
            <i class="fa-solid fa-xmark close-menu-mobie"></i>
        </div>
        <ul class="mainmenu">
            <li>
                    @guest
                        @if (Route::has('login'))
                                <a class="dropdown-toggle-user" href="{{ route('login') }}">{{ __('ĐĂNG NHẬP') }}</a>
                        @endif
                    @else
                        <a href="#" class="dropdown-toggle">
                                {{ Auth::user()->name }}
                        </a>
                        <ul class="submenu list-unstyled">
                            <li><a href="{{ route('user.profile') }}">{{ __('Thông tin') }}</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Đăng xuất') }}</a></li>                          
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    @endguest
            </li>
            <li><a href="{{ route('orders.history') }}" class="history-link">LỊCH SỬ ĐƠN HÀNG</a></li>
            <li>
                <a href="#" class="dropdown-toggle">DANH MỤC</a>
                <ul class="submenu list-unstyled">
                    <li><a href="{{ route('pages.products')}}">Sản phẩm</a></li>
                    @foreach($categories as $category)
                    <li>
                        <a href="{{ route('product.productWithCategory', ['category_id' => $category->id]) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ route('pages.index') }}" class="{{ request()->is('home') ? 'active' : '' }}">TRANG CHỦ</a></li>
            <li><a href="{{ route('pages.about') }}" class="{{ request()->is('about') ? 'active' : '' }}">GIỚI THIỆU</a></li>
            <li><a href="{{ route('pages.contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">LIÊN HỆ</a></li>
        </ul>
        </div>
    </div>
</div>
<script>
    document.querySelector('.menu-toggle-menu-mobile').addEventListener('click', function() {
        const menu = document.querySelector('.mainmenu-mobile');
        menu.classList.add('show');
    });
    document.querySelector('.close-menu-mobie').addEventListener('click', function() {
        const menu = document.querySelector('.mainmenu-mobile');
        menu.classList.remove('show');
    });

    // Thêm sự kiện click cho các dropdown-toggle
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
            const submenu = this.nextElementSibling; // Lấy submenu
            if (submenu) {
                submenu.style.display = (submenu.style.display === 'contents') ? 'none' : 'contents'; // Chuyển đổi hiển thị
            }
        });
    });
</script>


