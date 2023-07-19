<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PromotionCategorieResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=> $this->id,
            "name"=>$this->nom,
            "price"=>$this->prix,
            "image"=>env("ADMIN_PATHNAME").Storage::url($this->image),
            "category_promotion"=> $this->categorie_produit->promotion_categorie?->remise ,
            'product_promotion'=> $this->promotion_produit?->remise 
        ];
    }
}
