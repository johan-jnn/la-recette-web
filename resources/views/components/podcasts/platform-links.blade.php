@props([
    'platforms' => null,
])

@php
    use App\Enums\Platform;

    // Liens vers la chaîne du podcast : pas encore administrables, à renseigner
    $platforms ??= [
        ['platform' => Platform::SPOTIFY, 'label' => 'Spotify', 'url' => 'https://spotify.com', 'arrow' => true],
        ['platform' => Platform::APPLE_MUSIC, 'label' => 'Apple Podcasts', 'url' => 'https://podcasts.apple.com', 'arrow' => true],
        ['platform' => Platform::DEEZER, 'label' => 'Deezer', 'url' => 'https://deezer.com'],
    ];
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
