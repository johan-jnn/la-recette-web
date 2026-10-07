<?php

namespace App\Filament\Resources\Podcasts\Schemas;

use App\Enums\Platform;
use App\Enums\Settings;
use App\Models\Podcast;
use Arr;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\ViewField;
use Filament\Infolists\Components\ImageEntry;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Alignment;
use Http;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Log;
use Storage;
use Str;
use Uri;
use URL;

class PodcastForm
{
    private const string API_HOST = "https://listen-api-test.listennotes.com";
    private const int MAX_SUGGESTIONS = 3;

    private static function searchPodcasts(string $query)
    {
        $key = Settings::LISTEN_NOTES_API_KEY->model('value')->value;
        if (!$key) {
            return;
        }

        //? https://www.listennotes.com/api/docs/#get-api-v2-search
        $searchURL = static::API_HOST . "/api/v2/search_episode_titles";

        $response = Http::withHeader('X-ListenAPI-Key', $key)
            ->get($searchURL, [
                'q' => $query,
                'type' => 'episode',
                'page_size' => static::MAX_SUGGESTIONS
            ]);

        if ($response->getStatusCode() != 200) {
            return null;
        }

        $results = $response->json('results');
        if (\count($results) > static::MAX_SUGGESTIONS) {
            Log::warning("The received ListenNote API response has more than" . static::MAX_SUGGESTIONS . " responses.");
            $results = \array_slice($results, 0, static::MAX_SUGGESTIONS);
        }

        return $results;
    }

    /**
     * Converts the {@link https://www.listennotes.com/api/docs/#get-api-v2-search search response schema}
     * into a {@see Podcast}.
     * @return Podcast
     */
    private static function mapApiEntity(array $apiPodcast): array
    {
        $description = strip_tags($apiPodcast['description_original']);

        if (\strlen($description) > 600) {
            $description = substr($description, 0, 600) . '...';
        }

        $episode = [
            'title' => $apiPodcast['title_original'],
            'description' => $description,
            // 'cover_url' => $apiPodcast['image'],
            'duration' => $apiPodcast['audio_length_sec'],
            'publish_date' => Carbon::createFromTimestampMs($apiPodcast['pub_date_ms']),
            'urls' => [
                [
                    'platform' => Platform::APPLE_MUSIC,
                    'url' => "https://podcasts.apple.com/fr/podcast/id{$apiPodcast['itunes_id']}"
                ]
            ]
        ];

        return $episode;
    }

    private static function getFillAction()
    {
        return Action::make('apply_fields')
            ->label('Appliquer')
            ->action(function (array $schemaState, Set $schemaSet) {
                foreach ($schemaState as $key => $value) {
                    $schemaSet("../../$key", $value);
                }

                $schemaSet('../../prefilled', true);
                Notification::make()
                    ->title('Champs pré-remplis !')
                    ->success()
                    ->send();
            });
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(4)
                    ->columnSpanFull()
                    ->schema([
                        Group::make([
                            FileUpload::make('cover_url')
                                ->label('Couverture')
                                ->moveFiles()
                                ->required()
                                ->image()
                                ->optimize()
                                ->imageAspectRatio('1:1')
                                ->visibility('public')
                                ->directory('podcast_covers')
                                ->getUploadedFileNameForStorageUsing(fn(Get $get) => Str::slug($get('title')))
                                ->imageEditor(),
                        ])->columnSpan(1),
                        Group::make([
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
                                            fn($item) => static::mapApiEntity($item)
                                        ));
                                    }
                                })
                                ->required(),
                            TextInput::make('description')
                                ->label("Description")
                                ->required(),
                        ])->columnSpan(3)
                    ]),
                Section::make('Podcasts trouvées')
                    ->visible(
                        fn(string $operation, Get $get) =>
                            $operation == "create"
                            && !\count($get('urls'))
                            && \count($get('podcasts_found') ?? [])
                            && !$get('prefilled')
                    )
                    ->columnSpanFull()
                    ->headerActions([
                        Action::make('close')
                            ->label('Fermer')
                            ->link()
                            ->color('danger')
                            ->icon('iconpark-close')
                            ->action(fn(Set $set) => $set('podcasts_found', []))
                    ])
                    ->schema([
                        Repeater::make('podcasts_found')
                            ->disabled()
                            ->disableLabel()
                            ->default([])
                            ->schema([
                                Section::make()
                                    ->contained(false)
                                    ->disableLabel()
                                    ->footerActions([
                                        static::getFillAction()
                                    ])
                                    ->footerActionsAlignment(Alignment::End)
                                    ->components(fn(array $state) => [
                                        ViewField::make('card')->view('filament.forms.listenNoteResponseCard', $state)
                                    ])
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
