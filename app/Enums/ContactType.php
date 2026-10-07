<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ContactType: string implements HasLabel
{
    case QUESTION = 'question';
    case DEVIS = 'devis';
    case RESERVATION = 'reservation';
    case AUTRE = 'other';

    public function getLabel(): string
    {
        return match ($this) {
            ContactType::QUESTION => 'Question',
            ContactType::DEVIS => 'Devis',
            ContactType::RESERVATION => 'Reservation',
            ContactType::AUTRE => 'Other',

            default => $this->name
        };
    }
}
