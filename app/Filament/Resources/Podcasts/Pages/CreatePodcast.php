<?php

namespace App\Filament\Resources\Podcasts\Pages;

use App\Filament\Resources\Podcasts\PodcastResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePodcast extends CreateRecord
{
    protected static string $resource = PodcastResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['cover_external_url'] && !isset($data['cover_url'])) {
            $data['cover_url'] = $data['cover_external_url'];
        }

        return $data;
    }
}
