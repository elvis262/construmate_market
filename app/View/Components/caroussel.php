<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\InformationImage;
use App\Models\PromotionProduit;
use App\Models\PromotionCategorie;

class caroussel extends Component
{
    /**
     * Create a new component instance.
     */
    public $informations = [];
    public function __construct()
    {
        $info = InformationImage::select(['image','fin']);
        $categ = PromotionProduit::select(['image','fin']);
        $prod = PromotionCategorie::select(['image','fin']);
        $combinedQuery = $info->unionAll($categ)->unionAll($prod);
        $results = $combinedQuery->get()->toArray();
        foreach($results as $result){
            $now = new \DateTime("now");

            $res_dateTime = \DateTime::createFromFormat("Y-m-d H:i:s", $result['fin']);
            if($now < $res_dateTime){
                array_push($this->informations, $result);
            }
        }
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.caroussel');
    }
}
