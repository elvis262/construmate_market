@foreach ($cartProducts as $product)
    <x-cart-line :product="$product"/>
@endforeach