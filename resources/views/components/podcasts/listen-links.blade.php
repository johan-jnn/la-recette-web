@props([
    'urls', // Collection<App\Models\PodcastUrl>
])

{{-- Liens d'écoute d'un épisode : un lien principal + une icône par plateforme --}}
@if ($urls->isNotEmpty())
    <div {{ $attributes->merge(['class' => 'flex items-center gap-3']) }}>
        <x-ui.text-link :url="$urls->first()->url" external>
            <x-ui.icon name="play" />
            Écouter
        </x-ui.text-link>

        @foreach ($urls as $podcastUrl)
            <a
                href="{{ $podcastUrl->url }}"
                target="_blank"
                rel="noopener noreferrer"
                class="text-[#808080] hover:text-[#1C4937] transition-colors"
                aria-label="Écouter sur {{ $podcastUrl->platform->getLabel() }}"
                title="{{ $podcastUrl->platform->getLabel() }}"
            >
                <x-podcasts.platform-icon :platform="$podcastUrl->platform" />
            </a>
        @endforeach
    </div>
@endif
