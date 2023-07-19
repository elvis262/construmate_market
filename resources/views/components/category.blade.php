@php
    $count = count($category->produits)
@endphp
<div class="col-lg-4 col-md-6 pb-1">
    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
        @if ($count > 1)
            <p class="text-right">{{$count}} Produits</p>
            @else
            <p class="text-right">{{$count}} Produit</p>
        @endif
        <a href="{{route('product.shop',["category"=>Str::slug($category->nom),'id'=> (int)$category->id])}}" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="{{env("ADMIN_LOCATION")."storage/".$category->image}}" alt="" style="object-fit: cover;">
        </a>
        <h5 class="font-weight-semi-bold m-0">{{$category->nom}}</h5>
    </div>
</div>
