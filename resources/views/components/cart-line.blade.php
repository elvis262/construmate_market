@php
    $prom = promo($line);
@endphp


<tr>
    <td class="align-middle d-flex align-items-center"><img class="mr-3" src="{{env("ADMIN_LOCATION")."storage/".$line->image}}" alt="" style="max-width: 50px;object-fit:contain;">{{$line->nom}}</td>
    @if($prom != 0)
        <td class="align-middle prix">{{$line->prix - $line->prix* $prom}}  <sub><del>{{$product->prix}}</del> 
            <sup class="orange">-{{$prom * 100}}%</sup></sub></td>
        @else
        <td class="align-middle prix">{{$line->prix}}</td>
    @endif
    <td class="align-middle">
        <div class="input-group quantity mx-auto" style="width: 130px;" data-product={{$line->id}}>
            <div class="input-group-btn">
                <button class="btn btn-sm btn-primary btn-minus" >
                <i class="fa fa-minus"></i>
                </button>
            </div>
            <input type="number" class="form-control form-control-sm bg-secondary text-center quantity-controller line" value="{{$line->pivot->quantite}}" data-limit="{{$line->quantite_stock}}">
            <div class="input-group-btn">
                <button class="btn btn-sm btn-primary btn-plus">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
    </td>
    <td class="align-middle total">{{$line->pivot->quantite * $line->prix}}</td>
    <td class="align-middle"><button class="btn btn-sm btn-primary remove" data-product={{$line->id}}><i class="fa fa-times"></i></button></td>
</tr>