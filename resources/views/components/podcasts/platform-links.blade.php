@props([
    'platforms' => null,
])

@php
    // Liens vers la chaîne du podcast : pas encore administrables, à renseigner
    $platforms ??= [
        ['platform' => \App\Enums\Platform::SPOTIFY, 'url' => 'https://spotify.com'],
        ['platform' => \App\Enums\Platform::DEEZER, 'url' => 'https://deezer.com'],
        ['platform' => \App\Enums\Platform::APPLE_MUSIC, 'url' => 'https://podcasts.apple.com'],
    ];
@endphp

<div {{ $attributes->merge(['class' => 'flex flex-wrap items-center justify-center gap-3']) }}>
    @foreach ($platforms as $item)
        <a
            href="{{ $item['url'] }}"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/20 text-white text-sm font-medium transition-all"
        >
            <x-podcasts.platform-icon :platform="$item['platform']" />
            {{ $item['platform']->getLabel() }}
        </a>
    @endforeach
</div>
