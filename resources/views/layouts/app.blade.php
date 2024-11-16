<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- note -->

    <link rel="stylesheet" href="/resources/css/style-header.css">
    <link rel="stylesheet" href="{{ asset('storage/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/css/product.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/manual/logo/logo-icon.png') }}" type="image/png">
    @yield('login')
    @yield('register')
    @yield('reset')
    @yield('home-styles')
    @yield('checkout-css')
    @yield('order_history-css')
    @yield('order_success-css')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        @import url('https://fonts.cdnfonts.com/css/utm-avo');
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
        :root{
            --text-color: #a50c0c;
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: open sans, sans-serif;
            font-size: 14px;
            background-color: #f5f5f5;
            line-height: 1.5em;
            -webkit-transform: all .3s linear;
        }
        li{
            list-style: none;
        }
        ul, li{
            padding: 0;
            margin: 0;
        }
        a, a:hover{
            text-decoration: none;
        }
        .bg-gray{
            background-color:  #333;
        }
        .bg-dark-red{
            background-color:#a50c0c;
        }
        .dp-flex{
            display: flex;
        }
        .container{  
            max-width: 1230px;
            padding: 0 15px;
            margin: 0 auto;
        }
        .flex-grow1{
            flex-grow: 1;
        }
        .col-md-4{
            float: left;
        }
        .transition{
            transition: all .3s ease-in-out;
            -webkit-transition: all .3s ease;
        }
        .active{
            color: var(--text-color)!important;
        }
        
        /* START HEADER*/
        header .banner{
            text-align: center;
            font-family: utm avo;
            color: #fff;
            padding: 9px 0;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            /* overflow: hidden;     */
        }
        header .marquee-wrapper {
            display: flex;
            white-space: nowrap;
            position: absolute;
            animation: scrollText 10s linear infinite;
        }
        header .marquee-text {
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            padding-right: 50px;
        }

        @keyframes scrollText {
            from {
                transform: translateX(120%); 
            }
            to {
                transform: translateX(-120%); 
            }
        }
        header .topcenter{
            width: 100%;
            background-color: #fff
        }

        .topcenter-inner{
            position: relative;
            z-index: 100;
            height: 110px;
        }
        .topcenter-inner .logo{
            height: 90px;
            width: 25%;
            float: left;
            padding: 10px 0;
        }
        .topcenter-inner .logo img{
            max-width: 235px;
            height: 100px;
            object-fit: contain;
        }
        
        .topcenter-inner .search{
            width: 60%;
            float: left;
            position: relative;
            padding: 38px 0 0;
        }
        .search .search-item{
            padding: 0 15px;
        }
        .search .search-text{
            width: 60%;
            float: left;
            position: relative;
        }
        .search .search-select{
            width: 40%;
            float: left;
        }
        .search .search-text input,
        .search .search-select select{
            width: 100%;
            outline: none;
            height: 37px;
            padding-left: 10px;
            border: 1px solid #b3b3b3;
            border-radius: 4px;
        }
        .selectpicker{
            color: #333333;
        }
        .search .search-text input{
            font-style: italic;
        }
        .search .search-text button::before{
            content: '';
            height: 20px;
            width: 1px;
            background-color: #b3b3b3;
            display: block;
            position: absolute;
            left: 0;
            vertical-align: top;
        }
        .search .search-text button{
            position: absolute;
            right: 0;
            top: 0;
            height: 37px;
            width: 57px;
            background-color: transparent;
            border: 0;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            font-size: 20px;
        }
        .topcart{
            width: 15%;
            float: left;
            text-align: center;
            padding: 36px 0 0;
            color: #666;
        }
        .topcart .register{
            width: 60%;
            float: left;
            margin-top: -3px;
        }
        .topcart .register a{
            display: block;
            padding: 0;
            color: inherit;
            font-size: 13px;
        }
        .topcart .register a:hover{
            color: var(--text-color);
        }
        .dropdown-menu .dropdown-item{
            padding-left: 8px !important;
        }
        .topcart .cart{
            position: relative;
            width: 40%;
            float: left;
        }
        .cart {
            position: relative; 
        }

        .cart-count {
            position: absolute;
            top: -5px; 
            right: -10px; 
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px; 
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-size: 12px; 
            font-weight: bold; 
            
        }

        .cart-count.show {
            display: flex; 
        }
        .topcart .cart a{
            display: inline-block;
            position: relative;
            color: #333;
        }
        .topcart .cart a i{
            font-size: 35px;           
        }

        .topcenter-menu{
            position: relative;
        }
        .categories{
            display: inline-block;
        }
        .categories-title{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            text-transform: uppercase;
            font-weight: 700;
            cursor: pointer;;
            padding: 16px 0;
        }
        .categories-title span{
            padding: 0 10px;
        }

        .categories-menu {
            width: 220px;
            margin-top: 55px;
            position: absolute;
            z-index: -1;
            right: 0;
            left: 0;
            top: 0;
            opacity: 0;
            transition: all .3s ease-in-out;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
        }
        .categories-menu>li {
            height: 50px;
            width: 100%;
            float: none;
            border-bottom: 1px solid #fff;     
            transition: all .4s;   
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;   
        }
        .categories-menu>li>a {
            text-align: left;
            font-size: 18px;
            font-weight: 700;
            color: #fff;
            display: block;
            padding: 14px 20px 15px;
        }
        .categories-menu>li:hover {
            padding-left: 10px;
            background-color: #c8202d;
           
        }
        .categories:hover .categories-menu {
            opacity: 1;
            z-index: 10;
        }
        .menu-horizontal{
            display: inline-block;
        }
        .menu-horizontal .menu-main{
            margin-left: 15px;
        }
        .menu-horizontal .menu-main li{
            display: inline;
        }
        
        .menu-horizontal .menu-main>li>a{
            font-size: 15px;
            color: #333;
            text-transform: uppercase;
            /* display: block; */
            padding: 10px 15px;
            position: relative;
        }
        .menu-horizontal .menu-main>li>a::before{
            content: '';
            height: 27px;
            width: 1px;
            display: inline-block;
            background-color: #b3b3b3;
            position: absolute;
            left: 0;
            bottom: 12px;
        }
        .menu-horizontal .menu-main>li>a:hover{
            color: var(--text-color);
        }
        .hotline{
            display: inline-block;
            float: right;
        }
        .hotline-item{
            font-size: 11px;
            float: left;
        }
        .hotline-item:last-child{
            padding-left: 12px;
        }
        .hotline-item .hotline-icon{
            margin-right: 7px;
            float: left;
        }
        .hotline-item .hotline-icon i{
            width: 28px;
            height: 28px;
            background-color: var(--text-color);
            border-radius: 100%;
            line-height: 27px;
            margin-top: 12px;
            color: #fff;
            font-size: 12px;
            text-align: center;
            display: inline-block;
        }
        .hotline-number{
            overflow: hidden;
            height: 50px;
        }
        .hotline-item span{
            display: block;
            color: #666
        }
        .hotline-item span:nth-child(2){
            font-size: 23px;
            font-weight: 700;
            font-family: utm avo;
            color: #333; 
        }
        /* END HEADER */

        /* START CONTENT */
        .row-breadcrumb{
            background-color: rgba(0,0,0,.79);
            font-size: 15px;
            color: #fff;
            padding: 8px 15px;
        }
        .row-breadcrumb a {
            display: inline-block;
            padding: 3px 0;
            color: inherit;
        }
        .main{
            padding-bottom: 30px;
            align-items: flex-start;
        }
        .sidebar{
            width: 26%;
            min-width: 26%;
            background-color: #fff;
            margin-right: 6px;
            padding: 12px 12px 30px;
        }
        .content{
            padding: 12px 12px 30px;
            margin-left: 6px;
            font-family: utm avo;
            background-color: #fff;
            flex-grow: 1;
        }
        /* SIDERBAR-CSS-START */
        .heading {
            margin-bottom: 30px;
            border-bottom: 1px solid #333;
        }
        .heading .title-head {
        display: inline-block;
        margin: 0;
        padding: 0 0 15px;
        }

        .heading .title-head a {
            font-size: 18px;
            font-weight: 700;
            line-height: 20px;
            color: #333;
            text-transform: uppercase;
        }
        .list-blogs {
            margin-bottom: 20px;
        }
        .blog-item {
            width: 100%;
            margin-bottom: 20px;
        }
        .blog-item .blog-item-thumbnail {
            margin-bottom: 20px;
        }
        .blog-item .blog-item-thumbnail img {
            width: 100%;
        }
        .blog-item .blog-item-name {
            font-size: 16px;
            line-height: 22px;
            font-weight: 700;
        }
       
        .blog-item .postby {
            font-size: 13px;
            line-height: 30px;
            color: #acacac;
        }
        .pull-xs-left {
            float: left ;
        }
        .pull-xs-right {
            float: right ;
        }
        .blog-item .blog-item-summary {
            font-size: 14px;
            color: #acacac;
            float: left;
            margin-top: 5px;
            line-height: 20px;
        }
        .blog-item-link {
            clear: both;
            padding: 10px 0;
            border-bottom: 1px #ebebeb solid;
        }
        .blog-item-link .blog-item-name {
            font-size: 14px;
            line-height: 20px;
            margin-bottom: 0;
        }
        .blog-item-link .blog-item-name a {
            color: #333;
            text-decoration: none;
            padding-left: 20px;
            margin-bottom: 10px;
            display: inline-block;
        }
        .blog-item-link .postby {
            margin-left: 20px;
            font-size: 13px;
            line-height: 20px;
            color: #acacac;
        }
        .blog-item-link:hover a{
            color: #c8202d;
        }
        /* SIDERBAR-CSS-START */

        /* PRODUCTS-CSS-START */
        .products-header{
            position: relative;
            margin: 14px 0;
        }
        .products-header h1{
            text-align: center;
            color: var(--text-color);
            text-transform: uppercase;
            font-size: 24px;
            font-weight: 700;
        }
        .sort-option{
            position: absolute;
            right: 0;
            top: 3px;
            align-items: center;
        }
        .sort-option label{
            margin-right: 8px;
        }
        .sort-option select{
            width: 150px;
        }
        .products-content{
            display: inline-block;
            padding: 6px 12px
        }
        .products-content p{
            font-size: 16px;
            text-align: justify;
        }
        .grid-data{
            display: flex;
            flex-wrap: wrap;
        }
        .grid-data-cell{
            width: 25%;
            padding: 10px 6px;
        }
        .product-item{
            position: relative;
            padding: 10px 0 20px;
            text-align: center;
            border-radius: 8px;
            border: 1px solid #e6e6e6;
        }
        .product-item:hover {
            box-shadow: 2px 2px 7px rgba(17, 17, 17, .24);
            -webkit-box-shadow: 2px 2px 7px rgba(17, 17, 17, .24);
            -moz-box-shadow: 2px 2px 7px rgba(17, 17, 17, .24);
            border: 1px solid transparent;
            transition: all .3s linear;
            -webkit-transition: all .3s linear;
            -moz-transition: all .3s linear;
        }
        .product-item img{
            height: 140px;
            width: 100%;
        }
        .product-item-thumb{
            width: 140px;
            height: 140px;
            /* background-color: #a50c0c; */
            margin: 0 auto;            
        }
        .product-item:hover .btn_addcart, .product-item:hover .btn_quick-view {
            display: table-cell;
            color: #fff !important;
        }
        .btn_addcart, .btn_quick-view {
            height: 22px;
            overflow: visible;
            position: absolute;
            top: 51px;
            left: -10px;
            right: -10px;
            background-color: #9b0e62;
            padding: 2px;
            margin: 20px;
            transition: none;
            text-transform: uppercase;
            border-radius: 2px;
            text-align: center;
            font-size: 13px;
            z-index: 22;
            opacity: .7;
            color: #fff;
            line-height: 18px;
            letter-spacing: 4px;
            display: none;
        }
        .btn_quick-view {
            background-color: #555;
            color: #fff;
            top: 74px;
        }
        .product-item:hover .btn_addcart,
        .product-item:hover .btn_quick-view{
            display: block;
        }


        .product-name h3{
            overflow: hidden;
            display: -webkit-box;
            line-height: 1.2;
            height: 35px;
            -webkit-box-orient: vertical;
            font-size: 14px;
            color: #000000 !important;
            text-transform: uppercase;
            margin: 20px 0 10px;
        }
        .product-price{
            text-transform: uppercase;
            color: #c8202d;
            padding: 10px 0;
        }
        .product-price span{
            font-size: 18px;
            font-weight: 700;
        }
        .product-item .selling-btn{
            background-color: #c8202d;
            border: none;
            color: #fff;
            font-size: 12px;
            border-radius: 3px;
            padding: 5px 10px;
            font-weight: 400;
            font-family: open sans,sans-serif;
        }
        /* Modal styles */
        .modal {
            display: none; /* Ẩn modal mặc định */
            position: fixed; /* Đặt vị trí cố định */
            z-index: 1050; /* Đảm bảo modal nằm trên các phần tử khác */
            left: 0;
            top: 0;
            width: 100%; /* Chiếm toàn bộ chiều rộng */
            height: 100%; /* Chiếm toàn bộ chiều cao */
            overflow: auto; /* Thêm cuộn nếu cần */
            background-color: rgba(0, 0, 0, 0.5); /* Nền mờ */
        }

        .modal-dialog {
            position: relative;
            margin: 1.75rem auto; /* Tự động căn giữa */
        }

        .modal-content {
            background-color: #fff; /* Nền trắng */
            border: none;
            border-radius: 0.5rem; /* Bo góc */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5); /* Đổ bóng */
        }

        .modal-header {
            display: flex;
            justify-content: space-between; /* Căn giữa tiêu đề và nút đóng */
            align-items: center;
            padding: 1rem; /* Padding cho header */
            border-bottom: 1px solid #dee2e6; /* Đường viền dưới */
        }

        .modal-title {
            margin: 0; /* Bỏ margin */
            font-size: 1.25rem; /* Kích thước chữ tiêu đề */
        }

        .close {
            background: none; /* Không nền */
            border: none; /* Không viền */
            font-size: 1.5rem; /* Kích thước chữ nút đóng */
            cursor: pointer; /* Con trỏ chuột */
        }

        .modal-body {
            padding: 1rem; /* Padding cho body */
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end; /* Căn phải cho nút footer */
            padding: 1rem; /* Padding cho footer */
        }

        .btn-secondary {
            background-color: #6c757d; /* Màu nền nút */
            color: #fff; /* Màu chữ nút */
            border: none; /* Không viền */
            padding: 0.375rem 0.75rem; /* Padding cho nút */
            border-radius: 0.25rem; /* Bo góc nút */
            cursor: pointer; /* Con trỏ chuột */
        }

        .btn-secondary:hover {
            background-color: #5a6268; /* Màu nền khi hover */
        }
        .pagination-container{
            width: 100%;
            display: flex;
            
        }
        .pagination-custom{
            margin: 0 auto;
        }
        .pagination-custom .pagination {
            display: inline-flex;
            list-style: none;
            padding: 0;
            margin: 20px auto; /* Đưa ra giữa */
            background-color: #fff;
            border-radius: 5px;
        }

        .pagination-custom .page-item {
            margin: 0 5px;
        }

        .pagination-custom .page-link {
            color: #a50c0c; /* Màu chủ đạo */
            background-color: #fff;
            border: 1px solid #a50c0c;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination-custom .page-link:hover {
            background-color: #a50c0c;
            color: #fff;
        }

        .pagination-custom .page-item.active .page-link {
            background-color: #a50c0c;
            color: #fff;
            border-color: #a50c0c;
        }

        .pagination-custom .page-item.disabled .page-link {
            color: #ccc;
            cursor: not-allowed;
            background-color: #f8f9fa;
            border-color: #ddd;
        }   

        /* PRODUCTS-CSS-END */

        /* ABOUT-CSS-END */
        .post-image{
            padding: 6px 12px;
        }
        .post-image img{
            width: 100%;
        }
        .post-header{
            padding: 30px 80px 0;
            margin: auto;
            max-width: 692;
            position: relative;
        }
        .post-title{
            font-size: 30px;
            line-height: 48px;
            text-align: center;
            text-transform: uppercase;
            font-weight: 600;            
        }
        .line-post{
            border-bottom: 1px solid #a50c0c;
            width: 200px;
            margin: 45px auto;
        }
        .post-content{
            display: block;
            overflow: hidden;
            word-wrap: break-word;
            text-align: justify;
            font-size: 15px;
            line-height: 24px;
            padding: 6px 12px;
        }
        .post-content p{
            text-align: justify
        }
        /* ABOUT-CSS-END */

        /* CONTACT-CSS-END */
        .container-contact{
            font-family: open sans, sans-serif;
            color: #333333;
        }
        .contact{
            margin-top: 50px;
            
        }
        .contact h1{
            font-family: utm avo;
            text-align: center;
            color: inherit;
            text-transform: uppercase;
            font-weight: 500;
        }
        .contact-hotline{
            margin-bottom: 50px;
        }
        .contact-hotline-inner:before {
            content: '';
            border-top: 1px solid #b3b3b3;
            display: block;
            width: 97.5%;
            margin: 50px auto;
        }
        
        .contact-hotline .hotline-item{
            width: 100%;
            background-color: #f2f2f2;
            padding: 35px 20px;
        }
        .contact-hotline .hotline-item div{
            color: #b3b3b3;
            text-transform: inherit;
            font-size: 18px;
            text-align: center;
            border-bottom: 1px solid #b3b3b3;
            font-weight: 700;
            padding-bottom: 15px;
        }
        .hotline-item>span.contact-phone{
            font-size: 30px;
            font-family: utm avo;
            text-align: center;
            font-weight: 700;
            margin-top: 15px;
        }
        .contact-hotline .hotline-item:hover,
        .contact-hotline .hotline-item:hover div,
        .contact-hotline .hotline-item:hover span.contact-phone {
            color: #fff;
        }
        .contact-hotline .hotline-item:hover {
            background: var(--text-color);
            cursor: pointer;
        }
        .contact-info h3{
            font-family: open sans;
            text-transform: uppercase;
            font-size: 15px;
            font-weight: 700;
            margin: 0 0 20px;
        }
        .contact-info li{
            border-bottom: 1px solid #b3b3b3;
            padding: 10px 0;
        }
        .contact-info li:before {
            content: "\f0da";
            font: normal normal normal 14px / 1 FontAwesome;
            font-size: 20px;
            vertical-align: middle;
            padding-right: 7px;
        }
        .contact-form{
            padding: 30px 30px 150px;
        }
        .item-half {
            display: table;
            width: 100%;
        }
        .contact-form .item-half .item:first-child {
            display: table-cell;
            vertical-align: middle;
            width: 50%;
            padding-right: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .contact-form input {
        width: 100%;
        height: 37px;
        border: 1px solid #b3b3b3;
        outline: none;
        padding-left: 15px;
        border-radius: 10px;
        margin-bottom: 10px;
        background-color: transparent;
        }
        .contact-form textarea {
            width: 100%;
            border: 1px solid #b3b3b3;
            outline: none;
            padding-left: 15px;
            padding-top: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            height: 105px;
            background-color: transparent;
        }
        .contact-form .item-three-half {
            display: table;
        }
        .contact-form .item-three-half .item:nth-child(2) {
            width: 35%;
        }
        .contact-form .item-three-half .item {
            display: table-cell;
            vertical-align: bottom;
        }
        .contact-form .item-three-half .item button{
            color: #fff !important;
            background-color: var(--text-color);
            font-size: 16px;
            font-weight: 200;
            display: inline-block;
            padding: 8px 15px;
            border-radius: 4px;
            outline: none;
            border: 0;
        }
        .form-control:focus {
            border-color: #66afe9;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
        }

        /* CONTACT-CSS-END */

        /* END CONTENT */

        /* START FOOTER */
        footer{
            color: #fff;
            font-weight: lighter;
            margin-top: 50px;
        }
        footer .container{
            position: relative;
        }
        .footer-social{
            text-align: center;
            position: absolute;
            z-index: 99;
            display: block;
            top:-20px;
            left: 0;
            right: 0;
        }
        .footer-social li{
            display: inline-block;
            margin: 0 10px;
        }
        .footer-social a{
            display: block;
            height: 40px;
            width: 40px;
            line-height: 36px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            font-size: 24px;
            background-color: #333;
            border-radius: 50%;
            border: 2px solid #fff;
            text-align: center;
            color: #fff;
        }
        .footer-bottom{
            font-size: 12px;
            line-height: 24px;
            padding: 10px 0;
            position: relative;
        }
       
        /* END FOOTER */
    </style>
</head>
<body>
    <div id="app">
        <header>
            @include('layouts.header')
        </header>
        <main class="py-4">
            <section class="main container dp-flex flex-grow1">
                <div class="sidebar"> 
                    @include('layouts.sidebar')          
                </div>
        
                <div class="content">
                    @yield('content')          
                </div>
                
            </section>
        </main>
        <footer class="bg-gray">
            @include('layouts.footer')
        </footer> 
    </div>
    <script src="{{ asset('storage/js/cart.js') }}"></script>
    
</body>
</html>
