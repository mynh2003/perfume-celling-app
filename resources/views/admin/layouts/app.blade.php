<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('storage/css/admin/account.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/css/admin/brand.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/css/admin/product.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/css/admin.css') }}">


</head>

<body class="sb-nav-fixed">
    <!-- Include navigation components -->
    @include('admin.layouts.nav')
    <div id="layoutSidenav">
        @include('admin.layouts.sidebar')

        <div id="layoutSidenav_content">
            <main>
                @yield('admin-content')
            </main>
        </div>
    
    </div>
    @include('admin.layouts.footer')
    <script src="{{ asset('storage/js/admin.js') }}"></script>
</body>

</html>