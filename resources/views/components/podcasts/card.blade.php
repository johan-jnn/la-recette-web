@props([
    'podcast', // App\Models\Podcast (avec la relation "urls")
    'fullButton' => false, // bouton "Écouter" pleine largeur (catalogue)
])

@php
    $listenUrl = $podcast->urls->first()?->url;
@endphp

{{-- Carte podcast (composant Figma "Cards Podcast") --}}
<article {{ $attributes->merge(['class' => 'flex w-[320px] min-h-[513px] flex-col items-center justify-center gap-[15px] rounded-card bg-cream px-[50px] py-6']) }}>
    <x-ui.media :src="$podcast->cover_url" :alt="$podcast->title" class="size-[220px] shrink-0" />

    <div class="flex w-full flex-col gap-[15px] text-forest">
        <h3 class="text-subtitle font-bold line-clamp-3">{{ $podcast->title }}</h3>
        <p class="text-base leading-[1.55] line-clamp-3">{{ $podcast->description }}</p>

        <div class="flex items-center justify-between gap-3 text-sm text-muted">
            <x-podcasts.platforms :urls="$podcast->urls" />
            <x-podcasts.duration :value="$podcast->duration" />
        </div>
    </div>

    @if ($listenUrl)
        <x-ui.button :url="$listenUrl" external :class="$fullButton ? 'w-full' : 'self-center'">Écouter</x-ui.button>
    @endif
</article>
