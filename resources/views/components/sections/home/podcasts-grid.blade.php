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
        <x-ui.modal title="Trouver un podcast" description="Choisissez vos critères : nous vous afficherons les épisodes correspondants.">
            <x-slot:trigger>
                <x-ui.button variant="sage" aria-haspopup="dialog">Trouver un podcast</x-ui.button>
            </x-slot:trigger>

            <x-forms.podcast-search-form layout="stacked" with-sort />
        </x-ui.modal>

        <x-ui.button :url="route('podcasts.index')" variant="outline">Trouver mon épisode</x-ui.button>
        <x-ui.button :url="route('podcasts.index') . '#episodes'" variant="rose">Les playlists</x-ui.button>
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
