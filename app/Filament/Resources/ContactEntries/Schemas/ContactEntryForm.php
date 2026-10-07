<?php

namespace App\Filament\Resources\ContactEntries\Schemas;

use App\Enums\ContactType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactEntryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')->label('Prénom')
                    ->required(),
                TextInput::make('last_name')->label('Nom')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->label('Numéro de téléphone')
                    ->tel()
                    ->required(),
                TextInput::make('object')
                    ->label('Objet de la demande')
                    ->required(),
                Textarea::make('message')
                    ->rows(5)
                    ->label('Message')
                    ->required()
                    ->columnSpanFull(),
                Select::make('type')
                    ->required()
                    ->label('Type de message')
                    ->options(ContactType::class)
                    ->unique(),
                TextInput::make('company_name')
                    ->label('Entreprise'),
            ]);
    }
}
