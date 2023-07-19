<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        @foreach ($categories as $category)
            <x-category :category="$category"></x-category>
        @endforeach       
    </div>
</div>