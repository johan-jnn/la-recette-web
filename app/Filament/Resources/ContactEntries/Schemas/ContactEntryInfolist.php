<?php

namespace App\Filament\Resources\ContactEntries\Schemas;

use Filament\Infolists\Components\TextEntry;
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
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                Section::make('Coordonnées')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('first_name'),
                        TextEntry::make('last_name'),
                        TextEntry::make('email')
                            ->label('Email address'),
                        TextEntry::make('phone'),
                        TextEntry::make('company_name'),
                    ]),
                Section::make('Demande')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('object'),
                        TextEntry::make('type')
                            ->badge(),
                        TextEntry::make('message')
                            ->columnSpanFull(),

                    ]),
            ]);
    }
}
