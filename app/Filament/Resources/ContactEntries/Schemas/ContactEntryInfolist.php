<?php

namespace App\Filament\Resources\ContactEntries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactEntryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')
                    ->dateTime()
                    ->alignEnd()
                    ->columnSpanFull()
                    ->disableLabel()
                    ->label("Date de réception"),

                Section::make('Coordonnées')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('first_name')
                            ->label('Prénom'),
                        TextEntry::make('last_name')
                            ->label('Nom'),
                        TextEntry::make('email')
                            ->label('Adresse Email'),
                        TextEntry::make('phone')
                            ->label('Téléphone'),
                        TextEntry::make('company_name')
                            ->label('Entreprise')
                            ->default('-'),
                    ]),
                Section::make('Demande')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('object')
                            ->label('Objet'),
                        TextEntry::make('type')
                            ->badge()
                            ->label('Type'),
                        TextEntry::make('message')
                            ->columnSpanFull()
                            ->label('Détails'),
                    ]),
            ]);
    }
}
