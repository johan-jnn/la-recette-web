<?php

namespace App\Filament\Resources\Podcasts\Schemas;

use App\Enums\Platform;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class PodcastForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label("Titre du podcast")
                    ->required(),
                TextInput::make('description')
                    ->label("Description")
                    ->required(),
                DateTimePicker::make('publish_date')
                    ->label("Date de publication")
                    ->required(),
                TimePicker::make('duration')
                    ->label("Durée")
                    ->required(),

                Repeater::make('urls')
                    ->columnSpanFull()
                    ->label("Liens de l'épisode")
                    ->required()
                    ->addActionLabel("Ajouter une platforme")
                    ->relationship('urls')
                    ->schema([
                        Select::make('platform')
                            ->required()
                            ->label("Platforme")
                            ->options(Platform::class)
                            ->unique(),
                        TextInput::make('url')
                            ->url()
                            ->label("URL")
                            ->required()
                    ])
            ]);
    }
}
