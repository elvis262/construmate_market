<div class="container-fluid">
    <x-top-bar/>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{route('product.index')}}" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">C</span>RenoBat+</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left mx-auto">
            <form action="{{route('search')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher un produit" name="search">
                    <div class="input-group-append">
                        <button class="input-group-text bg-transparent text-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right ">
            <livewire:cart/>
        </div>

    </div>
</div>

<div class="container-fluid mb-5" style="height: auto">
    <div class="row border-top px-xl-5" >

        
        <div class="col-lg-12" >
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0" style="height: 4rem;">
                <a href="{{route('product.index')}}" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">C</span>ONSTRUMATE</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse" style="height: 65px;">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('product.index')}}" @class(['nav-item nav-link ', 'active' => Request::path() == '/'])>Acceuil</a>
                        <x-category-dropdown></x-category-dropdown>
                        <a href="{{route('product.shop')}}" @class(['nav-item nav-link ', 'active' => (Request::path() == 'shop' or explode('/',Request::path())[0] == 'product-details')]) wire:navigate>Shop</a>
                        <a href="{{route('cart.index')}}" @class(['nav-item nav-link ', 'active' => (Request::path() == 'cart' or Request::path() == 'order')]) wire:navigate>Mon panier</a>
                        <a href="{{route('product.contact')}}" @class(['nav-item nav-link ', 'active' => Request::path() == 'contact-us']) wire:navigate>Contactez Nous</a>
                    </div>
                    @if(Auth::user())
                        <div class="navbar-nav ml-auto py-0">
                            <a href="{{route('profile.edit')}}" class="nav-item nav-link" wire:navigate>
                                <i class="fas fa-user text-primary"></i>
                                {{Auth::user()->prenom}}
                            </a>
                        </div>
                        @else
                        <div class="navbar-nav ml-auto py-0">
                            <a href="{{route('login')}}" class="nav-item nav-link" wire:navigate>Se connecter</a>
                            <a href="{{route('register')}}" class="nav-item nav-link" wire:navigate>S'inscrire</a>
                        </div>
                    @endif

                </div>
            </nav>

            
            @if(Request::path() == '/')
                <x-caroussel></x-caroussel>
            @endif
        </div>
    </div>
</div>