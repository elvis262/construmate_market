<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Produits Populaires</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach ($trandyProducts as $trandyProduct)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <x-product :product="$trandyProduct"></x-product>
            </div>
        @endforeach
    </div>
</div>