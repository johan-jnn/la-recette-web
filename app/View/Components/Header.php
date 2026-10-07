<?php

namespace App\View\Components;

use Arr;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Request;
use Route;
use URL;

class Header extends Component
{
    public const array DEFAULT_NAV = [
        'Accueil' => '/',
        'Podcast' => '/podcast',
        'Expériences' => '/experiences',
        'Entreprises' => '/entreprises',
        'A propos' => '/histoire'
    ];

    public const array DEFAULT_CTA = [
        'Contact' => '/contact'
    ];

    public ?string $here = null;

    /**
     * Create a new component instance.
     */
    public function __construct(public ?array $nav, public ?array $cta, public bool $useSticky = false)
    {
        $this->nav ??= static::DEFAULT_NAV;
        $this->cta ??= static::DEFAULT_CTA;

        foreach ($this->nav as $key => $path) {
            if (Request::is($path)) {
                $this->here = $key;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
