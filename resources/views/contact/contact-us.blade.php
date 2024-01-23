@extends('layouts.master')

@section('title', 'Contactez Nous')
@section('content')


<div class="container-fluid bg-secondary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 5rem">
    <h1 class="font-weight-semi-bold text-uppercase mb-3" style="font-size:2rem">Nous Contacter</h1>
  </div>
</div>
<div class="container-fluid pt-5">
  <div class="text-center mb-4">
    <h2 class="section-title px-5 h5"><span class="px-2">Contactez Nous Pour Toutes Vos Question</span></h2>
  </div>
  <div class="row px-xl-5">
    <div class="col-lg-7">
      <div class="contact-form">
        @include('includes.flash')
        <form name="sentMessage" id="contactForm" novalidate="novalidate" action="{{route('contact.contactUs')}}"
          method="post">
          @csrf
          <div class="control-group">
            <input type="text" class="form-control" id="subject" placeholder="Sujet" required="required"
              data-validation-required-message="Entrez un sujet" name="subject" />
          </div>
          <div class="control-group mt-5 mb-5">
            <textarea class="form-control" rows="6" id="message" placeholder="Message" required="required"
              data-validation-required-message="Entrez un message" name="message"></textarea>
          </div>
          <div>
            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">
              Envoyer
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-5 mb-5">
      <h5 class="font-weight-semi-bold mb-3">Entrer en contact avec nous</h5>
      <p>{{$entreprise->description}}</p>
      <div class="d-flex flex-column mb-3 mt-3">
        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>{{$entreprise->email}}</p>
        <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+225 {{$entreprise->contact}}</p>
      </div>
    </div>
  </div>
</div>
@endsection