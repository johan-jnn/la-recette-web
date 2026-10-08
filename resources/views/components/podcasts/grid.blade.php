@props([
    'podcasts',
])

<div {{ $attributes->merge(['class' => 'flex flex-wrap justify-center gap-8 lg:gap-11']) }}>
    @forelse ($podcasts as $podcast)
        <x-podcasts.card :podcast="$podcast" />
    @empty
        <x-ui.empty-state message="Les premiers épisodes arrivent très bientôt." />
    @endforelse
</div>
