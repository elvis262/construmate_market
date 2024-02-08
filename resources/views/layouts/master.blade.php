<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>CONSTRUMATE - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{asset('site/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;1,200;1,300;1,400&display=swap" rel="stylesheet">
    @vite(['resources/css/style.css','resources/css/toastr.css','resources/js/lib/owlcarousel/owl.carousel.min.js',
    'resources/js/lib/easing/easing.min.js',
    'resources/js/main.js', 'resources/js/lib/owlcarousel/assets/owl.carousel.min.css'])
</head>

<body>
    <x-header></x-header>
    @yield('content')
    @include('includes.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        $(function () {
            $('[data-toggle="popover"]').popover({
                html: true,
                trigger: 'hover'
            })

            $('span.dropdown-item').hover(function () {
                if($(this).parent().find('div.sub.show') && !$(this).next('.sub').hasClass('show')){
                    $(this).parent().find('div.sub.show').removeClass('show');
                    $(this).parent().find('span.dropdown-item.active').removeClass('active');
                    $(this).next('.sub').addClass('show');
                    $(this).addClass('active');
                }
            }, ()=>{});

            
        })

        document.addEventListener('livewire:init', () => {
            Livewire.on('productAdded', (data) => {
                console.log(data)
                toastr.success(data.message)
            });

            Livewire.on('errorWhenTryingToAddProduct', (data)=>{
                toastr.error(data.message)
            })
    });

    </script>
    @yield('owl')
    @yield('cart')
    @yield('commande')
    @yield('js')
</body>

</html>