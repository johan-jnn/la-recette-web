@props([
    'platforms' => null,
    'buttonVariant' => 'cream', // variante du bouton (cream, forest…)
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
        ['platform' => Platform::SPOTIFY, 'label' => 'Spotify', 'url' => $urls[Settings::SPOTIFY_URL->value] ?? null],
        ['platform' => Platform::APPLE_MUSIC, 'label' => 'Apple Podcast', 'url' => $urls[Settings::APPLE_MUSIC_URL->value] ?? null],
        ['platform' => Platform::DEEZER, 'label' => 'Deezer', 'url' => $urls[Settings::DEEZER_URL->value] ?? null],
    ])->filter(fn ($item) => filled($item['url']))->values()->all();
@endphp

{{-- Boutons blancs des plateformes d'écoute --}}
<div {{ $attributes->merge(['class' => 'flex flex-wrap items-center gap-4']) }}>
    @foreach ($platforms as $item)
        <x-ui.button :url="$item['url']" :variant="$buttonVariant" external>
            {{ $item['label'] ?? $item['platform']->getLabel() }}
            <x-ui.icon name="arrow-up-right" size="w-4 h-4" />
        </x-ui.button>
    @endforeach
</div>
