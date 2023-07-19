<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>CONSTRUMATE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{asset('site/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('site/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('site/css/style.css')}}" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="alert alert-danger position-fixed top-0 right-0 p-3" id="alert-danger" role="alert" style="width: auto; z-index: 50" hidden>
        Connectez à votre compte avant de procéder à cette opération
    </div>
    <div class="alert alert-success position-fixed top-0 right-0 p-3" id="alert-success" role="alert" style="width: auto; z-index:50" hidden>
        Produit ajouté à votre panier
    </div>
    <x-header showCaroussel="{{isset($caroussel)}}"></x-header>
    @yield('content')
    @include('includes.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset("site/lib/easing/easing.min.js")}}"></script>
    <script src="{{asset("site/lib/owlcarousel/owl.carousel.min.js")}}"></script>
    @yield('owl')
    @yield('cart')
    

    <!-- Template Javascript -->
    <script src="{{asset('site/js/main.js')}}"></script>
</body>

</html>