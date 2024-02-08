@extends('layouts.master')

@section('cart')
<script src="{{asset('site/js/cart.js')}}"></script>
@endsection

@section('title', 'ACCEUIL')

@section('content')

<div class="container-fluid pt-5">
  <div class="row px-xl-5 pb-3">
    <div class="col-lg-4 col-md-7 col-sm-1 pb-1">
      <div class="d-flex align-items-center border mb-4 justify-center" style="padding: 30px;">
        <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
        <h5 class="font-weight-semi-bold m-0">Produits de Qualité</h5>
      </div>
    </div>
    <div class="col-lg-4 col-md-7 col-sm-1 pb-1">
      <div class="d-flex align-items-center border mb-4 justify-center" style="padding: 30px;">
        <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
        <h5 class="font-weight-semi-bold m-0">Livraison Gratuite</h5>
      </div>
    </div>
    <div class="col-lg-4 col-md-7 col-sm-13 pb-1">
      <div class="d-flex align-items-center border mb-4 justify-center" style="padding: 30px;">
        <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
        <h5 class="font-weight-semi-bold m-0">Services Clients 7j/7</h5>
      </div>
    </div>
  </div>
</div>



<x-show-categories></x-show-categories>

<x-trandy-product></x-trandy-product>

<x-recent-products></x-recent-products>
@endsection

@section('js')
<script>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "600000",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}




@if(session('emptyCart'))
toastr.error('Les produits que vous aviez dans\
             votre panier sont en rupture de stock.')
@endif
</script>
@endsection

@section('owl')
<script>
  $(document).ready(function(){

    $('.owl-carousel').owlCarousel({
  loop:true,
  margin:10,
  nav:false,
  autoplay:true,
  autoplayTimeout:10000,
  autoplaySpeed:5000,
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