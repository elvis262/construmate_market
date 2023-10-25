@php
$prom = promo($product);
@endphp



<div class="card product-item border-0 mb-4">
    <a href="{{route('product.details',['slug'=>Str::slug($product->nom), 'id'=> $product->id])}}" >
        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0" style="position: relative;">
            <img class="img-fluid w-100" src="{{env("ADMIN_LOCATION")."storage/".$product->image}}" alt="">
            @if ($prom != 0)
                <span class="orange" style="position: absolute;top:0;right:0;z-index:10;">-{{$prom * 100}}%</span>                                   
            @endif

            @if ($product->quantite_stock == 0)
                <span class="red" style="position: absolute;bottom:0;left:0;z-index:10;padding: 1px 2px;">Stock épuisé</span>
            @endif
        </div>
    </a>
    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
        <h6 class="text-truncate mb-3">{{ucfirst($product->nom)}}</h6>
        <div class="d-flex justify-content-center flex-column">

            @if ($prom != 0)

                <div class="d-flex justify-content-center">

                    <h6>
                        {{$product->prix - ($product->prix * $prom)}}
                        <small><sub>FCFA</sub></small>
                    </h6>
                    <h6 class="text-muted ml-2">
                        <small>
                            <del>{{$product->prix}}</del> 
                        </small>
                 
                    </h6>
                </div>
                @else
                <h6 class="text-muted ml-2">
                    {{$product->prix}}
                    <sub>FCFA</sub> 
                </h6>
            @endif
            
        </div>
    </div>
    <div class="card-footer d-flex justify-content-between bg-light border">
        <button class="btn btn-sm text-dark p-0 add-to-cart mx-auto" data-product="{{$product->id}}"><i class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</button>
    </div>
</div>

