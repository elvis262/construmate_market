@extends('layouts.master')

@section('cart')
{{-- <script src="{{asset('site/js/u  pdateCart.js')}}" type="module"></script> --}}
@endsection

@section('title', 'Mon Panier')

@section('content')


<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center pl-10" style="min-height: 5rem">
    <h1 class="font-weight-semi-bold text-uppercase text-center mb-3" style="font-size:2rem">panier</h1>
  </div>
</div>
<!-- Page Header End -->

<!-- Cart Start -->
<div class="container-fluid pt-5">
  <livewire:cart-container/>
</div>
<!-- Cart End -->

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
  "showDuration": "4000",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

@if(session('update'))
toastr.info(
  'Certain(s) produit(s) de votre panier on dû être retirer ou voir leur quantité modifier en raison de l\'inssuffisance de notre stock'
)
@endif
</script>
@endsection