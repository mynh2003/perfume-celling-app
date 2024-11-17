<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdmin" aria-expanded="false" aria-controls="collapseAdmin">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                        Tài khoản
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseAdmin" aria-labelledby="headingO" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('admin.listAdmin') }}">Admins</a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('admin.listUser') }}">Users</a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('admin.register') }}">Thêm mới</a>
                        </nav>
                    </div>
                </div>

                <!-- quản lý sản phẩm -->

                <div class="sb-sidenav-menu-heading">Quản lý sản phẩm</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts " aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Thương hiệu
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.listBrand') }}">Quản lý</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.addBrand') }}">Thêm mới</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Sản phẩm
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="{{ route('admin.listProduct') }}" style="margin-left: 0">Quản lý</a>
                        <a class="nav-link" href="{{ route('admin.addProduct') }}">Thêm mới</a>
                    </nav>
                </div>
                <!-- note -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrder" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                    Đơn hàng
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseOrder" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="{{ route('admin.orders.index') }}" style="margin-left: 0">Quản lý</a>
                    </nav>
                </div>
                <!-- quản lý giao diện -->
                <div class="sb-sidenav-menu-heading">Quản lý giao diện</div>
                <a class="nav-link collapsed" href="{{ route('admin.updateInterface') }}" >
                    <div class="sb-nav-link-icon" ><i class="fas fa-columns"></i></div>
                    Menu
                </a>
            </div>

        </div>
        <div class="sb-sidenav-footer">
            Nhóm 9
        </div>
    </nav>
</div>