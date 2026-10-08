@props([
    'podcast', // App\Models\Podcast (avec la relation "urls")
])

@php
    $listenUrl = $podcast->urls->first()?->url;
    $date = $podcast->publish_date ? \Illuminate\Support\Carbon::parse($podcast->publish_date)->translatedFormat('d F Y') : null;
@endphp

{{-- Carte épisode du catalogue (wireframe "Tous les épisodes") --}}
<article {{ $attributes->merge(['class' => 'flex flex-col gap-[18px] text-forest']) }}>
    <x-ui.media :src="$podcast->cover_url" :alt="$podcast->title" class="h-[220px] w-full" />

    <div class="flex items-center gap-3 text-sm leading-[1.55] text-muted">
        @if ($date)
            <span>{{ $date }}</span>
        @endif
        <x-podcasts.duration :value="$podcast->duration" />
    </div>

    <h3 class="text-subtitle font-bold">{{ $podcast->title }}</h3>
    <p class="text-body-lg text-muted line-clamp-3">{{ $podcast->description }}</p>

    <div class="mt-auto flex items-center justify-between gap-4">
        @if ($listenUrl)
            <a href="{{ $listenUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-base font-semibold underline underline-offset-4 hover:text-sage">
                Voir et écouter l’épisode
                <x-ui.icon name="chevron-right" size="w-3.5 h-3.5" />
            </a>
        @endif
        <x-podcasts.platforms :urls="$podcast->urls" />
    </div>
</article>
