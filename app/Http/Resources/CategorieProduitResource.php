<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CategorieProduitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($request->input('_dropdown')){
            return [
                "id"=>$this->id,
                "name"=>$this->nom,
            ];
        }
        return [
            "id"=>$this->id,
            "name"=>$this->nom,
            "image"=>env("ADMIN_PATHNAME").Storage::url($this->image),
            "description"=>$this->description,
            "products"=>count($this->produits)
        ];
    }
}
