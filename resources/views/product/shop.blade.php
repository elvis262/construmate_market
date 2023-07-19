@php
    $caroussel = true;
@endphp
@extends('layouts.master')

@section('cart')
    <script src="{{asset('site/js/cart.js')}}"></script>
@endsection

@section('content')
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop</h1>
    </div>
</div>


<div class="container-fluid pt-5">
    <div class="row px-xl-5">

        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12 mx-auto">
            <div class="row pb-3">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <x-product :product="$product"></x-product>
                    </div>
                @endforeach
                <div class="col-12 pb-1">
                    {{$products->onEachSide(1)->links()}}                  
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
@endsection