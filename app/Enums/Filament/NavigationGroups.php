<?php

namespace App\Enums\Filament;

use Filament\Support\Contracts\HasLabel;

enum NavigationGroups: string implements HasLabel
{
    case ENTRIES = "Contact";
    case CONTENT = "Contenu";
    case SETTINGS = "Paramètres";

    public function getLabel(): string
    {
        return $this->value;
    }
}
