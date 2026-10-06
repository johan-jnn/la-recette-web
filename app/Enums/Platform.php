<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;


enum Platform: string implements HasLabel
{
    case DEEZER = "dz";
    case SPOTIFY = "sp";
    case APPLE_MUSIC = "am";

    public function getLabel(): string
    {
        return match ($this) {
            Platform::DEEZER => "Deezer",
            Platform::SPOTIFY => "Spotify",
            Platform::APPLE_MUSIC => "Apple Music",

            default => $this->name
        };
    }
}
