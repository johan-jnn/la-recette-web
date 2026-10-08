@props([
    'podcasts' => null,
    'limit' => 9,
])

@php
    $podcasts ??= \App\Models\Podcast::query()->with('urls')->latest('publish_date')->take($limit)->get();
@endphp

<x-layout.section id="podcasts" bg="white" padding="pt-16 md:pt-[72px] pb-16 md:pb-[78px]">
    <x-slot:decor>
        <x-ui.wave class="bottom-0" />
    </x-slot:decor>

    <x-ui.section-heading title="Les derniers podcasts">
        <x-ui.button :url="route('articles.index') . '#episodes'" variant="outline">Trouver mon épisode</x-ui.button>
        <x-ui.button :url="route('articles.index')" variant="rose">Les playlists</x-ui.button>
    </x-ui.section-heading>

    @if ($podcasts->isEmpty())
        <x-ui.empty-state message="Les premiers épisodes arrivent très bientôt." />
    @else
        <x-ui.carousel>
            @foreach ($podcasts as $podcast)
                <x-ui.carousel-item>
                    <x-podcasts.card :podcast="$podcast" />
                </x-ui.carousel-item>
            @endforeach
        </x-ui.carousel>
    @endif
</x-layout.section>
