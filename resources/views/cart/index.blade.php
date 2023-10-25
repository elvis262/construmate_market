@php
    $total = 0;
    foreach($products as $product){
       $total += $product->prix * $product->pivot->quantite;
    }
@endphp

@extends('layouts.master')

@section('cart')
    <script src="{{asset('site/js/updateCart.js')}}" type="module"></script>
@endsection

@section('title', 'Votre Panier')

@section('content')


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3" style="font-size:2rem">panier</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Produits</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total (FCFA)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <x-cart-lines :products="$products"/>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Résumé du Panier</h4>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total (FCFA)</h5>
                            <h5 class="font-weight-bold total-final"></h5>
                        </div>
                        <a href="{{route('commande.index')}}" class="btn btn-block btn-primary my-3 py-3">Commander</a>
                    </div>
                </div>
            </div>
        </div>
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
        toastr.info('Certain(s) produit(s) de votre panier on dû être retirer ou voir leur quantité modifier en raison de l\'inssuffisance de notre stock')
    @endif
    </script>
@endsection