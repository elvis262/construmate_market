<div class="col-md-6">
    <h4 class="mb-4">{{count($reviews)}} Avis</h4>
    <div class="mb-4 col">
        @foreach ($reviews as $review)
            <x-review :review="$review"></x-review>
        @endforeach
    </div>
</div>