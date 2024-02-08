<?php
function promo(object $product)
{

    $now = new DateTime("now");
    $prom = 0;

    $prom_end = $product->categorie_produit->promotion_categorie?->fin ?? $product->promotion_produit?->fin;
    
    if($prom_end != null && DateTime::createFromFormat("Y-m-d H:i:s", $prom_end) !== false){
        $prom_dateTime = DateTime::createFromFormat("Y-m-d H:i:s", $prom_end);
        if($now < $prom_dateTime){
            if($product->categorie_produit->promotion_categorie?->fin == $prom_end){
                $prom = $product->categorie_produit->promotion_categorie?->remise;
            }else{
                $prom = $product->promotion_produit->remise;
            }
        }
    }
    return $prom;
}