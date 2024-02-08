@extends('layouts.master')


@if ($categorie)
@section('title', strtoupper($products[0]->categorie_produit->nom))
@else
@section('title', 'Shop')
@endif

@section('content')
<div class="container-fluid bg-secondary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center " style="min-height: 5rem">
    <h1 clas="ml-12 font-weight-semi-bold text-uppercase mb-3" style="font-size:2rem">Shop</h1>
  </div>
</div>


<div class="container-fluid pt-5">
  <div class="row px-xl-5">

    <!-- Shop Product Start -->
    <div class="col-lg-12 col-md-12">
      <div class="row pb-3 mx-auto">
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-3 col-sm-12 pb-1">
          <livewire:product :product="$product" :key="$product->key"/>
        </div>
        @endforeach
        <div class="col-12 pb-1">

          {{$products->onEachSide(5)->links()}}
        </div>
      </div>
    </div>
    <!-- Shop Product End -->
  </div>
</div>
@endsection