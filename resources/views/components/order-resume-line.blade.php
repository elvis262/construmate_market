@php
    $prom = promo($product);
@endphp


<div class="d-flex justify-content-between">
    <p>{{ $product->pivot->quantite}} {{$product->nom}}</p>
    @if ($prom != 0)        
        <p class="somme">{{$product->prix * $prom * $product->pivot->quantite}}</p>
        @else       
        <p class="somme">{{$product->prix * $product->pivot->quantite}}</p>
    @endif
</div>