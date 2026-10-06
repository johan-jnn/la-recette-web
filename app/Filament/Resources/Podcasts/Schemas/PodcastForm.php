<?php

namespace App\Filament\Resources\Podcasts\Schemas;

use App\Enums\Platform;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class PodcastForm
{
    private static function getApiPodcastFillAction()
    {
        return Action::make('create')
            ->label('Appliquer')
            ->action(function (Get $get) {
                $data = $get('.');
                dd($data);
            });
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label("Titre du podcast")
                    ->live(
                        debounce: 500,
                        condition: fn(string $operation, Get $get) =>
                            $operation == 'create'
                            && !\count($get('urls'))
                    )
                    ->afterStateUpdated(function (string $state, Set $set) {
                        $set('podcasts_found', [
                            ['title' => $state],
                            ['title' => "fesse"]
                        ]);
                    })
                    ->required(),
                TextInput::make('description')
                    ->label("Description")
                    ->required(),

                Section::make('Podcasts trouvées')
                    ->visible(
                        fn(string $operation, Get $get) =>
                            $operation == "create"
                            && !\count($get('urls'))
                            && \count($get('podcasts_found') ?? [])
                    )
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('podcasts_found')
                            ->disabled()
                            ->disableLabel()
                            ->default([])
                            ->schema([
                                Section::make()
                                    ->disableLabel()
                                    ->key('./')
                                    ->headerActions([static::getApiPodcastFillAction()])
                            ])
                    ]),

                DateTimePicker::make('publish_date')
                    ->label("Date de publication")
                    ->required(),
                TimePicker::make('duration')
                    ->label("Durée")
                    ->required(),

                Repeater::make('urls')
                    ->columnSpanFull()
                    ->label("Liens de l'épisode")
                    ->default([])
                    ->live(true, condition: fn(string $operation) => $operation == 'create')
                    ->required()
                    ->addActionLabel("Ajouter une platforme")
                    ->relationship()
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
