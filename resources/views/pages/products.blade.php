@extends('layouts.app')

@section('content')
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
    <div class="products-header">
        <div>
            <h1>{{ optional($categories->where('id', $category_id ?? '')->first())->name }}</h1>
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
            <p>{{ optional($categories->where('id', $category_id ?? '')->first())->description }}</p>
    </div>
    <div class="grid-data">
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="productName">MOSCHINO TOY BOY EDP</h5>
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
                                {{-- <p id="productSubtitle">NƯỚC HOA MOSCHINO TOY BOY EDP</p> --}}
        
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
                        <button type="button" class="btn btn-primary" onclick="addToCart()">Thêm vào giỏ hàng</button>
                        <button type="button" class="btn btn-danger">Mua ngay</button>
                    </div>
                </div>
            </div>
        </div>
        
        @foreach($products as $product)
        <div class="grid-data-cell">
            <div class="product-item">
                <div class="product-item-thumb">
                    <img src="{{ asset('storage/manual/product/' . $product->image_1) }}" alt="{{ $product->name }}">
                </div>
                <div>
                    <a href="" class="btn btn_addcart hidden-xs">Mua Ngay</a>
                    <a href="javascript:void(0);" onclick="viewProduct({{ $product->id }})" class="btn btn_quick-view ajax">Xem Nhanh</a>
                </div>
                <div class="product-item-body">
                    <div class="product-name">
                        <h3>{{ $product->name }}</h3>
                    </div>
                    <div class="product-brand">{{ $product->brand->name }}</div>
                    <div class="product-price">
                        <span>{{ number_format($product->price,0,',','.')  }}</span>
                    </div>
                </div>
                <div class="button-add">
                    <a href="{{Auth::check() ? route('cart.add', ['id' => $product->id]) : 'javascript:void(0)' }}" class="btn selling-btn" onclick="{{ Auth::check() ? '' : 'notifyLogin()' }}">Thêm giỏ hàng</a>
                </div>
            </div>
           
        </div>
        @endforeach
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

                        
                        $('#productImage1').attr('src', '{{ asset("storage/manual/product/") }}/' + data.images[0]);
                        $('#productImage2').attr('src', '{{ asset("storage/manual/product/") }}/' + data.images[1]);
                        $('#productImage3').attr('src', '{{ asset("storage/manual/product/") }}/' + data.images[2]);
                        $('#productModal').modal('show');
                    },
                    error: function() {
                        alert("Không thể tải thông tin sản phẩm.");
                    }
                });
            }
            $(document).ready(function() {
            $('#closeModalButton').click(function() {
                $('#productModal').modal('hide'); // Ẩn modal
            });
        });
        </script>
    </div>
@endsection