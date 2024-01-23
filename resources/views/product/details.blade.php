@php
$prom = promo($product)
@endphp

@php
    $avis = false;
    if(session('success')){
        $avis = true;
    }
@endphp

@extends('layouts.master')
@section('title', strtoupper($product->nom))

@section('cart')
    <script src="{{asset('site/js/cart.js')}}"></script>
    <script src="{{asset('site/js/quantity.js')}}" type="module"></script>
    <script src="{{asset('site/js/star.js')}}" type="module"></script>
@endsection

@section('content')


<div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 6rem">
            <h1 class="font-weight-semi-bold text-uppercase mb-3" style="font-size:1.5rem">Détails du produit</h1>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{env("ADMIN_LOCATION")."storage/".$product->image}}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ucfirst($product->nom)}}</h3>

                @if($moyenne != 0)
                    <sub class="yellow">{{$moyenne}}/5</sub>
                @endif
                <div class="d-flex mb-3">
                    @if ($moyenne == 0)
                        <h3 class="align-middle mt-2">Aucune note</h3>
                        @else
                        <div class="text-primary mr-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if($moyenne >= $i)
                                    <small class="fas fa-star"></small>
                                @elseif (($i - $moyenne) < 1)
                                    <small class="fas fa-star-half-alt"></small>
                                @else                                   
                                    <small class="far fa-star"></small>
                                @endif
                            @endfor
                        </div>
                        
                        <small class="pt-1">({{count($product->avis)}} Avis)</small>
                    @endif
                    
                </div>
                @if ($prom != 0)
                <h3 class="font-weight-semi-bold mb-4"><span class="text-muted">Prix :</span> {{$product->prix - ($product->prix * $prom)}} FRCFA  <sub><del class="text-muted ml-2">{{$product->prix}} FRCFA</del> <sup class="orange">-{{$prom * 100}}%</sup></sub></h3>                
                    @else
                <h3 class="font-weight-semi-bold mb-4"><span class="text-muted">Prix :</span> {{$product->prix}} FRCFA</h3>

                @endif
                <h3 class="font-weight-semi-bold mb-4 stock">Stock : <span class="text-muted ml-2">{{$product->quantite_stock}}</span></h3>
                <p class="mb-4">{{$product->description}}</p>

                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" @if($product->quantite_stock == 0) disabled @endif>
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="number" class="form-control bg-secondary text-center quantity-controller" data-limit="{{$product->quantite_stock}}" @if($product->quantite_stock == 0) value="0" @readonly(true) @else value="1" @endif>
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus" @if($product->quantite_stock == 0) disabled @endif>
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3 add-to-cart" data-product="{{$product->id}}"><i class="fa fa-shopping-cart mr-1"></i>Ajouter au panier</button>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a @class(['nav-item nav-link', 'active' => !$avis]) data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a @class(["nav-item nav-link", 'active' => $avis]) data-toggle="tab" href="#tab-pane-3">Avis ({{count($product->avis)}})</a>
                </div>
                <div class="tab-content">
                    <div @class(['tab-pane fade', 'show active' => !$avis]) id="tab-pane-1">
                        <h4 class="mb-3">Description du produit</h4>
                        <p>
                            {{$product->description}}
                        </p>
                    </div>
                    <div @class(['tab-pane fade', 'show active' => $avis]) id="tab-pane-3">
                        <div class="row">
                            <x-review-container :id="$product->id"></x-review-container>
                            <div class="col-md-6">
                                <h4 class="mb-4">Laisser un avis</h4>
                                <small>Les champs requis sont marqués *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Votre note * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star cursor-pointer star-review"></i>
                                        <i class="far fa-star cursor-pointer star-review"></i>
                                        <i class="far fa-star cursor-pointer star-review"></i>
                                        <i class="far fa-star cursor-pointer star-review"></i>
                                        <i class="far fa-star cursor-pointer star-review"></i>
                                    </div>
                                </div>
                                <form action="{{route('product.comment',['product' => $product->id])}}" method="post">
                                    @csrf
                                    @include('includes.flash')
                                    <input type="text" value="0" hidden name='note'>
                                    <div class="form-group">
                                        <label for="message">Votre commentaire *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control" name="commentaire"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Envoyer" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-liked-product-caroussel></x-liked-product-caroussel>
@endsection
@section('owl')
<script>
    $(document).ready(function(){
  
      $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:3000,
    autoplaySpeed:800,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
  });
      
   
  });
  </script>
@endsection