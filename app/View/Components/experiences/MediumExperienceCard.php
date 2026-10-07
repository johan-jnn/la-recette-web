<?php

namespace App\View\Components;

use App\Models\Experience;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MediumExperienceCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ?Experience $experience)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.experiences.medium-experience-card');
    }
}
