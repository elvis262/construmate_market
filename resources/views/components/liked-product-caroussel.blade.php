<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Vous Pourriez Aimer Aussi</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                @foreach ($trandyProducts as $product)                   
                    <x-product :product="$product"></x-product>
                @endforeach
            </div>
        </div>
    </div>
</div>