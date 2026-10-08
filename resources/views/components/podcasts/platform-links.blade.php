@props([
    'platforms' => null,
])

@php
    use App\Enums\Platform;
    use App\Enums\Settings;
    use App\Models\Setting;

    // Liens vers la chaîne du podcast, administrables depuis Filament (Paramètres) ; une plateforme sans URL n'est pas affichée
    $urls = Setting::query()
        ->whereIn('id', [Settings::SPOTIFY_URL->value, Settings::APPLE_MUSIC_URL->value, Settings::DEEZER_URL->value])
        ->pluck('value', 'id');

    $platforms ??= collect([
        ['platform' => Platform::SPOTIFY, 'label' => 'Spotify', 'url' => $urls[Settings::SPOTIFY_URL->value] ?? null, 'arrow' => true],
        ['platform' => Platform::APPLE_MUSIC, 'label' => 'Apple Podcasts', 'url' => $urls[Settings::APPLE_MUSIC_URL->value] ?? null, 'arrow' => true],
        ['platform' => Platform::DEEZER, 'label' => 'Deezer', 'url' => $urls[Settings::DEEZER_URL->value] ?? null],
    ])->filter(fn ($item) => filled($item['url']))->values()->all();
@endphp

{{-- Boutons blancs des plateformes d'écoute --}}
<div {{ $attributes->merge(['class' => 'flex flex-wrap items-center gap-4']) }}>
    @foreach ($platforms as $item)
        <x-ui.button :url="$item['url']" variant="white" external>
            {{ $item['label'] ?? $item['platform']->getLabel() }}
            @if (!empty($item['arrow']))
                <x-ui.icon name="arrow-up-right" size="w-3 h-3" />
            @endif
        </x-ui.button>
    @endforeach
</div>
