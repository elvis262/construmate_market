@php
    $prom = promo($product);
@endphp


<tr>
    <td class="align-middle d-flex align-items-center"><img class="mr-3" src="{{env("ADMIN_LOCATION")."storage/".$product->image}}" alt="" style="max-width: 50px;object-fit:contain;">{{$product->nom}}</td>
    @if($prom != 0)
        <td class="align-middle prix">{{$product->prix - $product->prix* $prom}}  <sub><del>{{$product->prix}}</del> 
            <sup class="orange">-{{$prom * 100}}%</sup></sub></td>
        @else
        <td class="align-middle prix">{{$product->prix}}</td>
    @endif
    <td class="align-middle">
        <div class="input-group quantity mx-auto" style="width: 130px;" data-product={{$product->id}}>
            <div class="input-group-btn">
                <button class="btn btn-sm btn-primary btn-minus" >
                <i class="fa fa-minus"></i>
                </button>
            </div>
            <input type="number" class="form-control form-control-sm bg-secondary text-center quantity-controller product" value="{{$product->pivot->quantite}}" data-limit="{{$product->quantite_stock}}">
            <div class="input-group-btn">
                <button class="btn btn-sm btn-primary btn-plus">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
    </td>
    @if($prom != 0)
        <td class="align-middle total">{{$product->pivot->quantite * $product->prix * $prom}}</td>
        @else
        <td class="align-middle total">{{$product->pivot->quantite * $product->prix}}</td>
    @endif
    <td class="align-middle"><button class="btn btn-sm btn-primary remove" data-product={{$product->id}}><i class="fa fa-times"></i></button></td>
</tr>