@foreach ($products as $product)
    <livewire:cart-line :product="$product" key="{{$product->id}}cart"/>
@endforeach