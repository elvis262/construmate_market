<div>
    <div class="cart-wrapper">
        <a href="{{route('cart.index')}}" class="btn border">
            <i class="fas fa-shopping-cart text-primary"></i>
            <span class="badge">{{$product_cart_product_number}}</span>
            
        </a>
        @if($cart)
        <div class="cart-dropdown">
            <div class="cart-header">
                <span class="si-cart-count">
                        {{$product_cart_product_number}} items	
                </span>
                <span class="si-cart-subtotal">
                        Subtotal: 
                    <span>
                        <span class="amount">{{$total}}&nbsp;
                            <span class="">CFA</span>
                        </span>
                    </span>	
                </span>
            </div>
            <div class="cart-content">
                @foreach ($cart as $item)
                    
                    <div class="si-cart-item">
                        <div class="si-cart-image">
                            <a href="#" class="si-woo-thumb">
                                <img width="300" height="300" src="{{env("ADMIN_LOCATION")."storage/".$item->image}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" decoding="async" fetchpriority="high" srcset="" sizes="(max-width: 300px) 100vw, 300px">
                            </a>				
                        </div>
        
                        <div class="si-cart-item-details">
                            <p class="si-cart-item-title">
                                <a href="{{route('product.details',['slug'=>Str::slug($item->nom), 'id'=> $item->id])}}">{{$item->nom}}</a>
                            </p>
                            <div class="si-cart-item-meta">
                                <span class="si-cart-item-price">
                                   {{$item->pivot->quantite}} x {{$item->prix}}&nbsp;   
                                    <span class="woocommerce-Price-currencySymbol">CFA</span>
                                </span>
                            </div>
                        </div>
        
                        <span href="" class="si-remove-cart-item">
                            <svg class="si-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 32 32"><path d="M17.884 15.421l7.074-7.074c0.534-0.534 0.534-1.335 0-1.868s-1.335-0.534-1.868 0l-7.074 7.074-7.074-7.074c-0.534-0.534-1.335-0.534-1.868 0s-0.534 1.335 0 1.868l7.074 7.074-7.074 7.074c-0.534 0.534-0.534 1.335 0 1.868 0.267 0.267 0.534 0.4 0.934 0.4s0.667-0.133 0.934-0.4l7.074-7.074 7.074 7.074c0.267 0.267 0.667 0.4 0.934 0.4s0.667-0.133 0.934-0.4c0.534-0.534 0.534-1.335 0-1.868l-7.074-7.074z"></path></svg>
                        </span>
                    </div>
                @endforeach
            </div>
            <div class="cart-buttons">
                <a href="{{route('cart.index')}}"  class="si-btn btn-text-1" role="button">
                    <span>View Cart</span>
                </a>
            
                <a href="{{route('commande.index')}}" class="si-btn btn-fw" role="button">
                    <span>Checkout</span>
                </a>
            </div>
        </div>
        @else
        @endif
        </div>
        
</div>
