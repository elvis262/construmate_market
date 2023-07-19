<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class selectInput extends Component
{
    /**
     * Create a new component instance.
     * :options="$communes" id="commune" class="block mt-1 w-full" name="commune" required autocomplete="commune"
     */
    public $passed_options;
    public $default;
    public function __construct(
        public $pOptions,
        public string $id,
        public string $class,
        public string $name,
        public bool $required,
        public string $autocomplete,
        public $value = null
    )
    {
        $this->passed_options = $pOptions;
        $this->default = $value? $value : '1';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-input');
    }
}
