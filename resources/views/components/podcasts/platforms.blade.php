@props([
    'urls', // Collection<App\Models\PodcastUrl>
])

{{-- Icônes des plateformes où l'épisode est disponible --}}
@if ($urls->isNotEmpty())
    <div {{ $attributes->merge(['class' => 'flex items-center gap-2']) }}>
        @foreach ($urls as $podcastUrl)
            <a
                href="{{ $podcastUrl->url }}"
                target="_blank"
                rel="noopener noreferrer"
                class="text-forest hover:text-sage transition-colors"
                aria-label="Écouter sur {{ $podcastUrl->platform->getLabel() }}"
                title="{{ $podcastUrl->platform->getLabel() }}"
            >
                <x-podcasts.platform-icon :platform="$podcastUrl->platform" />
            </a>
        @endforeach
    </div>
@endif
