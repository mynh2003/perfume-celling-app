
<div class="banner bg-dark-red">
    {{$header->first()->text}}
</div>
<div class="topcenter">
    <div class="container">
        <div class="topcenter-inner clearfix">
            <a href="/" class="logo">
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

                        {{-- @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
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
                    <i class="fa-solid fa-bars"></i>
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
    <script src="{{ asset('js/cart.js') }}"></script>
</div>