@foreach ($products as $product)
    <x-cart-line :product="$product"/>
@endforeach