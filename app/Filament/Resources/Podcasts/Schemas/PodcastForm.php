<?php

namespace App\Filament\Resources\Podcasts\Schemas;

use App\Enums\Platform;
use App\Models\Podcast;
use Arr;
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
use Http;
use Livewire\Component;
use Uri;

class PodcastForm
{
    private const string API_HOST = "https://listen-api-test.listennotes.com";
    private const int MAX_SUGGESTIONS = 3;

    private static function searchPodcasts(string $query)
    {
        //? https://www.listennotes.com/api/docs/#get-api-v2-search
        $uri = (new Uri(static::API_HOST))
            ->withPath('/api/v2/search_episode_titles')
            ->withQuery([
                'q' => $query,
                'type' => 'episode',
                'page_size' => static::MAX_SUGGESTIONS
            ]);

        $response = Http::get($uri->toString());
        if ($response->getStatusCode() != 200) {
            return null;
        }

        return $response->json('results');
    }

    /**
     * Converts the {@link https://www.listennotes.com/api/docs/#get-api-v2-search search response schema}
     * into a {@see Podcast}.
     * @return Podcast
     */
    private static function apiToFillables(array $apiPodcast): Podcast
    {
        $description = strip_tags($apiPodcast['description_original']);

        if (\strlen($description) > 1024) {
            $description = substr($description, 0, 1020) . '...';
        }

        $podcast = Podcast::make([
            'title' => $apiPodcast['title_original'],
            'description' => $description,
            'cover_url' => $apiPodcast['image'],
        ]);
        $podcast->setAttribute('urls', [
            [
                'platform' => Platform::APPLE_MUSIC,
                'url' => "https://podcasts.apple.com/fr/podcast/id{$apiPodcast['itunes_id']}"
            ]
        ]);

        return $podcast;
    }

    private static function getFillWithEntryAction()
    {
        return Action::make('apply_fields')
            ->label('Appliquer')
            ->action(function (array $schemaState, Set $schemaSet) {
                foreach ($schemaState as $key => $value) {
                    $schemaSet("../../$key", $value);
                }

                $schemaSet('../../prefilled', true);
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
                    ->afterStateUpdated(function (?string $state, Set $set) {
                        $set('prefilled', false);
                        $set('podcasts_found', []);

                        if (!$state) {
                            return;
                        }

                        $response = static::searchPodcasts($state);
                        if (\is_array($response)) {
                            $set('podcasts_found', Arr::map(
                                $response,
                                fn($item) => static::apiToFillables($item)->toArray()
                            ));
                        }
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
                            && !$get('prefilled')
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
                                    ->headerActions([static::getFillWithEntryAction()])
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
