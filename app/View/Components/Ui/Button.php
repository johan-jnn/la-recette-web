<?php

namespace App\View\Components\Ui;

use Closure;
use ErrorException;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $url = null,
        public ?string $label = null,
        public bool $secondary = false,
        public string $extraClass = "",
        public array $extraAttributes = []
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.button');
    }
}
