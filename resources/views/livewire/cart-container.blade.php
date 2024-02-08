<div>
    

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
            <x-cart-lines :products="$products" />
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
              <h5 class="font-weight-bold">{{$total}}</h5>
            </div>
            <a href="{{route('commande.index')}}" class="btn btn-block btn-primary my-3 py-3" wire:navigate>Commander</a>
          </div>
        </div>
      </div>
    </div>
</div>
