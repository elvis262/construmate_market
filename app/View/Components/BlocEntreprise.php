<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Entreprise;


class BlocEntreprise extends Component
{
    /**
     * Create a new component instance.
     */
    public $entreprise;
    public function __construct()
    {
        $this->entreprise = Entreprise::get()->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bloc-entreprise');
    }
}
