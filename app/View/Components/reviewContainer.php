<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Avi;

class reviewContainer extends Component
{
    /**
     * Create a new component instance.
     */
    public $reviews;
    public function __construct(public int $id)
    {
        $this->reviews = Avi::where('produit_id',$id)->orderby('created_at','desc')->limit(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review-container');
    }
}
