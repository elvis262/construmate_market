<tr>
    <td class="align-middle d-flex align-items-center"><img class="mr-3" src="{{env("ADMIN_LOCATION")."storage/".$product->image}}" alt="" style="max-width: 50px;object-fit:contain;">{{$product->nom}}</td>
    @if($price != $product->prix)
        <td class="align-middle prix">{{$price}}  <sub><del>{{$product->prix}}</del> 
            <sup class="orange">-{{$prom * 100}}%</sup></sub></td>
        @else
        <td class="align-middle prix">{{$price}}</td>
    @endif
    <td class="align-middle">
        <div class="input-group quantity mx-auto" style="width: 130px;">
            <div class="input-group-btn">
                <button type="button" wire:click.debonce="decrementQuantity" class="btn btn-sm btn-primary" >
                <i class="fa fa-minus"></i>
                </button>
            </div>
            <input type="number" wire:model="quantity" class="form-control form-control-sm bg-secondary text-center" value="{{$quantity}}" maxlength="{{$product->quantite_stock}}" readonly>
            <div class="input-group-btn">
                <button type="button" wire:click.debonce="incrementQuantity" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
    </td>

    <td class="align-middle">{{$quantity * $price}}</td>

    <td class="align-middle"><button type="button" class="btn btn-sm btn-primary" wire:click="removeProduct({{$product->id}})"><i class="fa fa-times"></i></button></td>
</tr>
