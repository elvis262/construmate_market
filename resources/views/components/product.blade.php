@php
$prom = promo($product);
@endphp



<div class="card product-item border-0 mb-4">
    <a href="{{route('product.details',['slug'=>Str::slug($product->nom), 'id'=> $product->id])}}" >
        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
            <img class="img-fluid w-100" src="{{env("ADMIN_LOCATION")."storage/".$product->image}}" alt="">
        </div>
    </a>
    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
        <h6 class="text-truncate mb-3">{{ucfirst($product->nom)}}</h6>
        <div class="d-flex justify-content-center">

            @if ($prom != 0)
                    <h6>
                        {{$product->prix - ($product->prix * $prom)}}
                    </h6>
                    <h6 class="text-muted ml-2">
                        <sub>
                            <del>{{$product->prix}}</del> 
                            <sup class="orange">-{{$prom * 100}}%</sup>
                        </sub>                  
                    </h6>
                @else
                <h6 class="text-muted ml-2">
                    {{$product->prix}} 
                </h6>
            @endif
            
        </div>
    </div>
    <div class="card-footer d-flex justify-content-between bg-light border">
        <button class="btn btn-sm text-dark p-0 add-to-cart mx-auto" data-product="{{$product->id}}"><i class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</button>
    </div>
</div>

