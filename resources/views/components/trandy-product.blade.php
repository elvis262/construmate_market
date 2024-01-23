<div class="container-fluid pt-5">
    <div class="text-center mb-4">
      <h2 class="section-title px-5 h5"><span class="px-2">Produits Populaires</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
      <div class="owl-carousel owl-theme" style="padding:0 1.25rem">
        @foreach ($trandyProducts as $trandyProduct)
        <div class="item">
          <x-product :product="$trandyProduct"></x-product>
        </div>
        @endforeach
      </div>
    </div>
  </div>