@extends('layouts.master')
@section('commande')
    <script src="{{asset('site/js/commande.js')}}"></script>
@endsection


@section('title', 'Passez Votre Commande')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3" style="font-size: 2rem">Commander</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <form class="container-fluid pt-5" action="{{route('commande.process')}}" method="POST">
        @csrf
        @include('includes.flash')
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="row g-3 gap-2">
                    <div class="col-md-6 mb-2">
                      <label for="inputNom" class="form-label">Nom*</label>
                      <input type="text" class="form-control" id="inputNom" value="{{$user->name}}" placeholder="Entrez votre nom" name="nom">
                    </div>
                    <div class="col-md-6 mb-2">
                      <label for="inputPrenom" class="form-label">Prénom*</label>
                      <input type="text" class="form-control" id="inputPrenom" value="{{$user->prenom}}" placeholder="Entrez votre prénom" name="prenom">
                    </div>
                    <div class="col-md-6 mb-2">
                      <label for="inputTel" class="form-label">Téléphone*</label>
                      <input type="text" class="form-control" id="inputTel" placeholder="Entrez votre contact" value="{{$user->tel}}" name="tel">
                    </div>
                    <div class="col-md-6 mb-2">
                      <label for="inputTel2" class="form-label">Téléphone 2</label>
                      <input type="text" class="form-control" id="inputTel2" placeholder="Entrez un second contact" name="tel_2">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="inputEmail" class="form-label">Email* NB: Pour la réception du réçu</label>
                        <input type="email" class="form-control" id="inputEmail" value="{{$user->email}}" placeholder="Entrez votre adresse email" name="email">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="inputAdresse" class="form-label">Adresse*</label>
                        <input type="text" class="form-control" id="inputAdresse" placeholder="Entrez votre adresse" name="adresse">
                    </div>
                    <div class="col-md-6 mb-2 d-flex flex-column">
                      <label for="inputState" class="form-label">Zone de livraison*</label>
                      <select id="inputState" class="form-select" name="zone_liv">
                        @foreach ($communes as $commune)                           
                            <option value="{{$commune->id}}">{{ucfirst($commune->nom)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-12">
                        <label for="inputInfoSup" class="form-label">Information Supplémentaire</label>
                        <input type="text" class="form-control" id="inputInfoSup" placeholder="Entrez des informations supplémentaires..." name="info_sup">
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Total de la Commande</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Produits</h5>
                        
                        @foreach ($products as $product )
                            <x-order-resume-line :product="$product"/>
                        @endforeach

                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Total Partiel</h6>
                            <h6 class="font-weight-medium total-partiel"></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Livraison</h6>
                            <h6 class="font-weight-medium shipping">0</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold total-final">/h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Paiement</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" @checked(true) value="1">
                                <label class="custom-control-label" for="paypal">Payer à la livraison</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3 commander" type="submit">Confirmer la Commande</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Checkout End -->


@endsection